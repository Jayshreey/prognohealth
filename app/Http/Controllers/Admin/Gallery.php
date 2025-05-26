<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Gallery As Mgallery;
use App\Models\Gallery_category;
use Carbon\Carbon;

class Gallery extends Controller
{   
    public function list(){
        valid_session(translate('gallery'),'list');
        return view('backend.gallery.list');
    }
    public function add(){
        
        $page_data = array();
        $page_data['page_title'] = 'New Gallery';
        $page_data['page_action'] = route('admin.gallery.add_gallery');
        $page_data['gallery_category'] = Gallery_category::where('is_active','=','1')
                                        ->get();
        return view('backend.gallery.add-edit',$page_data);
        
    }
    public function edit($id){
        
        $id = decode_string($id);
        $page_data = array();
        $page_data['page_title'] = 'Update Gallery';
        $page_data['id'] = '';
        $page_data['page_action'] = route('admin.gallery.edit_gallery');
        $page_data['gallery_category'] = Gallery_category::where('is_active','=','1')
                                        ->get();
        if($id!=''){
            $page_data['id'] = encode_string($id);
            $page_data['gallery'] = Mgallery::where('id','=',$id)->first();
        }
        return view('backend.gallery.add-edit',$page_data);
            
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
                $totalData = Mgallery::count();
                $totalFiltered = Mgallery::where('name','LIKE','%'.$like.'%')
                                ->count();
                $datalist = Mgallery::where('name','LIKE','%'.$like.'%')
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
                $edit = '<a href="'.route('admin.gallery.edit',['id'=>encode_string($list->id)]).'" class="btn ripple btn-primary btn-sm mt-1 mb-1 text-sm text-white" data-placement="top" data-toggle="tooltip" title="'.translate('Edit').'"> <i class="fa fa-edit"></i> </a>';
                $details = '<a href="'.route('admin.gallery.quick_details',['id'=>encode_string($list->id)]).'" class="btn ripple btn-secondary btn-sm mt-1 mb-1 text-sm text-white popup-page" data-placement="top" data-toggle="tooltip" title="'.translate('Details').'"> <i class="fa fa-eye"></i> </a>';
                $status = $list->is_active=='1' ? '<span class="badge bg-success cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.gallery.change_status').'">'.translate('active').'</span>' : '<span class="badge bg-danger cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.gallery.change_status').'">'.translate('Inactive').'</span>';
                $image = uploads_image($list->image,uploads_image('default.png'));
                $nestedData = array();
                $nestedData['id']           = $list->id;
                $nestedData['image']        = '<a data-fancybox="image" data-src="'.$image.'" data-caption="'.$list->name.'"><img alt="'.$list->name.'" class="radius cursor-pointer image-delay" src="'.uploads_url('loader.gif').'" data-src="'.$image.'" style="width:48px;height:48px;"></a>';      
                $nestedData['name']         = $list->name;
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

    public function new_gallery(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('Gallery');
        $msg = translate('Invalid Request');
       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'short_description' => 'required',
            'gallery_category_id' => 'required',
            'is_active' => 'required'
        ]);
        $attrNames = [
            'name' => translate('Name'),
            'short_description' => translate('Short Description'),
            'gallery_category_id' => translate('Gallery Category'),
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
            $image = $request['images'];
            if(isset($image) && !empty($image)){
                foreach ($image as $key => $value) {
                    $images[] = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $value);
                }
            }
            $up_data = array();
            $up_data['image']               = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $request['image']);
            $up_data['name']                = $request['name'];
            $up_data['slug']                = generateSlug('gallery',$request['name']);
            $up_data['short_description']   = $request['short_description'];
            $up_data['seo_title']           = $request['seo_title'];
            $up_data['seo_description']     = $request['seo_description'];
            $up_data['seo_keywords']        = $request['seo_keywords'];
            $up_data['gallery_category_id'] = $request['gallery_category_id'];
            $up_data['features']            = json_encode($request['features']);
            $up_data['images']              = json_encode($images);
            $up_data['is_active']           = $request['is_active'];
            $up_data['created_by'] = json_encode($updated);
            $up_data['updated_by'] = json_encode($updated);
            $gallery = Mgallery::insert($up_data);
            if(empty($gallery)){
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
                    'url' => route('admin.gallery.list'),
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

    public function edit_gallery(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('Gallery');
        $msg = translate('Invalid Request');
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'short_description' => 'required',
            'gallery_category_id' => 'required',
            'is_active' => 'required'
        ]);
        $attrNames = [
            'name' => translate('Name'),
            'short_description' => translate('Short Description'),
            'gallery_category_id' => translate('Gallery Category'),
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
                $up_data = array();
                $up_data['name']                = $request['name'];
                $up_data['image']               = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $request['image']);
                $up_data['short_description']   = $request['short_description'];
                $up_data['seo_title']           = $request['seo_title'];
                $up_data['seo_description']     = $request['seo_description'];
                $up_data['seo_keywords']        = $request['seo_keywords'];
                $up_data['gallery_category_id'] = $request['gallery_category_id'];
                $up_data['features']            = json_encode($request['features']);
                $up_data['images']              = json_encode($images);
                $up_data['is_active']           = $request['is_active'];
                $up_data['created_by'] = json_encode($updated);
                $up_data['updated_by'] = json_encode($updated);
                $gallery = Mgallery::where('id','=',$id)
                        ->update($up_data);
                if(empty($gallery)){
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
                        'url' => route('admin.gallery.list'),
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
            $title = translate('Update Gallery');
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
                    $role = Mgallery::where('id','=',$id)->first();           
                    $up_data = array();
                    $up_data['is_active'] = '1';
                    if($role->is_active=='1'){
                        $up_data['is_active'] = '0';
                    }
                    $up_data['updated_by'] = json_encode($updated);
                    $role_id = Mgallery::where('id','=',$id)->update($up_data);
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
    public function quick_details(Request $request, $id){
        $id = decode_string($id);
        $gallery = array();
        try {
            DB::beginTransaction();
                $gallery = Mgallery::where('id','=',$id)
                        ->first();
            DB::commit();
        } catch(\Exception $exp) {
            DB::rollBack();
            //$exp->getMessage();
        }
        if ($request->ajax() && !empty($gallery)) {
            return view('backend.gallery.quick_details',$gallery);
        }else{
            abort(404);
        }
    }
}
