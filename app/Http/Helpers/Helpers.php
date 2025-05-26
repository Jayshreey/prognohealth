<?php
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Language_translation;
use App\Models\User;
use App\Models\Role;
use App\Models\Settings;
use App\Models\Category;
use App\Models\Gallery_category;

if(!function_exists('get_parent_categories')){
    function get_parent_categories($id=0,$data=array()){
        $category = Category::where('id','=',$id)->first();
        if(isset($category) && !empty($category)){
            $data[] = $category['id'];
            return get_parent_categories($category['parent_id'],$data);
        }
        return array_reverse($data);
    }
}

if(!function_exists('rearrange_categories')){
    function rearrange_categories(){
        $category = Category::get();
        if(isset($category) && !empty($category)){ foreach ($category as $key => $value) {
            $path_array = get_parent_categories($value['parent_id']);
            $path = !empty($path_array) ? implode('-', $path_array) : 0;
            Category::where('id','=',$value['id'])->update(['path'=>$path]);
        } }
    }
}

if(!function_exists('get_category_path_name_string')){
    function get_category_path_name_string($path=0,$id=0){
        if($path!=0){
            $list = array();
            $paths = explode('-', $path);
            foreach ($paths as $key => $value) {
                $list[] = getColumnValue('category',['id'=>$value],'name');
            }
            if($id!=0){
                $list[] = getColumnValue('category',['id'=>$id],'name');
            }
            return implode(' » ', $list);
        }else{
            if($id!=0){
                return getColumnValue('category',['id'=>$id],'name');
            }else{
                return translate('No Parent');
            }
        }
    }
}

if(!function_exists('get_gallery_parent_categories')){
    function get_gallery_parent_categories($id=0,$data=array()){
        $gly_category = Gallery_category::where('id','=',$id)->first();
        if(isset($gly_category) && !empty($gly_category)){
            $data[] = $gly_category['id'];
            return get_gallery_parent_categories($gly_category['parent_id'],$data);
        }
        return array_reverse($data);
    }
}

if(!function_exists('rearrange_gallery_categories')){
    function rearrange_gallery_categories(){
        $gly_category = Gallery_category::get();
        if(isset($gly_category) && !empty($gly_category)){ foreach ($gly_category as $gkey => $gvalue) {
            $gly_path_array = get_gallery_parent_categories($gvalue['parent_id']);
            $path = !empty($gly_path_array) ? implode('-', $gly_path_array) : 0;
            Gallery_category::where('id','=',$gvalue['id'])->update(['path'=>$path]);
        } }
    }
}

if(!function_exists('get_gallery_category_path_name_string')){
    function get_gallery_category_path_name_string($path=0,$id=0){
        if($path!=0){
            $list = array();
            $paths = explode('-', $path);
            foreach ($paths as $key => $value) {
                $list[] = getColumnValue('gallery_category',['id'=>$value],'name');
            }
            if($id!=0){
                $list[] = getColumnValue('gallery_category',['id'=>$id],'name');
            }
            return implode(' » ', $list);
        }else{
            if($id!=0){
                return getColumnValue('gallery_category',['id'=>$id],'name');
            }else{
                return translate('No Parent');
            }
        }
    }
}

if (!function_exists('app_setting')) {
    function app_setting($key, $default = null){
        $settings = Cache::remember('app_settings', 86400, function () {
            return Settings::all();
        });

        $setting = $settings->where('key', $key)->first();

        return $setting == null ? $default : $setting->value;
    }
}
if(!function_exists('create_dt_length_menu')){
    function create_dt_length_menu($rpp = ''){
        $list = array(10,20,25,50,100,500);
        if($rpp!=''){ $list[] = $rpp; }
        $list = array_unique($list); sort($list);
        $list = implode(",",$list);
        return '['.$list.']';
    }
}
if(!function_exists('encode_string')){
    function encode_string($string){
        $string = Crypt::encryptString($string);
        return $string;
    }
}
if(!function_exists('decode_string')){
    function decode_string($string){
        $string = Crypt::decryptString($string);
        return $string;
    }
}
if (!function_exists('translate')) {
    function translate($key, $lang = null, $addslashes = false){
        if ($lang == null) {
            $lang = App::getLocale();
        }

        $lang_key = preg_replace('/[^A-Za-z0-9\_]/', '', str_replace(' ', '_', strtolower($key)));
        $translations_en = Cache::rememberForever('translations-en', function () {
            return Language_translation::where('lang', 'en')->pluck('lang_value', 'lang_key')->toArray();
        });

        if (!isset($translations_en[$lang_key])) {
            $translation_def = new Language_translation;
            $translation_def->lang = 'en';
            $translation_def->lang_key = $lang_key;
            $translation_def->lang_value = str_replace(array("\r", "\n", "\r\n"), "", $key);
            $translation_def->save();
            Cache::forget('translations-en');
        }

        // return user session lang
        $translation_locale = Cache::rememberForever("translations-{$lang}", function () use ($lang) {
            return Language_translation::where('lang', $lang)->pluck('lang_value', 'lang_key')->toArray();
        });
        if (isset($translation_locale[$lang_key])) {
            return $addslashes ? addslashes(trim($translation_locale[$lang_key])) : trim($translation_locale[$lang_key]);
        }

        // return default lang if session lang not found
        $translations_default = Cache::rememberForever('translations-' . env('DEFAULT_LANGUAGE', 'en'), function () {
            return Language_translation::where('lang', env('DEFAULT_LANGUAGE', 'en'))->pluck('lang_value', 'lang_key')->toArray();
        });
        if (isset($translations_default[$lang_key])) {
            return $addslashes ? addslashes(trim($translations_default[$lang_key])) : trim($translations_default[$lang_key]);
        }

        // fallback to en lang
        if (!isset($translations_en[$lang_key])) {
            return trim($key);
        }
        return $addslashes ? addslashes(trim($translations_en[$lang_key])) : trim($translations_en[$lang_key]);
    }
}
if (!function_exists('app_timezone')) {
    function app_timezone()
    {
        return config('app.timezone');
    }
}

if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        return app('url')->asset( $path.'?v=1.0.1', $secure);
    }
}


if (!function_exists('isHttps')) {
    function isHttps()
    {
        return !empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS']);
    }
}

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = '//' . $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        return $root;
    }
}


if (!function_exists('getFileBaseURL')) {
    function getFileBaseURL()
    {
        return getBaseURL();
    }
}


if (!function_exists('isUnique')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function isUnique($email)
    {
        $user = \App\Models\User::where('email', $email)->first();

        if ($user == null) {
            return true; // $user = null means we did not get any match with the email provided by the user inside the database
        } else {
            return false;
        }
    }
}

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null, $lang = false)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return BusinessSetting::all();
        });

        if ($lang == false) {
            $setting = $settings->where('type', $key)->first();
        } else {
            $setting = $settings->where('type', $key)->where('lang', $lang)->first();
            $setting = !$setting ? $settings->where('type', $key)->first() : $setting;
        }
        return $setting == null ? $default : $setting->value;
    }
}


if (!function_exists('timezones')) {
    function timezones()
    {
        return [
            '(GMT-12:00) International Date Line West' => 'Pacific/Kwajalein',
            '(GMT-11:00) Midway Island' => 'Pacific/Midway',
            '(GMT-11:00) Samoa' => 'Pacific/Apia',
            '(GMT-10:00) Hawaii' => 'Pacific/Honolulu',
            '(GMT-09:00) Alaska' => 'America/Anchorage',
            '(GMT-08:00) Pacific Time (US & Canada)' => 'America/Los_Angeles',
            '(GMT-08:00) Tijuana' => 'America/Tijuana',
            '(GMT-07:00) Arizona' => 'America/Phoenix',
            '(GMT-07:00) Mountain Time (US & Canada)' => 'America/Denver',
            '(GMT-07:00) Chihuahua' => 'America/Chihuahua',
            '(GMT-07:00) La Paz' => 'America/Chihuahua',
            '(GMT-07:00) Mazatlan' => 'America/Mazatlan',
            '(GMT-06:00) Central Time (US & Canada)' => 'America/Chicago',
            '(GMT-06:00) Central America' => 'America/Managua',
            '(GMT-06:00) Guadalajara' => 'America/Mexico_City',
            '(GMT-06:00) Mexico City' => 'America/Mexico_City',
            '(GMT-06:00) Monterrey' => 'America/Monterrey',
            '(GMT-06:00) Saskatchewan' => 'America/Regina',
            '(GMT-05:00) Eastern Time (US & Canada)' => 'America/New_York',
            '(GMT-05:00) Indiana (East)' => 'America/Indiana/Indianapolis',
            '(GMT-05:00) Bogota' => 'America/Bogota',
            '(GMT-05:00) Lima' => 'America/Lima',
            '(GMT-05:00) Quito' => 'America/Bogota',
            '(GMT-04:00) Atlantic Time (Canada)' => 'America/Halifax',
            '(GMT-04:00) Caracas' => 'America/Caracas',
            '(GMT-04:00) La Paz' => 'America/La_Paz',
            '(GMT-04:00) Santiago' => 'America/Santiago',
            '(GMT-03:30) Newfoundland' => 'America/St_Johns',
            '(GMT-03:00) Brasilia' => 'America/Sao_Paulo',
            '(GMT-03:00) Buenos Aires' => 'America/Argentina/Buenos_Aires',
            '(GMT-03:00) Georgetown' => 'America/Argentina/Buenos_Aires',
            '(GMT-03:00) Greenland' => 'America/Godthab',
            '(GMT-02:00) Mid-Atlantic' => 'America/Noronha',
            '(GMT-01:00) Azores' => 'Atlantic/Azores',
            '(GMT-01:00) Cape Verde Is.' => 'Atlantic/Cape_Verde',
            '(GMT) Casablanca' => 'Africa/Casablanca',
            '(GMT) Dublin' => 'Europe/London',
            '(GMT) Edinburgh' => 'Europe/London',
            '(GMT) Lisbon' => 'Europe/Lisbon',
            '(GMT) London' => 'Europe/London',
            '(GMT) UTC' => 'UTC',
            '(GMT) Monrovia' => 'Africa/Monrovia',
            '(GMT+01:00) Amsterdam' => 'Europe/Amsterdam',
            '(GMT+01:00) Belgrade' => 'Europe/Belgrade',
            '(GMT+01:00) Berlin' => 'Europe/Berlin',
            '(GMT+01:00) Bern' => 'Europe/Berlin',
            '(GMT+01:00) Bratislava' => 'Europe/Bratislava',
            '(GMT+01:00) Brussels' => 'Europe/Brussels',
            '(GMT+01:00) Budapest' => 'Europe/Budapest',
            '(GMT+01:00) Copenhagen' => 'Europe/Copenhagen',
            '(GMT+01:00) Ljubljana' => 'Europe/Ljubljana',
            '(GMT+01:00) Madrid' => 'Europe/Madrid',
            '(GMT+01:00) Paris' => 'Europe/Paris',
            '(GMT+01:00) Prague' => 'Europe/Prague',
            '(GMT+01:00) Rome' => 'Europe/Rome',
            '(GMT+01:00) Sarajevo' => 'Europe/Sarajevo',
            '(GMT+01:00) Skopje' => 'Europe/Skopje',
            '(GMT+01:00) Stockholm' => 'Europe/Stockholm',
            '(GMT+01:00) Vienna' => 'Europe/Vienna',
            '(GMT+01:00) Warsaw' => 'Europe/Warsaw',
            '(GMT+01:00) West Central Africa' => 'Africa/Lagos',
            '(GMT+01:00) Zagreb' => 'Europe/Zagreb',
            '(GMT+02:00) Athens' => 'Europe/Athens',
            '(GMT+02:00) Bucharest' => 'Europe/Bucharest',
            '(GMT+02:00) Cairo' => 'Africa/Cairo',
            '(GMT+02:00) Harare' => 'Africa/Harare',
            '(GMT+02:00) Helsinki' => 'Europe/Helsinki',
            '(GMT+02:00) Istanbul' => 'Europe/Istanbul',
            '(GMT+02:00) Jerusalem' => 'Asia/Jerusalem',
            '(GMT+02:00) Kyev' => 'Europe/Kiev',
            '(GMT+02:00) Minsk' => 'Europe/Minsk',
            '(GMT+02:00) Pretoria' => 'Africa/Johannesburg',
            '(GMT+02:00) Riga' => 'Europe/Riga',
            '(GMT+02:00) Sofia' => 'Europe/Sofia',
            '(GMT+02:00) Tallinn' => 'Europe/Tallinn',
            '(GMT+02:00) Vilnius' => 'Europe/Vilnius',
            '(GMT+03:00) Baghdad' => 'Asia/Baghdad',
            '(GMT+03:00) Kuwait' => 'Asia/Kuwait',
            '(GMT+03:00) Moscow' => 'Europe/Moscow',
            '(GMT+03:00) Nairobi' => 'Africa/Nairobi',
            '(GMT+03:00) Riyadh' => 'Asia/Riyadh',
            '(GMT+03:00) St. Petersburg' => 'Europe/Moscow',
            '(GMT+03:00) Volgograd' => 'Europe/Volgograd',
            '(GMT+03:30) Tehran' => 'Asia/Tehran',
            '(GMT+04:00) Abu Dhabi' => 'Asia/Muscat',
            '(GMT+04:00) Baku' => 'Asia/Baku',
            '(GMT+04:00) Muscat' => 'Asia/Muscat',
            '(GMT+04:00) Tbilisi' => 'Asia/Tbilisi',
            '(GMT+04:00) Yerevan' => 'Asia/Yerevan',
            '(GMT+04:30) Kabul' => 'Asia/Kabul',
            '(GMT+05:00) Ekaterinburg' => 'Asia/Yekaterinburg',
            '(GMT+05:00) Islamabad' => 'Asia/Karachi',
            '(GMT+05:00) Karachi' => 'Asia/Karachi',
            '(GMT+05:00) Tashkent' => 'Asia/Tashkent',
            '(GMT+05:30) Chennai' => 'Asia/Kolkata',
            '(GMT+05:30) Kolkata' => 'Asia/Kolkata',
            '(GMT+05:30) Mumbai' => 'Asia/Kolkata',
            '(GMT+05:30) New Delhi' => 'Asia/Kolkata',
            '(GMT+05:45) Kathmandu' => 'Asia/Kathmandu',
            '(GMT+06:00) Almaty' => 'Asia/Almaty',
            '(GMT+06:00) Astana' => 'Asia/Dhaka',
            '(GMT+06:00) Dhaka' => 'Asia/Dhaka',
            '(GMT+06:00) Novosibirsk' => 'Asia/Novosibirsk',
            '(GMT+06:00) Sri Jayawardenepura' => 'Asia/Colombo',
            '(GMT+06:30) Rangoon' => 'Asia/Rangoon',
            '(GMT+07:00) Bangkok' => 'Asia/Bangkok',
            '(GMT+07:00) Hanoi' => 'Asia/Bangkok',
            '(GMT+07:00) Jakarta' => 'Asia/Jakarta',
            '(GMT+07:00) Krasnoyarsk' => 'Asia/Krasnoyarsk',
            '(GMT+08:00) Beijing' => 'Asia/Hong_Kong',
            '(GMT+08:00) Chongqing' => 'Asia/Chongqing',
            '(GMT+08:00) Hong Kong' => 'Asia/Hong_Kong',
            '(GMT+08:00) Irkutsk' => 'Asia/Irkutsk',
            '(GMT+08:00) Kuala Lumpur' => 'Asia/Kuala_Lumpur',
            '(GMT+08:00) Perth' => 'Australia/Perth',
            '(GMT+08:00) Singapore' => 'Asia/Singapore',
            '(GMT+08:00) Taipei' => 'Asia/Taipei',
            '(GMT+08:00) Ulaan Bataar' => 'Asia/Irkutsk',
            '(GMT+08:00) Urumqi' => 'Asia/Urumqi',
            '(GMT+09:00) Osaka' => 'Asia/Tokyo',
            '(GMT+09:00) Sapporo' => 'Asia/Tokyo',
            '(GMT+09:00) Seoul' => 'Asia/Seoul',
            '(GMT+09:00) Tokyo' => 'Asia/Tokyo',
            '(GMT+09:00) Yakutsk' => 'Asia/Yakutsk',
            '(GMT+09:30) Adelaide' => 'Australia/Adelaide',
            '(GMT+09:30) Darwin' => 'Australia/Darwin',
            '(GMT+10:00) Brisbane' => 'Australia/Brisbane',
            '(GMT+10:00) Canberra' => 'Australia/Sydney',
            '(GMT+10:00) Guam' => 'Pacific/Guam',
            '(GMT+10:00) Hobart' => 'Australia/Hobart',
            '(GMT+10:00) Melbourne' => 'Australia/Melbourne',
            '(GMT+10:00) Port Moresby' => 'Pacific/Port_Moresby',
            '(GMT+10:00) Sydney' => 'Australia/Sydney',
            '(GMT+10:00) Vladivostok' => 'Asia/Vladivostok',
            '(GMT+11:00) Magadan' => 'Asia/Magadan',
            '(GMT+11:00) New Caledonia' => 'Asia/Magadan',
            '(GMT+11:00) Solomon Is.' => 'Asia/Magadan',
            '(GMT+12:00) Auckland' => 'Pacific/Auckland',
            '(GMT+12:00) Fiji' => 'Pacific/Fiji',
            '(GMT+12:00) Kamchatka' => 'Asia/Kamchatka',
            '(GMT+12:00) Marshall Is.' => 'Pacific/Fiji',
            '(GMT+12:00) Wellington' => 'Pacific/Auckland',
            '(GMT+13:00) Nuku\'alofa' => 'Pacific/Tongatapu'
        ];
    }
}

if (!function_exists('getTableAutoIncrement')) {
    function getTableAutoIncrement($table){
        $statement  = DB::select("SHOW TABLE STATUS LIKE '".$table."'");
        return $statement[0]->Auto_increment;
    }
}


if (!function_exists('getColumnValue')) {
    function getColumnValue($tbl,$where,$column){
        return DB::table($tbl)->where($where)->value($column);
    }
}

if(!function_exists('get_crud_user_details')){
    function get_crud_user_details($data,$column){
        $data = json_decode($data);
        $type = isset($data->type) ? $data->type : '';
        $id = isset($data->id) ? $data->id : '';
        if($type!='' && $id!=''){
            $tbl = '';
            switch (strtolower($type)) {
                case 'admin':$tbl = 'admin';break;
                default:$tbl = '';break;
            }
            if($tbl!=''){
                return DB::table($tbl)->where('id',$id)->value($column);
            }
        }
        return translate('unknown');
    }
}

if(!function_exists('get_user_details')){
    function get_user_details($tbl,$where){
    return DB::table($tbl)->where($where)->first();
}}

if(!function_exists('get_currency_with_amt')){
    function get_currency_with_amt($amount='',$position='l',$code=' ₹'){
        if($position=='r'){
            return $amount.$code;
        }else{
            return $code.$amount;
        }
    }
}

if (! function_exists ("add_parser_varialbes")) {
    function text_parser_varialbes($template) {
        return $template;
        /*$search = base_url("writable/uploads/");
        $replace = '{APP_BASE_URL}';
        echo preg_replace($search,$replace,$template);
        /*$parser = \Config\Services::parser();
        $parser->setDelimiters('','');

        $parser_data = array();
        $parser_data['APP_BASE_URL']   = base_url('writable/uploads/');
        $parser_data[base_url('writable/uploads/')]   = 'APP_BASE_URL';
        echo $parser->setData($parser_data)->renderString($template);exit;
        return $parser->setData($parser_data)->renderString($template);*/
    }
}

if(!function_exists('app_html_editor')){
    function app_html_editor($name,$id,$placeholder='',$default_text='',$required=true,$height='350'){
        $req = $required==true ? 'required' : '';
        $html ='<textarea class="form-control html_editor" name="'.$name.'" id="'.$id.'" placeholder="'.$placeholder.'" data-height="'.$height.'" data-parsley-errors-container="#error_html_editor_'.$id.'" '.$req.'>'.text_parser_varialbes($default_text).'</textarea>'
            .'<span id="error_html_editor_'.$id.'"></span>';
        return $html;
    }
}

if (! function_exists ("null_handling")) {
    function null_handling($data) {
        if (is_array($data) || is_object($data)) {
            $return = array();
            foreach ($data as $key => $value) { $return[$key] = $value!='' ? $value : ''; }
            if(is_object($data)){ $return = (object) $return; }
        }else{
            $return = $data!='' ? $data : '';
        }
        return $return;
    }
}

if (!function_exists('uploads_url')){
    function uploads_url($uri = ''){
        $uri = $uri!='' ? $uri : 'default.png';
        //return getBaseURL().'uploads/'.$uri;
        return $uri;
    }
}

if (!function_exists('uploads_image')){
    function uploads_image($uri = ''){
        $uri = $uri!='' ? $uri : 'default.png';
        return $uri;
    }
}


if(!function_exists('app_file_manager')){
    function app_file_manager($name,$id,$type=1,$default='',$required=true,$banner=false){ //0 = Filemanager,1 = Image,2 = File,3 = Video
        $req = $required==true ? 'required' : '';
        if($type==1){
            if($banner==false){
                $default = $default!='' ? $default : 'default.png';
            }else{
                $default = $default!='' ? $default : 'default_banner.png';
            }
            $html = '<a href="javascript:void(0);" data-url="'.getBaseURL().'filemanager/dialog.php?type='.$type.'&field_id='.$id.'" class="btn-iframe" data-original-title="'.translate('click_on_the_image_to_change').'" data-placement="top" data-toggle="tooltip" title="'.translate('click_on_the_image_to_change').'">
            <img src="'.$default.'" class="img-thumbnail" id="img_'.$id.'" alt="'.$name.'"></a><input name="'.$name.'" value="'.$default.'" id="'.$id.'" type="text" style="display:none;" data-parsley-errors-container="#error_'.$id.'" '.$required.'><span id="error_'.$id.'"></span>';
        }else{
            $html = '<div class="input-group">
                    <textarea rows="1" aria-describedby="'.$id.'" aria-label="'.translate('select_'.$name).'" class="form-control" placeholder="'.translate('select_'.$name).'" id="'.$id.'" name="'.$name.'" data-parsley-errors-container="#error_'.$id.'" '.$required.'>'.$default.'</textarea>
                    <div class="input-group-btn">
                        <a class="btn ripple btn-primary rounded-start-0 btn-iframe" href="javascript:void(0);" data-url="'.getBaseURL().'filemanager/dialog.php?type='.$type.'&field_id='.$id.'"><i class="fa fa-folder-open-o"></i></a>
                    </div>
                </div>
                <span id="error_'.$id.'"></span>';
        }
        return $html;
    }
}

if (!function_exists('customer_setting')) {
    function customer_setting($key,$default='') {
        $value = config('abgorad.'.$key);
        if ($value !== NULL) {
            return $value;
        }else {
            return $default;
        }
    }
}

if (!function_exists('app_file_exists')) {
    function app_file_exists($file='',$default='') {
        if($file!='' && strpos($file, '.') && file_exists(str_replace(getBaseURL(), '', $file))){
            return $file;
        }
        if($default!=''){
            return $default;
        }
        return false;
    }
}

if (! function_exists ("display_datetime_format")) {
    function display_datetime_format($datetime,$format='datetime') {
        $datetime = strtotime($datetime);
        if($format=='date'){
            return date('d-m-Y', $datetime);
        }else if($format=='time'){
            return date('h:i:s A', $datetime);
        }else if($format=='day'){
            return date('d', $datetime);
        }else if($format=='month'){
            return date('M', $datetime);
        }else{
            return date('d-m-Y h:i:s A', $datetime);
        }
    }
}


if (!function_exists('check_bad_words')) {
    function check_bad_words($string, $words=array()) {
        if(app_setting('badword_status')=='on'){
            if(empty($words)){ 
                $words = app_setting('badwords'); 
                $words = $words!='' ? explode(",",$words) : array(); 
            }
            if(isset($words) && !empty($words)){ foreach ($words as $word) {
                if (str_contains($word, $string)) return true;
            } }
            return false;
        }
        return false;
    }
}


if(!function_exists('valid_session')){
    function valid_session($module = '', $action = '', $redirect = true) {
        $permissions = array();
        if($redirect){
            $admin_id = customer_setting('admin_id');
            $role_id = customer_setting('role_id');
        }else{
            $id = session('id');
            $web_auth_key = session('web_auth_key');
            $user = User::where('id','=',$id)
                    ->where('web_auth_key','=',$web_auth_key)
                    ->first();
            
            if(!empty($user)){
                $role = Role::where('id','=',$user->role_id)
                        ->where('is_active','=','1')
                        ->first();

                if(!empty($role) && $user->role_id!=2 && $user->role_id!=4){
                    if($user->role_id!=1){
                        $permissions = json_decode($role->permissions,true);
                    }
                    $admin_id = $role->id;
                    $role_id = $user->id;
                }
            }
        }
        if ($admin_id != '') {
            if ($role_id != 1 && $redirect) {
                $permissions = customer_setting('permissions');
            }
            if ($module == 'dashboard' || $module == 'profile') { 
                return true; 
            }
            if (empty($permissions) || isset($permissions[$module][$action]) || isset($permissions[$module][strtoupper($action)]) || isset($permissions[strtolower($module)][$action])) { 
                return true;
            } else {
                if ($redirect) {
                    redirect()->route('admin.dashboard');exit;
                } else {
                    return false;
                }
            }
        } else {
            if ($redirect) {
                redirect()->route('admin.login');exit;
            } else {
                return false;
            }
        }
    }
}

if (!function_exists('downloadfile')) {
    /**
     * Download an asset file.
     *
     * @param string $path
     * @param string|null $name
     */
    function downloadfile($path, $name = null)
    {
        $filePath = public_path($path);
        $fileName = $name ?: basename($filePath);
        return response()->download($filePath, $fileName);
    }
}

/* Unique Slug */

if(!function_exists('generateSlug')){
    function generateSlug($tbl,$title)
    {
        $slug = Str::slug($title, '-');
        // Ensure the slug is unique
        $count = 1;
        while (DB::table($tbl)->whereSlug($slug)->exists()) {
            $slug = Str::slug($title, '-') . '-' . $count++;
        }
        return $slug;
    }

}

if(!function_exists("file_type_icon")){
    function file_type_icon($type){
        if(@preg_match('/image/i', $type)){
            $icon  = "<i class='fa fa-file-image-o'></i>";
        }
        else if(@preg_match('/sheet/i', $type)){
            $icon = "<i class='fa fa-file-excel-o'></i>";
        }
        else if(@preg_match('/pdf/i', $type)){
            $icon =  "<i class='fa fa-file-pdf-o'></i>";
        }
        else if(@preg_match('/word/i', $type)){
            $icon = "<i class='fa fa-file-word-o'></i>";
        }
         else if(@preg_match('/text/i', $type)){
            $icon =  "<i class='fa fa-file-text-o'></i>";
        }
        else{
            $icon =  "<i class='fa fa-file-o'></i>";
        }
    return $icon;    
    }
}


