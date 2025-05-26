<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Review As Mreview;
use App\Models\Review_category;
use Carbon\Carbon;

class Review extends Controller
{   
    public function list(){
        valid_session('review','list');
        return view('backend.review.list');
    }

    public function add(Request $request){
        if ($request->ajax()) {
            $page_data = array();
            $page_data['page_title'] = 'New Review';
            $page_data['page_action'] = route('admin.review.add_review');
            $page_data['review_category'] = Review_category::where('is_active','=','1')->get();
            return view('backend.review.add-edit',$page_data);
        }else{
            abort(404);
        }
    }

    public function edit(Request $request,$id){
        if ($request->ajax()) {
            $id = decode_string($id);
            $page_data = array();
            $page_data['page_title'] = 'Update Review';
            $page_data['id'] = '';
            $page_data['page_action'] = route('admin.review.edit_review');
            $page_data['review_category'] = Review_category::where('is_active','=','1')->get();
            if($id!=''){
                $page_data['id'] = encode_string($id);
                $page_data['review'] = Mreview::where('id','=',$id)->first();
            }
            return view('backend.review.add-edit',$page_data);
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
                $totalData = Mreview::count();
                $totalFiltered = Mreview::where('name','LIKE','%'.$like.'%')
                                ->count();
                $datalist = Mreview::where('name','LIKE','%'.$like.'%')
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
                if(valid_session('review','edit',false)){
                    $edit = '<a href="'.route('admin.review.edit',['id'=>encode_string($list->id)]).'" class="btn ripple btn-primary btn-sm mt-1 mb-1 text-sm text-white popup-page" data-placement="top" data-toggle="tooltip" title="'.translate('Edit').'"> <i class="fa fa-edit"></i> </a>';
                }
                $details = '<a href="'.route('admin.review.quick_details',['id'=>encode_string($list->id)]).'" class="btn ripple btn-secondary btn-sm mt-1 mb-1 text-sm text-white popup-page" data-placement="top" data-toggle="tooltip" title="'.translate('Details').'"> <i class="fa fa-eye"></i> </a>';
                $status = $list->is_active=='1' ? '<span class="badge bg-success cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.review.change-status').'">'.translate('active').'</span>' : '<span class="badge bg-danger cursor-pointer change-status" data-action="change_status" data-id="'.encode_string($list->id).'" data-url="'.route('admin.review.change-status').'">'.translate('Inactive').'</span>';
                $image = $list->image;//uploads_url($list->image,uploads_url('default.png'));
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


    public function new_review(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('Review');
        $msg = translate('Invalid Request');
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'position' => 'required',
            'rating' => 'required',
            'review_category_id' => 'required',
            'is_active' => 'required',
            'description_title' => 'required',
            'description' => 'required',
        ]);
        $attrNames = [
            'name' => translate('Name'),
            'position' => translate('Position'),
            'rating' => translate('Rating'),
            'review_category_id' => translate('Review Category'),
            'is_active' => translate('Status'),
            'description_title' => translate('description_title'),
            'description' => translate('Description')
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
            $up_data['image']     = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $request['image']);
            $up_data['name']      = $request['name'];
            $up_data['slug']      = generateSlug('review',$request['name']);
            $up_data['position']  = $request['position'];
            $up_data['review_category_id']    = json_encode($request['review_category_id']);
            $up_data['rating']    = $request['rating'];
            $up_data['is_active'] = $request['is_active'];
            $up_data['description_title'] = $request['description_title'];
            $up_data['description'] = $request['description'];
            $up_data['created_by'] = json_encode($updated);
            $up_data['updated_by'] = json_encode($updated);
            $review = Mreview::insert($up_data);
            if(empty($review)){
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

    public function edit_review(Request $request){
        $updated = array();
        $updated['type'] = 'admin';
        $updated['id'] = session('id');
        $status = false;
        $type = 'error';
        $title = translate('Review');
        $msg = translate('Invalid Request');
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'position' => 'required',
            'rating' => 'required',
            'review_category_id' => 'required',
            'is_active' => 'required',
            'description_title' => 'required',
            'description' => 'required',
        ]);
        $attrNames = [
            'name' => translate('Name'),
            'position' => translate('Position'),
            'rating' => translate('Rating'),
            'review_category_id' => translate('Review Category'),
            'is_active' => translate('Status'),
            'description_title' => translate('description_title'),
            'description' => translate('Description')
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
                $up_data['image']     = str_replace(['http:'.getBaseURL().'public/uploads/','https:'.getBaseURL().'public/uploads/'],['',''], $request['image']);
                $up_data['slug']      = generateSlug('review',$request['name']);
                $up_data['name']      = $request['name'];
                $up_data['review_category_id']    = json_encode($request['review_category_id']);
                $up_data['is_active'] = $request['is_active'];
                $up_data['description'] = $request['description'];
                $up_data['description_title'] = $request['description_title'];
                $up_data['position']  = $request['position'];
                $up_data['rating']    = $request['rating'];
                $up_data['created_by'] = json_encode($updated);
                $up_data['updated_by'] = json_encode($updated);
                $review = Mreview::where('id','=',$id)->update($up_data);
                if(empty($review)){
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
            $title = translate('Update Review');
            $msg = translate('Invalid Request');
            if(!valid_session('Review','edit',false)){
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
                    $role = Mreview::where('id','=',$id)->first();           
                    $up_data = array();
                    $up_data['is_active'] = '1';
                    if($role->is_active=='1'){
                        $up_data['is_active'] = '0';
                    }
                    $up_data['updated_by'] = json_encode($updated);
                    $role_id = Mreview::where('id','=',$id)->update($up_data);
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
        $review = array();
        try {
            DB::beginTransaction();
                $review = Mreview::where('id','=',$id)->first();
            DB::commit();
        } catch(\Exception $exp) {
            DB::rollBack();
            //$exp->getMessage();
        }
        if ($request->ajax() && !empty($review)) {
            return view('backend.review.quick_details',$review);
        }else{
            abort(404);
        }
    }
}
