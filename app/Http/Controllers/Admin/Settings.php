<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Settings As MSettings;

class Settings extends Controller
{
    public function basic(){
        valid_session('settings','basic');
        return view('backend.settings.basic');
    }
    public function update_basic(Request $request){
        $status = false;
        $type = 'error';
        $title = translate('Basic Settings');
        $msg = translate('Invalid Request');
       
        $validator = Validator::make($request->all(), [
            'app_title' => 'required',
            'app_short_title' => 'required',
            'app_language' => 'required',
            'app_timezone' => 'required',
            'app_date_format' => 'required',
            'app_time_format' => 'required',
            'app_footer_credit' => 'required'
        ]);
        $attrNames = [
            'app_title' => translate('App Title'),
            'app_short_title' => translate('App Short Title'),
            'app_language' => translate('App Language'),
            'app_timezone' => translate('App Timezone'),
            'app_date_format' => translate('App Date Format'),
            'app_time_format' => translate('App Time Format'),
            'app_footer_credit' => translate('App Footer Credit'),
            'app_disable_password_reset' => translate('Disable Password Reset'),
            'app_disable_registration' => translate('Disable Registration'),
            'app_disable_google_font' => translate('Disable Google Font')
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
            
            $ui = ['app_title', 'app_short_title', 'app_language', 'app_timezone', 'app_date_format', 'app_time_format', 'app_footer_credit'];
            foreach ($ui as $key ){
                MSettings::where('key', $key)->update(['value' => $request[$key]]);
            }

            $ui = ['app_disable_password_reset','app_disable_registration','app_disable_google_font'];
            foreach ($ui as $key) {
                $val = 'off';
                if($request[$key]=='on'){
                    $val = 'on';
                }
                MSettings::where('key', $key)->update(['value' => $val]);
            }
            DB::commit();

            return response()->json([
                'status' => true,
                'type' => 'success',
                'title'  => $title,
                'message'  => translate('Basic Settings Updated Successfully'),
                //'url'  => route('admin.dashboard')
            ]);

        } catch(\Exception $exp) {
            DB::rollBack();

            return response([
                'status' => false,
                'type' => 'error',
                'title'  => $title,
                'message' => $msg
                //'message' => $exp->getMessage()
            ]);
        }
    }
    public function theme(){
        valid_session('settings','theme');
        return view('backend.settings.theme');
    }
    public function update_theme(Request $request){
        $status = false;
        $type = 'error';
        $title = translate('Theme Settings');
        $msg = translate('Invalid Request');
        
        // print_r($request->all()); die;
        if ($image = $request->file('app_logo')) {
            $destinationPath = public_path('images/');
            !is_dir($destinationPath) && mkdir($destinationPath, 0777, true);
            $logoImage = 'logo' . ".png";
            // $logoImage = 'logo' . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $logoImage);
        }

        $validator = Validator::make($request->all(), [
            'app_primary_color' => 'required',
            'app_secondary_color' => 'required',
            'app_menubar' => 'required'
        ]);
        $attrNames = [
            'app_primary_color' => translate('App Primary Color'),
            'app_secondary_color' => translate('App Secondary Color'),
            'app_menubar' => translate('App Menubar'),
            'app_rtl_mode' => translate('App RTL Mode')
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
            
            $ui = ['app_primary_color', 'app_secondary_color', 'app_menubar'];
            foreach ($ui as $key ){
                MSettings::where('key', $key)
                    ->update(['value' => $request[$key]]);
            }

            $ui = ['app_rtl_mode'];
            foreach ($ui as $key) {
                $val = $request[$key]=='on' ? 'on' : 'off';
                MSettings::where('key', $key)
                    ->update(['value' => $val]);
            } 
            DB::commit();
            return response()->json([
                'status' => true,
                'type' => 'success',
                'title'  => $title,
                'message'  => translate('Basic Settings Updated Successfully'),
                //'url'  => route('admin.dashboard')
            ]);

        } catch(\Exception $exp) {
            DB::rollBack();

            return response([
                'status' => false,
                'type' => 'error',
                'title'  => $title,
                'message' => $msg
                //'message' => $exp->getMessage()
            ]);
        }
    }
}
