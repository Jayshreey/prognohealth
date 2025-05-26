<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Journey As Mjourney;
// use App\Models\journey_category;
use Carbon\Carbon;

class Journey extends Controller
{   
    public function list(){
        valid_session('Journey','list');
        return view('backend.journey.list');
    }

    public function add(Request $request){
        if ($request->ajax()) {
            $journey_data = array();
            $journey_data['journey_title']    = 'New journey';
            $journey_data['journey_action']   = route('admin.journey.add_journey');
            // $journey_data['journey_category']  = journey_category::where('is_active','=','1')
            //                          //   ->get();
            return view('backend.journey.add-edit',$journey_data);
        }else{
            abort(404);
        }
    }

    public function edit(Request $request,$id){
        if ($request->ajax()) {
            $id = decode_string($id);
            $journey_data = array();
            $journey_data['journey_title'] = 'Update journey';
            $journey_data['id'] = '';
            $journey_data['journey_action'] = route('admin.journey.edit_journey');
            // $journey_data['journey_category']  = journey_category::where('is_active','=','1')
            //                             ->get();
            if($id!=''){
                $journey_data['id'] = encode_string($id);
                $journey_data['journey'] = Mjourney::where('id','=',$id)->first();
            }
            return view('backend.journey.add-edit',$journey_data);
        }else{
            abort(404);
        }
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
                $totalData = Mjourney::count();
                $totalFiltered = Mjourney::where('title','LIKE','%'.$like.'%')
                                ->count();
                $datalist = Mjourney::where('title','LIKE','%'.$like.'%')
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
                if(valid_session('Journey','edit',false)){
                    $edit = '<a href="'.route('admin.journey.edit',['id'=>encode_string($list->id)]).'" class="btn ripple btn-primary btn-sm mt-1 mb-1 text-sm text-white popup-page" data-placement="top" data-toggle="tooltip" title="'.translate('Edit').'"> <i class="fa fa-edit"></i> </a>';
                }
                $details = '<a href="'.route('admin.journey.quick_details',['id'=>encode_string($list->id)]).'" class="btn ripple btn-secondary btn-sm mt-1 mb-1 text-sm text-white popup-page" data-placement="top" data-toggle="tooltip" title="'.translate('Details').'"> <i class="fa fa-eye"></i> </a>';
                $status = $list->is_active=='1' ? '<span class="badge bg-success cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.journey.change_status').'">'.translate('active').'</span>' : '<span class="badge bg-danger cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.journey.change_status').'">'.translate('Inactive').'</span>';

                $nestedData = array();
                $nestedData['id']           = $list->id;
                $nestedData['title']        = $list->title;
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


    public function new_journey(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('journey');
        $msg = translate('Invalid Request');
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            //'journey_category_id' => 'required',
            'is_active' => 'required',
            'description' => 'required',
        ]);
        $attrNames = [
            'title' => translate('journey Title'),
            'description' => translate('Description'),
            //'journey_category_id' => translate('journey Category'),
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
            $up_data['title']        = $request['title'];
            $up_data['slug']            = generateSlug('journey',$request['title']);
            $up_data['is_active']       = $request['is_active'];
            $up_data['description']     = $request['description'];
           // $up_data['journey_category_id'] = $request['journey_category_id'];
            $up_data['created_by'] = json_encode($updated);
            $up_data['updated_by'] = json_encode($updated);
            $journey = Mjourney::insert($up_data);
            if(empty($journey)){
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

    public function edit_journey(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('journey');
        $msg = translate('Invalid Request');
        
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            // 'journey_category_id' => 'required',
            'is_active' => 'required',
            'description' => 'required',
        ]);
        $attrNames = [
            'title' => translate('title'),
            'description' => translate('Description'),
            // 'journey_category_id' => translate('journey Category'),
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
                $up_data['title']        = $request['title'];
                $up_data['slug']            = generateSlug('journey',$request['title']);
                $up_data['is_active']       = $request['is_active'];
                $up_data['description']     = $request['description'];
             // $up_data['journey_category_id'] = $request['journey_category_id'];
                $up_data['created_by']  = json_encode($updated);
                $up_data['updated_by']  = json_encode($updated);
                $journey = Mjourney::where('id','=',$id)->update($up_data);
                if(empty($journey)){
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
            $title = translate('Update journey');
            $msg = translate('Invalid Request');
            if(!valid_session('Journey','edit',false)){
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
                    $role = Mjourney::where('id','=',$id)->first();           
                    $up_data = array();
                    $up_data['is_active'] = '1';
                    if($role->is_active=='1'){
                        $up_data['is_active'] = '0';
                    }
                    $up_data['updated_by'] = json_encode($updated);
                    $role_id = Mjourney::where('id','=',$id)->update($up_data);
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
        $journey = array();
        try {
            DB::beginTransaction();
                $journey = Mjourney::where('id','=',$id)->first();
            DB::commit();
        } catch(\Exception $exp) {
            DB::rollBack();
            //$exp->getMessage();
        }
        if ($request->ajax() && !empty($journey)) {
            return view('backend.journey.quick_details',$journey);
        }else{
            abort(404);
        }
    }
}
