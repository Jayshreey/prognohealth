<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Product As Mproduct;
use App\Models\Category;
use App\Models\Certification;
use Carbon\Carbon;

class Product extends Controller
{   
    public function list(){
        valid_session(translate('product'),'list');
        return view('backend.product.list');
    }
    public function add(){
        
        $page_data = array();
        $page_data['page_title']    = 'New Product';
        $page_data['page_action']   = route('admin.product.add_product');
        $page_data['category']      = Category::where('is_active','=','1')
                                        ->get();
        $page_data['certification'] = Certification::where('is_active','=','1')
                                        ->get();
        return view('backend.product.add-edit',$page_data);
        
    }
    public function edit($id){
        
        $id = decode_string($id);
        $page_data = array();
        $page_data['page_title']    = 'Update Product';
        $page_data['id']            = '';
        $page_data['page_action']   = route('admin.product.edit_product');
        $page_data['category']      = Category::where('is_active','=','1')
                                        ->get();
        $page_data['certification'] = Certification::where('is_active','=','1')
                                        ->get();                                
        if($id!=''){
            $page_data['id'] = encode_string($id);
            $page_data['product'] = Mproduct::where('id','=',$id)->first()->toArray();
        }
        
        return view('backend.product.add-edit',$page_data);
            
    }

    public function ajax_list(Request $request){
        $totalData = $totalFiltered = 0; $datalist = [];
        $columns = $request['columns'];
        $data = array();
        $like = '';
        $order = '';
        $order_dir = '';
        $limit = $request['length'];
        $start = $request['start'];
        $search = $request['search'];
        if(isset($search['value']) && $search['value']!=''){
            $like = $search['value'];
        }
        $order_array= $request['order'];
        if(isset($order_array[0]['column']) && $order_array[0]['column']!=0){
            $col_id = $order_array[0]['column'];
            $order = $columns[$col_id]['data'];
            $order_dir = $order_array[0]['dir'];
        }
        try {
            DB::beginTransaction();
                $totalData = Mproduct::count();
                $totalFiltered = Mproduct::where('name','LIKE','%'.$like.'%')
                                ->count();
                $datalist = Mproduct::where('name','LIKE','%'.$like.'%')
                                ->skip($start)
                                ->take($limit)
                                ->orderBy($order,$order_dir)
                                ->get();
            DB::commit();
        } catch(\Exception $exp) {
            DB::rollBack();
        }
        if (isset($datalist) && ! empty($datalist)) { 
            foreach ($datalist as $list) {
                $edit = '<a href="'.route('admin.product.edit',['id'=>encode_string($list->id)]).'" class="btn ripple btn-primary btn-sm mt-1 mb-1 text-sm text-white" data-placement="top" data-toggle="tooltip" title="'.translate('Edit').'"> <i class="fa fa-edit"></i> </a>';
                $details = '<a href="'.route('admin.product.quick_details',['id'=>encode_string($list->id)]).'" class="btn ripple btn-secondary btn-sm mt-1 mb-1 text-sm text-white popup-page" data-placement="top" data-toggle="tooltip" title="'.translate('Details').'"> <i class="fa fa-eye"></i> </a>';
                $status = $list->is_active=='1' ? '<span class="badge bg-success cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.product.change_status').'">'.translate('active').'</span>' : '<span class="badge bg-danger cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.product.change_status').'">'.translate('Inactive').'</span>';
                $popular_checked = $list->is_popular=='1' ? 'checked' : '';
                $popular = '<label class="custom-switch cursor-pointer"><input type="checkbox" class="custom-switch-input change-switch" data-action="change_popular" data-id="'.encode_string($list->id).'" data-url="'.route('admin.product.popular').'" '.$popular_checked.'> <span class="custom-switch-indicator"></span></label>';
                $image = uploads_image($list->image,uploads_url('default.png'));
                $nestedData = array();
                $nestedData['id']           = $list->id;
                $nestedData['image']        = '<a data-fancybox="image" data-src="'.$image.'" data-caption="'.$list->name.'"><img alt="'.$list->name.'" class="radius cursor-pointer image-delay" src="'.uploads_url('loader.gif').'" data-src="'.$image.'" style="width:48px;height:48px;"></a>';      
                $nestedData['name']         = $list->name;
                $nestedData['category']     = get_category_path_name_string(getColumnValue('category',['id'=>$list->category_id],'path'),$list->category_id);
                $nestedData['popular']      = $popular;
                $nestedData['created_at']   = $list->created_at;
                $nestedData['status']       = $status;
                $nestedData['actions']      = '<div class="btn-group" role="group"">'.$edit.$details.'</div>';
                $data[]                     = $nestedData;
            }
        }
        return response()->json([
            "draw"            => $request['draw'],
            "recordsTotal"    => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data"            => $data,
        ]);
    }

    public function popular(Request $request){
        if ($request->ajax()) {
            $status = false;
            $type = 'error';
            $title = translate('Update Popular');
            $msg = translate('Invalid Request');
            
            $id = session('id');
            $updated = array();
            $updated['type'] = 'admin';
            $updated['id'] = $id;
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'action' => 'required'
            ]);
            $attrNames = [
                'id' => translate('id')
            ];
            $validator->setAttributeNames($attrNames); 
            if ($validator->fails()) {
                return response()->json([
                    'status' => $status,
                    'type' => $type,
                    'title'  => $title,
                    'message'  => $validator->errors()->all()
                ]);
            }
            try {
                DB::beginTransaction();
                if($request['id']!= ''){    
                    $uid = decode_string($request['id']);    
                    $up_data = array();
                    $up_data['is_popular'] = '0';
                    if($request['status']=='true'){
                        $up_data['is_popular'] = '1';
                    }
                    $up_data['updated_by'] = json_encode($updated);
                    $pr_id = Mproduct::where('id','=',$uid)->update($up_data);
                    if(empty($pr_id)){
                        DB::rollBack();
                        return response()->json([
                            'status' => $status,
                            'type' => $type,
                            'title'  => $title,
                            'message'  => translate('Something Went Wrong')
                        ]);
                    }else{
                        DB::commit();
                        return response()->json([
                            'status' => true,
                            'type' => 'success',
                            'title'  => $title,
                            'reload'=> true,
                            'message'  => translate('Status Update Successfully')
                        ]);
                    }
                }
            
            } catch(\Exception $exp) {
                DB::rollBack();
                return response([
                    'status' => false,
                    'type' => 'error',
                    'title'  => $title,
                    'message' => $msg
                    // 'message' => $exp->getMessage()
                ]);
            }
        }else{
            abort(404);
        }
    }

    public function new_product(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('Product');
        $msg = translate('Invalid Request');
       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'short_description' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'is_active' => 'required'
        ]);
        $attrNames = [
            'name' => translate('Name'),
            'short_description' => translate('Short Description'),
            'category_id' => translate('Category'),
            'description' => translate('Description'),
            'Product Details' => translate('Product Details'),
            'is_active' => translate('Status')
        ];
        $validator->setAttributeNames($attrNames); 
        if ($validator->fails()) {
            return response()->json([
                'status' => $status,
                'type' => $type,
                'title'  => $title,
                'message'  => $validator->errors()->all()
            ]);
        }
        
        try {
            DB::beginTransaction();
            $images = array();
            $slider_images = array();
            $image = $request['images'];
            if(isset($image) && !empty($image)){
                foreach ($image as $key => $value) {
                    $images[] = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $value);
                }
            }
            // $slider_images = $request['slider_images'];
            // if(isset($slider_images) && !empty($slider_images)){
            //     foreach ($slider_images as $key => $value) {
            //         $slider_images[] = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $value);
            //     }
            // }
           
            $up_data = array();
            $up_data['image']               = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $request['image']);
            $up_data['name']                = $request['name'];
            $up_data['slug']                = generateSlug('product',$request['name']);
            $up_data['short_description']   = $request['short_description'];
            $up_data['seo_title']           = $request['seo_title'];
            $up_data['seo_description']     = $request['seo_description'];
            $up_data['seo_keywords']        = $request['seo_keywords'];
            $up_data['category_id']         = $request['category_id'];
            $up_data['certification_id']    = json_encode($request['certification_id']);
            $up_data['description']         = $request['description'];
            $up_data['about']               = $request['about'];
            $up_data['product_details']     = $request['product_details'];
            $up_data['attachments']         = $request['filepond'];
            $up_data['section']             = json_encode($request['section']);
            $up_data['section_count']       = json_encode($request['section_count']);
            $up_data['features']             = json_encode($request['features']);
            $up_data['images']              = json_encode($images);
            $up_data['slider_images']       = json_encode($slider_images);
            $up_data['is_active']           = $request['is_active'];
            $up_data['created_by'] = json_encode($updated);
            $up_data['updated_by'] = json_encode($updated);
            $product = Mproduct::insert($up_data);
            if(empty($product)){
                DB::rollBack();
                return response()->json([
                    'status' => $status,
                    'type' => $type,
                    'title'  => $title,
                    'message'  => translate('Something Went Wrong')
                ]);
            }else{
                 DB::commit();
                return response()->json([
                    'status' => true,
                    'type' => 'success',
                    'title'  => $title,
                    'url' => route('admin.product.list'),
                    'message'  => translate('Details Updated Successfully')
                ]);
            }
        } catch(\Exception $exp) {
            DB::rollBack();
            return response([
                'status' => false,
                'type' => 'error',
                'title'  => $title,
                'message' => $msg
            ]);
        }
    }

    public function edit_product(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('Product');
        $msg = translate('Invalid Request');
     
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'is_active' => 'required'
        ]);
        $attrNames = [
            'name' => translate('Name'),
            'short_description' => translate('Short Description'),
            'description' => translate('Description'),
            'category_id' => translate('Product Category'),
            'product_details' => translate('Product Details'),
            
            'is_active' => translate('Status')
        ];
        $validator->setAttributeNames($attrNames); 
        if ($validator->fails()) {
            return response()->json([
                'status' => $status,
                'type' => $type,
                'title'  => $title,
                'message'  => $validator->errors()->all()
            ]);
        }
        
        try {
            DB::beginTransaction();
            if($request['id']!= ''){ 
                $id = decode_string($request['id']);
                $images = array();
                $image = $request['images'];
                if(isset($image) && !empty($image)){
                    foreach ($image as $key => $value) {
                        $images[] = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $value);
                    }
                }
                $slider_images = $request['slider_images'];
                if(isset($slider_images) && !empty($slider_images)){
                    foreach ($slider_images as $key => $value) {
                        $slider_images[] = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $value);
                    }
                }
                $features           = json_encode($request['features']);
                 $section           = json_encode($request['section']);
                 $combined_section = [];

                if (!empty($request['section']) && is_array($request['section'])) {
                    foreach ($request['section'] as $index => $sec) {
                        $combined_section[] = [
                            'name'        => $sec['name'] ?? '',
                            'description' => $sec['description'] ?? '',
                            'features'    => $request['features'][$index] ?? [],
                        ];
                    }
                }
              
                $up_data = array();
                $up_data['name']                = $request['name'];
                $up_data['image']               = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $request['image']);
                $up_data['short_description']   = $request['short_description'];
                $up_data['seo_title']           = $request['seo_title'];
                $up_data['seo_description']     = $request['seo_description'];
                $up_data['seo_keywords']        = $request['seo_keywords'];
                $up_data['category_id']         = $request['category_id'];
                $up_data['certification_id']    = json_encode($request['certification_id']);
                $up_data['description']         = $request['description'];
                $up_data['product_details']     = $request['product_details'];
                $up_data['about']               = $request['about'];
                $up_data['attachments']         = $request['filepond'];
                $up_data['section']             = json_encode($request['section']);
                $up_data['section_count']       = json_encode($request['section_count']);
                $up_data['images']              = json_encode($images);
                $up_data['slider_images']       = json_encode($slider_images);
                $up_data['is_active']           = $request['is_active'];
                $up_data['created_by'] = json_encode($updated);
                $up_data['updated_by'] = json_encode($updated);
                $product = Mproduct::where('id','=',$id)
                        ->update($up_data);
                if(empty($product)){
                    DB::rollBack();
                    return response()->json([
                        'status' => $status,
                        'type' => $type,
                        'title'  => $title,
                        'message'  => translate('Something Went Wrong')
                    ]);
                }else{
                    DB::commit();
                    return response()->json([
                        'status' => true,
                        'type' => 'success',
                        'title'  => $title,
                        'url' => route('admin.product.list'),
                        'message'  => translate('Details Updated Successfully')
                    ]);
                }
            }
            
        } catch(\Exception $exp) {
            DB::rollBack();
            return response([
                'status' => false,
                'type' => 'error',
                'title'  => $title,
                'message' => $msg
            ]);
        }
    }

    public function change_status(Request $request){
        if ($request->ajax()) {
            $status = false;
            $type = 'error';
            $title = translate('Update Product');
            $msg = translate('Invalid Request');
            $id = session('id');
            $updated = array();
            $updated['type'] = 'admin';
            $updated['id'] = $id;
         
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'action' => 'required'
            ]);
            $attrNames = [
                'id' => translate('id')
            ];
            $validator->setAttributeNames($attrNames); 
            if ($validator->fails()) {
                return response()->json([
                    'status' => $status,
                    'type' => $type,
                    'title'  => $title,
                    'message'  => $validator->errors()->all()
                ]);
            }
            try {
                DB::beginTransaction();
                if($request['id']!= ''){    
                    $id = decode_string($request['id']);   
                    $role = Mproduct::where('id','=',$id)->first();           
                    $up_data = array();
                    $up_data['is_active'] = '1';
                    if($role->is_active=='1'){
                        $up_data['is_active'] = '0';
                    }
                    $up_data['updated_by'] = json_encode($updated);
                    $role_id = Mproduct::where('id','=',$id)->update($up_data);
                    if(empty($role_id)){
                        DB::rollBack();
                        return response()->json([
                            'status' => $status,
                            'type' => $type,
                            'title'  => $title,
                            'message'  => translate('Something Went Wrong')
                        ]);
                    }else{
                        DB::commit();
                        return response()->json([
                            'status' => true,
                            'type' => 'success',
                            'title'  => $title,
                            'reload'=> true,
                            'message'  => translate('Status Update Successfully')
                        ]);
                    }
                }
            
            } catch(\Exception $exp) {
                DB::rollBack();
                return response([
                    'status' => false,
                    'type' => 'error',
                    'title'  => $title,
                    'message' => $msg
                    // 'message' => $exp->getMessage()
                ]);
            }
        }else{
            abort(404);
        }
    }

    public function upload(Request $request){
        try {
            $action = $request->input('action');
            if ($action == 'upload_id_card') {
                // Validate the files array from FilePond
                $request->validate([
                    'filepond' => 'required|file|mimes:jpeg,png,pdf|max:3072', // Adjust file types and size as needed
                ]);

                if ($request->file('filepond')) {
                    $file = $request->file('filepond');
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/files'), $filename); // Store file in 'public/uploads/files' directory
                    $filePath = '/uploads/files/' . $filename; // Path to store in database or return to frontend

                    $json['name'] = $filename;
                    $json['type'] = $file->getClientMimeType();
                    $json['path'] = $filePath;
                } else {
                    $json['message'] = 'No files were uploaded.';
                }
            }

            return response()->json($json);
        } catch (\Exception $e) {
            // Log the exception
            Log::error('File upload error: ' . $e->getMessage());

            // Return a generic server error response
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function quick_details(Request $request, $id){
        $id = decode_string($id);
        $product = array();
        try {
            DB::beginTransaction();
                $product = Mproduct::where('id','=',$id)
                        ->first();
            DB::commit();
        } catch(\Exception $exp) {
            DB::rollBack();
            //$exp->getMessage();
        }
        if ($request->ajax() && !empty($product)) {
            return view('backend.product.quick_details',$product);
        }else{
            abort(404);
        }
    }
}
