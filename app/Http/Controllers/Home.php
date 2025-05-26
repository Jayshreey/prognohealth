<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Quote;
use Carbon\Carbon;
class Home extends Controller{
    public function index(){
        $page_data = array();
        $page_data['frm_enquiry']   = true;
        $page_data['page_title']    = 'Leading LED Plant Grow Lights &amp; Hydroponics Solution Provider in India';
        $page_data['slider']        = DB::table('slider')->where('is_active','=','1')->get()->toArray();
        $page_data['main_category'] = DB::table('category')->where('parent_id','=','0')->where('is_active','=','1')->get()->toArray();
        $page_data['client']        = DB::table('client')->where('is_active','=','1')->get()->toArray();
        $page_data['home_blog']     = DB::table('blog')->where('is_active','=','1')->orderBy('updated_at')->limit(2)->get()->toArray();
        $page_data['testimonial']   = DB::table('testimonials')->where('is_active','=','1')->where('testimonial_category_id','LIKE','%1%')->get()->toArray();
        $page_data['review']        = DB::table('review')->where('is_active','=','1')->where('review_category_id','LIKE','%1%')->get()->toArray();
        $page_data['certificate']   = DB::table('certification')->where('is_active','=','1')->get()->toArray();
      
        return view('index',$page_data);
    }
    public function about_us(){
        $page_data = array();
        $page_data['page_title']  = 'Nexsel Tech: Professional LED Grow Lights for Horticulture';
        $page_data['team']        = DB::table('team')->where('is_active','=','1')->get();
        $page_data['client']      = DB::table('client')->where('is_active','=','1')->get();
        $page_data['certificate'] = DB::table('certification')->where('is_active','=','1')->get();
        $page_data['journey']     = DB::table('journey')->where('is_active','=','1')->get();
        
        return view('about_us',$page_data);
    }

    public function why_us(){
        $page_data =  array();
        $page_data['page_title']  = 'Enhance Your Horticulture with Nexsel Grow Lights - Discover Why Nexsel is the Best Choice';
        return view('why_us',$page_data);
    }

    public function contact_us(){
        $page_data =  array();
        $page_data['page_title']  = 'Boost Your Indoor Farm&#039;s Yield with Nexsel&#039;s Plant Grow Lights | Contact Us';
        return view('contact_us',$page_data);
    }

    public function support(){
        $page_data =  array();
        $page_data['page_title']    = 'Support - Nexsel Tech';
        $page_data['faq'] = DB::table('faq')->where('faq_category_id','=','2')->where('is_active','=','1')->get();
        $page_data['client_faq'] = DB::table('faq')->where('faq_category_id','=','3')->where('is_active','=','1')->get();
        return view('support',$page_data);
    }

    public function blog(Request $request){
        $page_data =  array();
        $keywords  = $request['keywords'];
        $page_data['page_title']    = 'Exploring Horticulture Science: Insights from our Blog';
        $page_data['blogs']         = DB::table('blog')->where('is_active','=','1')->when($keywords, function($query, $keywords) {
                                        $query->where('name','LIKE','%'.$keywords.'%');})->orderBy('updated_at')->simplePaginate(15);
        
        $page_data['popular_blogs'] = DB::table('blog')->where('is_active','=','1')->orderBy('updated_at')->limit(2)->get();
        $page_data['blog_category'] = DB::table('blog_category')->where('is_active','=','1')->get();
        return view('blog',$page_data);
    }
    public function blog_details(Request $request,$slug){
        $page_data =  array();
        $page_data['page_title']    = getColumnValue('blog',['slug'=>$slug],'name');

        $page_data['blog']          = DB::table('blog')->where('slug','=',$slug)->where('is_active','=','1')->first();
        //print_r($page_data['blog']);
        $page_data['popular_blogs'] = DB::table('blog')->where('slug','!=',$slug)->where('is_active','=','1')->orderBy('updated_at')->limit(2)->get();
        $page_data['related_blogs'] = DB::table('blog')->where('slug','!=',$slug)->where('is_active','=','1')->limit(4)->get();
        $page_data['blog_category'] = DB::table('blog_category')->where('is_active','=','1')->get();
        $page_data['popular_products']  = DB::table('product')->where('is_popular','=','1')->where('is_active','=','1')->orderBy('updated_at')->get();
        return view('blog_details',$page_data);
    }
    public function blog_category(Request $request,$slug){
        $page_data =  array();
        $category_id = '';
        if($slug!=''){
            $category_id =  getColumnValue('blog_category',['slug'=>$slug],'id');
        }
        $page_data['page_title']        = getColumnValue('blog_category',['slug'=>$slug],'name');
        $page_data['blogs']             = DB::table('blog')->where('blog_category_id','=',$category_id)->where('is_active','=','1')->orderBy('updated_at')->simplePaginate(15);
        $page_data['popular_blogs']     = DB::table('blog')->where('is_active','=','1')->orderBy('updated_at')->limit(2)->get();
        $page_data['popular_products']  = DB::table('product')->where('is_popular','=','1')->where('is_active','=','1')->orderBy('updated_at')->get();
        $page_data['blog_category'] = DB::table('blog_category')->where('is_active','=','1')->get();
        return view('blog_category',$page_data);
    }
    public function gallery(Request $request,$slug){
        $page_data  =  array();
        $category_id = '';
        if($slug!=''){
            $category_id =  getColumnValue('gallery_category',['slug'=>$slug],'id');
        }
        $page_data['page_title']        = getColumnValue('gallery_type',['slug'=>$slug],'name');
        $page_data['gallery_category']  = DB::table('gallery_category')->where('parent_id','=',$category_id)->where('is_active','=','1')->get();
        return view('gallery',$page_data);
    }
    public function gallery_details(Request $request,$slug){
        $page_data  =  array();
        $page_data['frm_enquiry']   = true;
        $page_data['page_title']    = getColumnValue('gallery',['slug'=>$slug],'name');
        $page_data['gallery']       = DB::table('gallery')->where('slug','=',$slug)->where('is_active','=','1')->first();
        return view('gallery_details',$page_data);
    }
    public function privacy_policy(Request $request){
        $slug='privacy-policy';
        $page_data  =  array();
        $page_data['frm_enquiry']   = true;
        $page_data['page_title']    = getColumnValue('pages',['slug'=>$slug],'title');
        $page_data['pages']       = DB::table('pages')->where('slug','=',$slug)->where('is_active','=','1')->first();
        //print_r($page_data);
        return view('privacy_policy',$page_data);
    }
    public function terms(Request $request){
        $slug='terms-and-condition';
        $page_data  =  array();
        $page_data['frm_enquiry']   = true;
        $page_data['page_title']    = getColumnValue('pages',['slug'=>$slug],'title');
        $page_data['pages']       = DB::table('pages')->where('slug','=',$slug)->where('is_active','=','1')->first();
        //print_r($page_data);
        return view('terms_and_condition',$page_data);
    }
    public function warranty(Request $request){
        $slug='warranty-policy';
        $page_data  =  array();
        $page_data['frm_enquiry']   = true;
        $page_data['page_title']    = getColumnValue('pages',['slug'=>$slug],'title');
        $page_data['pages']       = DB::table('pages')->where('slug','=',$slug)->where('is_active','=','1')->first();
       
        return view('warranty',$page_data);
    }
    public function shipping_and_delivery(Request $request){
        $slug='shipping-and-delivery';
        $page_data  =  array();
        $page_data['frm_enquiry']   = true;
        $page_data['page_title']    = getColumnValue('pages',['slug'=>$slug],'title');
        $page_data['pages']       = DB::table('pages')->where('slug','=',$slug)->where('is_active','=','1')->first();
       
        return view('shipping_and_delivery',$page_data);
    }
    public function refund_policy(Request $request){
        $slug='refund-policy';
        $page_data  =  array();
        $page_data['frm_enquiry']   = true;
        $page_data['page_title']    = getColumnValue('pages',['slug'=>$slug],'title');
        $page_data['pages']       = DB::table('pages')->where('slug','=',$slug)->where('is_active','=','1')->first();
       
        return view('refund_policy',$page_data);
    }
    public function social(Request $request){
        $slug='social-impact';
        $page_data  =  array();
        $page_data['frm_enquiry']   = true;
        $page_data['page_title']    = getColumnValue('pages',['slug'=>$slug],'title');
        $page_data['pages']       = DB::table('pages')->where('slug','=',$slug)->where('is_active','=','1')->first();
       
        return view('social',$page_data);
    }

    public function product($country = null)
    {
    // Normalize country code
    // $country = strtolower($country);
    // $validCountries = ['uae', 'nz'];
    // $countryName = in_array($country, $validCountries) ? strtoupper($country) : 'India';
        $country = strtolower($country);

        if (!in_array($country, ['uae', 'new-zealand'])) {
            $country = 'india'; // Default
        }
        $page_data  = array();
        $page_data['frm_enquiry']   = true;
        $page_data['page_title']    = translate('Plant Led Grow Lights Product Range');
        $page_data['fr_category']   = DB::table('category')->where('parent_id','=','0')->where('is_active','=','1')->first();
        $page_data['category']      = Category::where('parent_id','=','0')->where('is_active','=','1')->get();
        $page_data['review']        = DB::table('review')->where('is_active','=','1')->where('review_category_id','LIKE','%2%')->get();
        $page_data['faq']           = DB::table('faq')->where('faq_category_id','=','4')->where('is_active','=','1')->get()->toArray();
        return view('product',$page_data);
    }

    public function product_details(Request $request, $slug = null)
    {
        $country = 'india'; // Default
         
      
        $page_data  = array();
        $page_data['frm_enquiry']   = true;
        $category_id = '';
        $page_data['page_title'] = '';
        
           if($slug!=''){
            $category_id =  getColumnValue('category',['slug'=>$slug],'id');
            $page_data['page_title'] = getColumnValue('category',['slug'=>$slug],'name');
        }
        $page_data['product']  = DB::table('product')->where('category_id','=',$category_id)->where('is_active','=','1')->first();
        
        $page_data['review']        = DB::table('review')->where('is_active','=','1')->where('review_category_id','LIKE','%2%')->get();
        $page_data['related_products'] = DB::table('product')->where('category_id','!=',$category_id)->where('is_active','=','1')->orderBy('updated_at')->limit(3)->get();
        return view('product_details',$page_data);
    }
     public function product_details_for_other_country(Request $request, $country = null, $slug = null)
    {
        //echo $country;
        
        $country = strtolower($country);

        if (!in_array($country, ['uae', 'new-zealand'])) {
            $country = 'india'; // Default
        }
      
        $page_data  = array();
        $page_data['frm_enquiry']   = true;
        $category_id = '';
        $page_data['page_title'] = '';
        
           if($slug!=''){
            $category_id =  getColumnValue('category',['slug'=>$slug,'country' => $country],'id');
            $page_data['page_title'] = getColumnValue('category',['slug'=>$slug,'country' => $country],'name');
        }
        $page_data['product']  = DB::table('product')->where('category_id','=',$category_id)->where('is_active','=','1')->first();
        
        $page_data['review']        = DB::table('review')->where('is_active','=','1')->where('review_category_id','LIKE','%2%')->get();
        $page_data['related_products'] = DB::table('product')->where('category_id','!=',$category_id)->where('is_active','=','1')->orderBy('updated_at')->limit(3)->get();
        return view('product_details',$page_data);
    }
    
    
    public function spectrum_selection_guide(Request $request, $slug)
    {

       // $slug = 'spectrum-selection-guide';

       $slug='leafy-vegetables-grow-lights';
        $page_data  = array();
        $category_id = '';
        $page_data['page_title'] = '';
        if($slug!=''){
            $category_id =  getColumnValue('category',['slug'=>$slug],'id');
            $page_data['page_title'] = getColumnValue('category',['slug'=>$slug],'name');
        }
      
        $page_data['product']  = DB::table('product')->where('category_id','=',$category_id)->where('is_active','=','1')->first();
        
        $page_data['related_products'] = DB::table('product')->where('category_id','!=',$category_id)->where('is_active','=','1')->orderBy('updated_at')->limit(3)->get();
        return view('product_details',$page_data);
    }
    
    
    public function tool_details(Request $request,$slug){
        $page_data  =  array();
        $page_data['frm_enquiry']   = true;
        $page_data['page_title']    = 'Spectrometer';
        $page_data['tool']          = DB::table('tool')->where('slug','=',$slug)->where('is_active','=','1')->first();
        $page_data['popular_blogs'] = DB::table('blog')->where('is_active','=','1')->orderBy('created_at')->limit(4)->get();
        return view('tool_details',$page_data);
    }

    public function new_quote(Request $request){
        $status = false;
        $type = 'error';
        $title = translate('Quote');
        $msg = translate('Invalid Request');
        $cid = getTableAutoIncrement('tbl_quote');
        $updated = array();
        $updated['type'] = 'user';
        $updated['id'] = $cid;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email_id' => 'required',
            'contact_number' => 'required',
            'country' => 'required',
            'message' => 'required',
        ]);
        $attrNames = [
            'name' => translate('name'),
            'email_id' => translate('Email Address'),
            'contact_number' => translate('Contact Number'),
            'country' => translate('Country'),
            'message' => translate('Message'),
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
            $up_data['name'] = $request['name'];
            $up_data['email_id'] = $request['email_id'];
            $up_data['contact_number'] = $request['contact_number'];
            $up_data['country'] = $request['country'];
            $up_data['message'] = $request['message'];
            $up_data['created_by'] = json_encode($updated);
            $quote_id = Quote::insert($up_data);
            if(empty($quote_id)){
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
                    'message'  => translate('Quote Submitted Successfully'),
                    'reload'  => true
                ]);
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
    }

    public function new_enquiry(Request $request){
        $status = false;
        $type = 'error';
        $title = translate('Enquiry');
        $msg = translate('Invalid Request');
        $cid = getTableAutoIncrement('tbl_enquiry');
        $updated = array();
        $updated['type'] = 'user';
        $updated['id'] = $cid;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email_id' => 'required',
            'contact_number' => 'required',
            'message' => 'required',
        ]);
        $attrNames = [
            'name' => translate('name'),
            'email_id' => translate('Email Address'),
            'contact_number' => translate('Contact Number'),
            'message' => translate('Message'),
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
            $up_data['name'] = $request['name'];
            $up_data['email_id'] = $request['email_id'];
            $up_data['contact_number'] = $request['contact_number'];
            $up_data['message'] = $request['message'];
            $up_data['created_by'] = json_encode($updated);
            $en_id = Enquiry::insert($up_data);
            if(empty($en_id)){
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
                    'message'  => translate('Enquiry Submitted Successfully'),
                    'reload'  => true
                ]);
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
    }
}