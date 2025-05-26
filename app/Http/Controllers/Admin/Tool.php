<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Tool As Mtool;
use App\Models\Category;
use App\Models\Certification;
use Carbon\Carbon;

class Tool extends Controller
{   
    public function list(){
        valid_session(translate('tool'),'list');
        return view('backend.tool.list');
    }
    public function add(){
        $page_data = array();
        $page_data['page_title']    = 'New Tool';
        $page_data['page_action']   = route('admin.tool.add_tool');
        return view('backend.tool.add-edit',$page_data);
    }
    public function edit($id){
        
        $id = decode_string($id);
        $page_data = array();
        $page_data['page_title']    = 'Update Tool';
        $page_data['id']            = '';
        $page_data['page_action']   = route('admin.tool.edit_tool');
        if($id!=''){
            $page_data['id'] = encode_string($id);
            $page_data['tool'] = Mtool::where('id','=',$id)->first()->toArray();
        }
        return view('backend.tool.add-edit',$page_data);
            
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
                $totalData = Mtool::count();
                $totalFiltered = Mtool::where('name','LIKE','%'.$like.'%')
                                ->count();
                $datalist = Mtool::where('name','LIKE','%'.$like.'%')
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
                $edit = '<a href="'.route('admin.tool.edit',['id'=>encode_string($list->id)]).'" class="btn ripple btn-primary btn-sm mt-1 mb-1 text-sm text-white" data-placement="top" data-toggle="tooltip" title="'.translate('Edit').'"> <i class="fa fa-edit"></i> </a>';
                $details = '<a href="'.route('admin.tool.quick_details',['id'=>encode_string($list->id)]).'" class="btn ripple btn-secondary btn-sm mt-1 mb-1 text-sm text-white popup-page" data-placement="top" data-toggle="tooltip" title="'.translate('Details').'"> <i class="fa fa-eye"></i> </a>';
                $status = $list->is_active=='1' ? '<span class="badge bg-success cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.tool.change_status').'">'.translate('active').'</span>' : '<span class="badge bg-danger cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.tool.change_status').'">'.translate('Inactive').'</span>';
                $image = uploads_url($list->image,uploads_url('default.png'));
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

    public function new_tool(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('Tool');
        $msg = translate('Invalid Request');
       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'is_active' => 'required'
        ]);
        $attrNames = [
            'name' => translate('Name'),
            'short_description' => translate('Short Description'),
            'description' => translate('Description'),
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
            $up_data['slug']                = generateSlug('tool',$request['name']);
            $up_data['short_description']   = $request['short_description'];
            $up_data['seo_title']           = $request['seo_title'];
            $up_data['seo_description']     = $request['seo_description'];
            $up_data['seo_keywords']        = $request['seo_keywords'];
            $up_data['description']         = $request['description'];
            $up_data['section']             = json_encode($request['section']);
            $up_data['images']              = json_encode($images);
            $up_data['is_active']           = $request['is_active'];
            $up_data['created_by'] = json_encode($updated);
            $up_data['updated_by'] = json_encode($updated);
            $tool = Mtool::insert($up_data);
            if(empty($tool)){
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
                    'url' => route('admin.tool.list'),
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

    public function edit_tool(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('Tool');
        $msg = translate('Invalid Request');
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'is_active' => 'required'
        ]);
        $attrNames = [
            'name' => translate('Name'),
            'short_description' => translate('Short Description'),
            'description' => translate('Description'),
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
                $up_data['description']         = $request['description'];
                $up_data['section']             = json_encode($request['section']);
                $up_data['images']              = json_encode($images);
                $up_data['is_active']           = $request['is_active'];
                $up_data['created_by'] = json_encode($updated);
                $up_data['updated_by'] = json_encode($updated);
                $tool = Mtool::where('id','=',$id)
                        ->update($up_data);
                if(empty($tool)){
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
                        'url' => route('admin.tool.list'),
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
            $title = translate('Update Tool');
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
                    $role = Mtool::where('id','=',$id)->first();           
                    $up_data = array();
                    $up_data['is_active'] = '1';
                    if($role->is_active=='1'){
                        $up_data['is_active'] = '0';
                    }
                    $up_data['updated_by'] = json_encode($updated);
                    $role_id = Mtool::where('id','=',$id)->update($up_data);
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
        $tool = array();
        try {
            DB::beginTransaction();
                $tool = Mtool::where('id','=',$id)
                        ->first();
            DB::commit();
        } catch(\Exception $exp) {
            DB::rollBack();
            //$exp->getMessage();
        }
        if ($request->ajax() && !empty($tool)) {
            return view('backend.tool.quick_details',$tool);
        }else{
            abort(404);
        }
    }
}
