<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Category As MCategory;
use Carbon\Carbon;

class Category extends Controller{   
    public function list(){
        valid_session('category','list');
        return view('backend.category.list');
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
                $totalData = MCategory::count();
                $totalFiltered = MCategory::where('name','LIKE','%'.$like.'%')
                                ->count();
                $datalist = MCategory::where('name','LIKE','%'.$like.'%')
                                ->skip($start)
                                ->take($limit)
                                ->orderBy($order,$order_dir)
                                ->get();
            DB::commit();
        } catch(\Exception $exp) {
            DB::rollBack();
        }
        if ( isset($datalist) && ! empty($datalist)) {
            foreach ($datalist as $list) {
                $edit = '';
                if(valid_session('category','edit',false)){
                    $edit = '<a href="'.route('admin.category.edit',['id'=>encode_string($list->id)]).'" class="btn ripple btn-primary btn-sm mt-1 mb-1 text-sm text-white popup-page" data-placement="top" data-toggle="tooltip" title="'.translate('Edit').'"> <i class="fa fa-edit"></i> </a>';
                }
                if($list->country == '')
                {
                    $list->country='India';
                }
                $details = '<a href="'.route('admin.category.quick_details',['id'=>encode_string($list->id)]).'" class="btn ripple btn-secondary btn-sm mt-1 mb-1 text-sm text-white popup-page" data-placement="top" data-toggle="tooltip" title="'.translate('Details').'"> <i class="fa fa-eye"></i> </a>';
                $status = $list->is_active=='1' ? '<span class="badge bg-success cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.category.change_status').'">'.translate('active').'</span>' : '<span class="badge bg-danger cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.category.change_status').'">'.translate('Inactive').'</span>';
                $nestedData = array();
                $nestedData['id']           = $list->id;
                $nestedData['name']         = $list->name;
                $nestedData['parent']       = get_category_path_name_string($list->path);
                $nestedData['country']      = $list->country;
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

    public function add(Request $request){
        if ($request->ajax()) {
            $page_data = array();
            $page_data['page_title']    = 'New Category';
            $page_data['page_action']   = route('admin.category.add_category');
            $page_data['parent']        = MCategory::where('is_active','=','1')->get();
            return view('backend.category.add-edit',$page_data);
        }else{
            abort(404);
        }
    }

    public function edit(Request $request,$id){
        if ($request->ajax()) {
            $id = decode_string($id);
            $page_data = array();
            $page_data['page_title'] = 'Update Category';
            $page_data['id'] = '';
            $page_data['page_action'] = route('admin.category.edit_category');
            $page_data['parent']        = MCategory::where('is_active','=','1')->where('id','!=',$id)->get();
            if($id!=''){
                $page_data['id'] = encode_string($id);
                $page_data['category'] = MCategory::where('id','=',$id)
                                    ->first();
            }
            return view('backend.category.add-edit',$page_data);
        }else{
            abort(404);
        }
    }

    public function new_category(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('Category');
        $msg = translate('Invalid Request');
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent_id' => 'required',
            'is_active' => 'required'
        ]);
        $attrNames = [
            'name' => translate('Name'),
            'parent_id' => translate('Parent'),
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
            $up_data = array();
            $up_data['name']        = $request['name'];
            $up_data['country']        = $request['country'];
            $up_data['slug']        = generateSlug('category',$request['name']);
            $up_data['parent_id']   = $request['parent_id'];
            $up_data['is_active']   = $request['is_active'];
            $up_data['created_by']  = json_encode($updated);
            $up_data['updated_by']  = json_encode($updated);
            $category = MCategory::insert($up_data);
            if(empty($category)){
                DB::rollBack();
                return response()->json([
                    'status' => $status,
                    'type' => $type,
                    'title'  => $title,
                    'message'  => translate('Something Went Wrong')
                ]);
            }else{
                DB::commit();
                rearrange_categories();
                return response()->json([
                    'status' => true,
                    'type' => 'success',
                    'title'  => $title,
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

    public function edit_category(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('Category');
        $msg = translate('Invalid Request');
       
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent_id' => 'required',
            'is_active' => 'required',
            'country' => 'required',

        ]);
        $attrNames = [
            'name' => translate('Name'),
            'country' => translate('Country'),
            'parent_id' => translate('Parent'),
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
                $up_data = array();
                $up_data['name']        = $request['name'];
                $up_data['country']        = $request['country'];
                $up_data['slug']        = generateSlug('category',$request['name']);
                $up_data['parent_id']   = $request['parent_id'];
                $up_data['is_active']   = $request['is_active'];
                $up_data['created_by']  = json_encode($updated);
                $up_data['updated_by']  = json_encode($updated);
                $category = MCategory::where('id','=',$id)
                        ->update($up_data);
                if(empty($category)){
                    DB::rollBack();
                    return response()->json([
                        'status' => $status,
                        'type' => $type,
                        'title'  => $title,
                        'message'  => translate('Something Went Wrong')
                    ]);
                }else{
                    DB::commit();
                    rearrange_categories();
                    return response()->json([
                        'status' => true,
                        'type' => 'success',
                        'title'  => $title,
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
            $title = translate('Update Category');
            $msg = translate('Invalid Request');
            if(!valid_session('category','edit',false)){
                return response()->json([
                    'status' => $status,
                    'type' => $type,
                    'title'  => $title,
                    'message'  => $msg
                ]);
            }
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
                    $category = MCategory::where('id','=',$id)->first();           
                    $up_data = array();
                    $up_data['is_active'] = '1';
                    if($category->is_active=='1'){
                        $up_data['is_active'] = '0';
                    }
                    $up_data['updated_by'] = json_encode($updated);
                    $c_id = MCategory::where('id','=',$id)->update($up_data);
                    if(empty($c_id)){
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
        $category = array();
        try {
            DB::beginTransaction();
                $category = MCategory::where('id','=',$id)
                        ->first();
            DB::commit();
        } catch(\Exception $exp) {
            DB::rollBack();
            //$exp->getMessage();
        }
        if ($request->ajax() && !empty($category)) {
            return view('backend.category.quick_details',$category);
        }else{
            abort(404);
        }
    }
}
