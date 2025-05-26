<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Login;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Role;
use App\Http\Controllers\Admin\Settings;
use App\Http\Controllers\Admin\Profile;
use App\Http\Controllers\Admin\Category;
use App\Http\Controllers\Admin\Blog_category;
use App\Http\Controllers\Admin\Gallery_category;
use App\Http\Controllers\Admin\Gallery_type;
use App\Http\Controllers\Admin\Filemanager;
use App\Http\Controllers\Admin\Slider;
use App\Http\Controllers\Admin\Testimonials;
use App\Http\Controllers\Admin\Blog;
use App\Http\Controllers\Admin\Certification;
use App\Http\Controllers\Admin\Gallery;
use App\Http\Controllers\Admin\Product;
use App\Http\Controllers\Admin\Tool;
use App\Http\Controllers\Admin\Client;
use App\Http\Controllers\Admin\Faq_category;
use App\Http\Controllers\Admin\Team;
use App\Http\Controllers\Admin\Faq;
use App\Http\Controllers\Admin\Review;
use App\Http\Controllers\Admin\Review_category;
use App\Http\Controllers\Admin\Pages;
use App\Http\Controllers\Admin\journey;
use App\Http\Controllers\Home;
use App\Http\Controllers\Api\V1;

// use App\Models\category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[Home::class, 'index'])->name('web.home');
Route::get('gallery/{slug}',[Home::class,'gallery'])->name('web.gallery');
Route::get('gallery-details/{slug}',[Home::class,'gallery_details'])->name('web.gallery_details');
Route::get('about-us',[Home::class,'about_us'])->name('web.about_us');
Route::get('why-nexsel-grow-lights',[Home::class,'why_us'])->name('web.why_us');
Route::get('plant-led-grow-lights-product-range',[Home::class,'product'])->name('web.product');
Route::get('product/{slug?}',[Home::class,'product_details'])->name('web.product_details');
Route::get('horticulture-science',[Home::class,'blog'])->name('web.blog');
Route::get('blog/{slug}',[Home::class,'blog_details'])->name('web.blog_details');
Route::get('category/{slug?}',[Home::class,'blog_category'])->name('web.blog_category');
Route::get('contact-us',[Home::class,'contact_us'])->name('web.contact_us');
Route::get('nexsel-support',[Home::class,'support'])->name('web.support');
Route::get('tool/{slug}',[Home::class,'tool_details'])->name('web.tool');
Route::post('enquiry',[Home::class,'new_enquiry'])->name('web.new_enquiry');
Route::post('quote',[Home::class,'new_quote'])->name('web.new_quote');
Route::get('privacy-policy',[Home::class,'privacy_policy'])->name('web.privacy-policy');
Route::get('terms',[Home::class,'terms'])->name('web.terms');
Route::get('warranty',[Home::class,'warranty'])->name('web.warranty');
Route::get('shipping-and-delivery',[Home::class,'shipping_and_delivery'])->name('web.shipping-and-delivery');
Route::get('refund-policy',[Home::class,'refund_policy'])->name('web.refund-policy');
Route::get('social',[Home::class,'social'])->name('web.social');

// Route::get('plant-led-grow-lights-product-range', [Home::class, 'product'])->name('web.product');
// Route::get('uae/plant-led-grow-lights-product-range', [Home::class, 'product'])->name('web.product');
// Route::get('new-zealand/plant-led-grow-lights-product-range', [Home::class, 'product'])->name('web.product');
// For default country (India)
Route::get('/plant-led-grow-lights-product-range', [Home::class, 'product'])->name('web.product');

// For other countries using a prefix
Route::get('/{country}/plant-led-grow-lights-product-range', [Home::class, 'product'])
    ->where('country', 'uae|new-zealand')
    ->name('web.product.country');

    // For India (default country, no prefix)
Route::get('product/{slug}', [Home::class, 'product_details'])->name('web.product_details');

// For other countries with prefix
Route::get('{country}/product/{slug}', [Home::class, 'product_details_for_other_country'])
    ->where('country', 'uae|new-zealand')
    ->name('web.product_details.country');

Route::group(['prefix'=>'/admin'],function(){
    Route::get('',[Login::class,'login'])->name('admin.login')->middleware('admin-auth');
    Route::post('',[Login::class,'login_check'])->name('admin.check_login');
    Route::get('forgot-password',[Login::class,'forgot_password'])->name('admin.forgot_password')->middleware('admin-auth');
    Route::get('logout',[Login::class,'logout'])->name('admin.logout');
    Route::get('clear-cache', [Dashboard::class,'clear_cache'])->name('admin.clear_cache');
    Route::get('dashboard',[Dashboard::class,'index'])->name('admin.dashboard')->middleware('admin-auth');
    Route::get('role',[Role::class,'list'])->name('admin.role')->middleware('admin-auth');
    Route::post('role',[Role::class,'ajax_list'])->name('admin.role.list');
    Route::get('role/new',[Role::class,'new'])->name('admin.role.new');
    Route::get('role/edit/{id}',[Role::class,'edit'])->name('admin.role.edit');
    Route::post('role/add',[Role::class,'new_role'])->name('admin.role.new_role');
    Route::post('role/edit',[Role::class,'edit_role'])->name('admin.role.edit_role');
    Route::get('role/details/{id}',[Role::class,'quick_details'])->name('admin.role.quick_details');
    Route::post('role/update',[Role::class,'change_status'])->name('admin.role.change_status');
    Route::get('settings/basic',[Settings::class,'basic'])->name('admin.settings.basic')->middleware('admin-auth');
    Route::post('settings/update-basic',[Settings::class,'update_basic'])->name('admin.setings.update_basic');
    Route::get('settings/theme',[Settings::class,'theme'])->name('admin.settings.theme')->middleware('admin-auth');
    Route::post('settings/update-theme',[Settings::class,'update_theme'])->name('admin.setings.update_theme');
    Route::get('settings/security',[Settings::class,'security'])->name('admin.settings.security')->middleware('admin-auth');
    Route::post('settings/update-security',[Settings::class,'update_security'])->name('admin.setings.update_security');
    Route::get('profile/basic',[Profile::class,'basic'])->name('admin.profile.basic')->middleware('admin-auth');
    Route::post('profile/edit',[Profile::class,'edit_profile'])->name('admin.profile.edit_profile');
    Route::get('filemanager',[Filemanager::class,'index'])->name('admin.filemanager')->middleware('admin-auth'); 
    Route::get('category',[Category::class,'list'])->name('admin.category')->middleware('admin-auth');
    Route::post('category',[Category::class,'ajax_list'])->name('admin.category.list');
    Route::get('category/new',[Category::class,'add'])->name('admin.category.new');
    Route::post('category/add',[Category::class,'new_category'])->name('admin.category.add_category');   
    Route::get('category/edit/{id}',[Category::class,'edit'])->name('admin.category.edit');
    Route::post('category/edit',[Category::class,'edit_category'])->name('admin.category.edit_category');
    Route::get('category/details/{id}',[Category::class,'quick_details'])->name('admin.category.quick_details');
    Route::post('category/update',[Category::class,'change_status'])->name('admin.category.change_status');
    Route::get('slider',[Slider::class,'list'])->name('admin.slider')->middleware('admin-auth');
    Route::post('slider',[Slider::class,'ajax_list'])->name('admin.slider.list');
    Route::get('slider/new',[Slider::class,'add'])->name('admin.slider.new');
    Route::post('slider/add',[Slider::class,'new_slider'])->name('admin.slider.add_slider');
    Route::get('slider/edit/{id}',[Slider::class,'edit'])->name('admin.slider.edit');
    Route::post('slider/edit',[Slider::class,'edit_slider'])->name('admin.slider.edit_slider'); 
    Route::get('slider/details/{id}',[Slider::class,'quick_details'])->name('admin.slider.quick_details'); 
    Route::post('slider/update',[Slider::class,'change_status'])->name('admin.slider.change-status');
    Route::get('testimonials',[Testimonials::class,'list'])->name('admin.testimonials')->middleware('admin-auth');
    Route::post('testimonials',[Testimonials::class,'ajax_list'])->name('admin.testimonials.list');
    Route::get('testimonials/new',[Testimonials::class,'add'])->name('admin.testimonials.new');
    Route::post('testimonials/add',[Testimonials::class,'new_testimonials'])->name('admin.testimonials.add_testimonials');
    Route::get('testimonials/edit/{id}',[Testimonials::class,'edit'])->name('admin.testimonials.edit');
    Route::post('testimonials/edit',[Testimonials::class,'edit_testimonials'])->name('admin.testimonials.edit_testimonials'); 
    Route::get('testimonials/details/{id}',[Testimonials::class,'quick_details'])->name('admin.testimonials.quick_details'); 
    Route::post('testimonials/update',[Testimonials::class,'change_status'])->name('admin.testimonials.change-status');
    Route::get('blog-category',[Blog_category::class,'list'])->name('admin.blog_category')->middleware('admin-auth');
    Route::post('blog-category',[Blog_category::class,'ajax_list'])->name('admin.blog_category.list');
    Route::get('blog-category/new',[Blog_category::class,'add'])->name('admin.blog_category.new');
    Route::post('blog-category/add',[Blog_category::class,'new_blog_category'])->name('admin.blog_category.add_category');
    Route::get('blog-category/edit/{id}',[Blog_category::class,'edit'])->name('admin.blog_category.edit');
    Route::post('blog-category/edit',[Blog_category::class,'edit_blog_category'])->name('admin.blog_category.edit_category'); 
    Route::get('blog-category/details/{id}',[Blog_category::class,'quick_details'])->name('admin.blog_category.quick_details');
    Route::post('blog-category/update',[Blog_category::class,'change_status'])->name('admin.blog_category.change_status');
    Route::get('blog',[Blog::class,'list'])->name('admin.blog')->middleware('admin-auth');
    Route::post('blog',[Blog::class,'ajax_list'])->name('admin.blog.list');
    Route::get('blog/new',[Blog::class,'add'])->name('admin.blog.new');
    Route::post('blog/add',[Blog::class,'new_blog'])->name('admin.blog.add_blog');
    Route::get('blog/edit/{id}',[Blog::class,'edit'])->name('admin.blog.edit');
    Route::post('blog/edit',[Blog::class,'edit_blog'])->name('admin.blog.edit_blog'); 
    Route::get('blog/details/{id}',[Blog::class,'quick_details'])->name('admin.blog.quick_details'); 
    Route::post('blog/update',[Blog::class,'change_status'])->name('admin.blog.change-status');
    Route::get('gallery-category',[Gallery_category::class,'list'])->name('admin.gallery_category')->middleware('admin-auth');
    Route::post('gallery-category',[Gallery_category::class,'ajax_list'])->name('admin.gallery_category.list');
    Route::get('gallery-category/new',[Gallery_category::class,'add'])->name('admin.gallery_category.new');
    Route::post('gallery-category/add',[Gallery_category::class,'new_gallery_category'])->name('admin.gallery_category.add_category');
    Route::get('gallery-category/edit/{id}',[Gallery_category::class,'edit'])->name('admin.gallery_category.edit');
    Route::post('gallery-category/edit',[Gallery_category::class,'edit_gallery_category'])->name('admin.gallery_category.edit_category'); 
    Route::get('gallery-category/details/{id}',[Gallery_category::class,'quick_details'])->name('admin.gallery_category.quick_details');
    Route::post('gallery-category/update',[Gallery_category::class,'change_status'])->name('admin.gallery_category.change_status');
    Route::get('gallery',[Gallery::class,'list'])->name('admin.gallery')->middleware('admin-auth');
    Route::post('gallery',[Gallery::class,'ajax_list'])->name('admin.gallery.list');
    Route::get('gallery/new',[Gallery::class,'add'])->name('admin.gallery.new');
    Route::post('gallery/add',[Gallery::class,'new_gallery'])->name('admin.gallery.add_gallery');
    Route::get('gallery/edit/{id}',[Gallery::class,'edit'])->name('admin.gallery.edit');
    Route::post('gallery/edit',[Gallery::class,'edit_gallery'])->name('admin.gallery.edit_gallery'); 
    Route::get('gallery/details/{id}',[Gallery::class,'quick_details'])->name('admin.gallery.quick_details');
    Route::post('gallery/update',[Gallery::class,'change_status'])->name('admin.gallery.change_status');
    Route::get('product',[Product::class,'list'])->name('admin.product')->middleware('admin-auth');
    Route::post('product',[Product::class,'ajax_list'])->name('admin.product.list');
    Route::get('product/new',[Product::class,'add'])->name('admin.product.new');
    Route::post('product/add',[Product::class,'new_product'])->name('admin.product.add_product');
    Route::get('product/edit/{id}',[Product::class,'edit'])->name('admin.product.edit');
    Route::post('product/edit',[Product::class,'edit_product'])->name('admin.product.edit_product'); 
    Route::get('product/details/{id}',[Product::class,'quick_details'])->name('admin.product.quick_details');
    Route::post('product/update',[Product::class,'change_status'])->name('admin.product.change_status');
    Route::post('product/upload',[Product::class,'upload'])->name('admin.product.upload');
    Route::post('product/popular/',[Product::class,'popular'])->name('admin.product.popular');
    Route::get('client',[Client::class,'list'])->name('admin.client')->middleware('admin-auth');
    Route::post('client',[Client::class,'ajax_list'])->name('admin.client.list');
    Route::get('client/new',[Client::class,'add'])->name('admin.client.new');
    Route::post('client/add',[Client::class,'new_client'])->name('admin.client.add_client');
    Route::get('client/edit/{id}',[Client::class,'edit'])->name('admin.client.edit');
    Route::post('client/edit',[Client::class,'edit_client'])->name('admin.client.edit_client'); 
    Route::get('client/details/{id}',[Client::class,'quick_details'])->name('admin.client.quick_details'); 
    Route::post('client/update',[Client::class,'change_status'])->name('admin.client.change-status');
    Route::get('team',[Team::class,'list'])->name('admin.team')->middleware('admin-auth');
    Route::post('team',[Team::class,'ajax_list'])->name('admin.team.list');
    Route::get('team/new',[Team::class,'add'])->name('admin.team.new');
    Route::post('team/add',[Team::class,'new_team'])->name('admin.team.add_team');
    Route::get('team/edit/{id}',[Team::class,'edit'])->name('admin.team.edit');
    Route::post('team/edit',[Team::class,'edit_team'])->name('admin.team.edit_team'); 
    Route::get('team/details/{id}',[Team::class,'quick_details'])->name('admin.team.quick_details'); 
    Route::post('team/update',[Team::class,'change_status'])->name('admin.team.change-status');
    Route::get('certification',[Certification::class,'list'])->name('admin.certification')->middleware('admin-auth');
    Route::post('certification',[Certification::class,'ajax_list'])->name('admin.certification.list');
    Route::get('certification/new',[Certification::class,'add'])->name('admin.certification.new');
    Route::post('certification/add',[Certification::class,'new_certification'])->name('admin.certification.add_certification');
    Route::get('certification/edit/{id}',[Certification::class,'edit'])->name('admin.certification.edit');
    Route::post('certification/edit',[Certification::class,'edit_certification'])->name('admin.certification.edit_certification'); 
    Route::get('certification/details/{id}',[Certification::class,'quick_details'])->name('admin.certification.quick_details'); 
    Route::post('certification/update',[Certification::class,'change_status'])->name('admin.certification.change-status');
    Route::get('faq-category',[Faq_category::class,'list'])->name('admin.faq_category')->middleware('admin-auth');
    Route::post('faq-category',[Faq_category::class,'ajax_list'])->name('admin.faq_category.list');
    Route::get('faq-category/new',[Faq_category::class,'add'])->name('admin.faq_category.new');
    Route::post('faq-category/add',[Faq_category::class,'new_faq_category'])->name('admin.faq_category.add_faq_category');
    Route::get('faq-category/edit/{id}',[Faq_category::class,'edit'])->name('admin.faq_category.edit');
    Route::post('faq-category/edit',[Faq_category::class,'edit_faq_category'])->name('admin.faq_category.edit_faq_category'); 
    Route::get('faq-category/details/{id}',[Faq_category::class,'quick_details'])->name('admin.faq_category.quick_details'); 
    Route::post('faq-category/update',[Faq_category::class,'change_status'])->name('admin.faq_category.change_status');
    Route::get('faq',[Faq::class,'list'])->name('admin.faq')->middleware('admin-auth');
    Route::post('faq',[Faq::class,'ajax_list'])->name('admin.faq.list');
    Route::get('faq/new',[Faq::class,'add'])->name('admin.faq.new');
    Route::post('faq/add',[Faq::class,'new_faq'])->name('admin.faq.add_faq');
    Route::get('faq/edit/{id}',[Faq::class,'edit'])->name('admin.faq.edit');
    Route::post('faq/edit',[Faq::class,'edit_faq'])->name('admin.faq.edit_faq'); 
    Route::get('faq/details/{id}',[Faq::class,'quick_details'])->name('admin.faq.quick_details'); 
    Route::post('faq/update',[Faq::class,'change_status'])->name('admin.faq.change_status');
    Route::get('gallery-type',[Gallery_type::class,'list'])->name('admin.gallery_type')->middleware('admin-auth');
    Route::post('gallery-type',[Gallery_type::class,'ajax_list'])->name('admin.gallery_type.list');
    Route::get('gallery-type/new',[Gallery_type::class,'add'])->name('admin.gallery_type.new');
    Route::post('gallery-type/add',[Gallery_type::class,'new_gallery_type'])->name('admin.gallery_type.add_type');
    Route::get('gallery-type/edit/{id}',[Gallery_type::class,'edit'])->name('admin.gallery_type.edit');
    Route::post('gallery-type/edit',[Gallery_type::class,'edit_gallery_type'])->name('admin.gallery_type.edit_type'); 
    Route::get('gallery-type/details/{id}',[Gallery_type::class,'quick_details'])->name('admin.gallery_type.quick_details');
    Route::post('gallery-type/update',[Gallery_type::class,'change_status'])->name('admin.gallery_type.change_status');
    Route::get('tool',[Tool::class,'list'])->name('admin.tool')->middleware('admin-auth');
    Route::post('tool',[Tool::class,'ajax_list'])->name('admin.tool.list');
    Route::get('tool/new',[Tool::class,'add'])->name('admin.tool.new');
    Route::post('tool/add',[Tool::class,'new_tool'])->name('admin.tool.add_tool');
    Route::get('tool/edit/{id}',[Tool::class,'edit'])->name('admin.tool.edit');
    Route::post('tool/edit',[Tool::class,'edit_tool'])->name('admin.tool.edit_tool'); 
    Route::get('tool/details/{id}',[Tool::class,'quick_details'])->name('admin.tool.quick_details');
    Route::post('tool/update',[Tool::class,'change_status'])->name('admin.tool.change_status');
    Route::get('review',[Review::class,'list'])->name('admin.review')->middleware('admin-auth');
    Route::post('review',[Review::class,'ajax_list'])->name('admin.review.list');
    Route::get('review/new',[Review::class,'add'])->name('admin.review.new');
    Route::post('review/add',[Review::class,'new_review'])->name('admin.review.add_review');
    Route::get('review/edit/{id}',[Review::class,'edit'])->name('admin.review.edit');
    Route::post('review/edit',[Review::class,'edit_review'])->name('admin.review.edit_review');
    Route::get('review/details/{id}',[Review::class,'quick_details'])->name('admin.review.quick_details');
    Route::post('review/update',[Review::class,'change_status'])->name('admin.review.change-status');
    Route::get('review-category',[Review_category::class,'list'])->name('admin.review_category')->middleware('admin-auth');
    Route::post('review-category',[Review_category::class,'ajax_list'])->name('admin.review_category.list');
    Route::get('review-category/new',[Review_category::class,'add'])->name('admin.review_category.new');
    Route::post('review-category/add',[Review_category::class,'new_review_category'])->name('admin.review_category.add_review_category');
    Route::get('review-category/edit/{id}',[Review_category::class,'edit'])->name('admin.review_category.edit');
    Route::post('review-category/edit',[Review_category::class,'edit_review_category'])->name('admin.review_category.edit_review_category'); 
    Route::get('review-category/details/{id}',[Review_category::class,'quick_details'])->name('admin.review_category.quick_details'); 
    Route::post('review-category/update',[Review_category::class,'change_status'])->name('admin.review_category.change_status');
    
    Route::get('testimonial-category',[Testimonial_category::class,'list'])->name('admin.testimonial_category')->middleware('admin-auth');
    Route::post('testimonial-category',[Testimonial_category::class,'ajax_list'])->name('admin.testimonial_category.list');
    Route::get('testimonial-category/new',[Testimonial_category::class,'add'])->name('admin.testimonial_category.new');
    Route::post('testimonial-category/add',[Testimonial_category::class,'new_testimonial_category'])->name('admin.testimonial_category.add_testimonial_category');
    Route::get('testimonial-category/edit/{id}',[Testimonial_category::class,'edit'])->name('admin.testimonial_category.edit');
    Route::post('testimonial-category/edit',[Testimonial_category::class,'edit_testimonial_category'])->name('admin.testimonial_category.edit_testimonial_category'); 
    Route::get('testimonial-category/details/{id}',[Testimonial_category::class,'quick_details'])->name('admin.testimonial_category.quick_details'); 
    Route::post('testimonial-category/update',[Testimonial_category::class,'change_status'])->name('admin.testimonial_category.change_status');

    Route::get('pages',[Pages::class,'list'])->name('admin.pages')->middleware('admin-auth');
    Route::post('pages',[Pages::class,'ajax_list'])->name('admin.pages.list');
    Route::get('pages/new',[Pages::class,'add'])->name('admin.pages.new');
    Route::post('pages/add',[Pages::class,'new_pages'])->name('admin.pages.add_pages');
    Route::get('pages/edit/{id}',[Pages::class,'edit'])->name('admin.pages.edit');
    Route::post('pages/edit',[Pages::class,'edit_pages'])->name('admin.pages.edit_pages'); 
    Route::get('pages/details/{id}',[Pages::class,'quick_details'])->name('admin.pages.quick_details'); 
    Route::post('pages/update',[Pages::class,'change_status'])->name('admin.pages.change_status');

    Route::get('journey',[Journey::class,'list'])->name('admin.journey')->middleware('admin-auth');
    Route::post('journey',[Journey::class,'ajax_list'])->name('admin.journey.list');
    Route::get('journey/new',[Journey::class,'add'])->name('admin.journey.new');
    Route::post('journey/add',[Journey::class,'new_journey'])->name('admin.journey.add_journey');
    Route::get('journey/edit/{id}',[Journey::class,'edit'])->name('admin.journey.edit');
    Route::post('journey/edit',[Journey::class,'edit_journey'])->name('admin.journey.edit_journey'); 
    Route::get('journey/details/{id}',[Journey::class,'quick_details'])->name('admin.journey.quick_details'); 
    Route::post('journey/update',[Journey::class,'change_status'])->name('admin.journey.change_status');
    
});