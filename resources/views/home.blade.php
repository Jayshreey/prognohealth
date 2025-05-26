<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('page_title', isset($page_title) && $page_title!='' ? translate($page_title) : translate('System')) - {{ app_setting('app_title') }} {{ app_setting('seo_title')!='' ? ' | '.app_setting('seo_title') : '' }}</title>
<link rel="apple-touch-icon" sizes="180x180" href="{{ static_asset('images/favicon.png') }}" />
<link rel="icon" type="image/png" sizes="32x32" href="{{ static_asset('images/favicon.png') }}" />
<link rel="icon" type="image/png" sizes="16x16" href="{{ static_asset('images/favicon.png') }}" />
    {{-- <link rel="manifest" href="assets/images/favicons/site.webmanifest" /> --}}
@yield('meta_tag')
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <style>
        .w-5,.h-5{
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/nice-select/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/timepicker/timePicker.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/thm-icons/style.css') }}">
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/slick-slider/slick.css') }}">
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/language-switcher/polyglot-language-switcher.css') }}">
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/reey-font/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ static_asset('assets/home/vendors/parsley/parsley.css') }}">
    <link rel="stylesheet" href="{{ static_asset('assets/home/css/style.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/css/color-1.css') }}" />
    <link rel="stylesheet" href="{{ static_asset('assets/home/css/custom.css') }}" />
    
    @yield('style_files')
</head>
<body>
    <?php /*<div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">x</div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="n" class="letters-loading">
                            n
                        </span>
                        <span data-text-preloader="e" class="letters-loading">
                            e
                        </span>
                        <span data-text-preloader="x" class="letters-loading">
                            x
                        </span>
                        <span data-text-preloader="s" class="letters-loading">
                            s
                        </span>
                        <span data-text-preloader="e" class="letters-loading">
                            e
                        </span>
                        <span data-text-preloader="l" class="letters-loading">
                            l
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>*/ ?>

<!-- Floating Buttons -->
<div class="position-fixed top-50 end-0 translate-middle-y pe-3" style="z-index: 1050;">
    <div class="d-flex flex-column align-items-center gap-3">
        <!-- WhatsApp -->
        <a href="https://wa.link/nnollq" target="_blank" class="btn btn-success rounded-circle shadow d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
            <i class="fab fa-whatsapp fa-lg"></i>
        </a>
        <!-- Call -->
        <a href="tel:%20+918604486047" class="btn btn-success rounded-circle shadow d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
            <i class="fas fa-phone fa-lg"></i>
        </a>
    </div>
</div>



    <div class="page-wrapper">
        <header class="main-header main-header-one">
            <div class="main-header-one__top">
                <div class="auto-container">
                    <div class="main-header-one__top-inner">

                        <div class="main-header-one__top-left">
                            <ul class="main-header-one__top-social-links">
                                <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                         <!-- <div class="main-header-one__top-end text-end">
                            <img class="img-responsive" src="{{ static_asset('images/india.png') }}" alt="{{ app_setting('app_title') }}" width="10%">
                            <span class="text-white m-2">India</span>
                        </div>  -->
                        <!-- <div class="main-header-one__top-end text-end">
                            <li class="nav-item dropdown d-inline-block">
                                <a class="nav-link dropdown-toggle" href="#" id="countryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="img-responsive" src="{{ static_asset('images/india.png') }}" alt="{{ app_setting('app_title') }}" width="40">
                                    <span class="text-white m-2">India</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-start main-menu__list" aria-labelledby="countryDropdown">
                                
                                    <li><a class="dropdown-item" href="?country=AE">UAE</a></li>
                                    <li><a class="dropdown-item" href="?country=NZ">New Zealand</a></li>
                                    
                                </ul>
                            </li>
                        </div> -->
                   
@php
    $currentCountry = request()->segment(1);
    $countries = [
        'india' => ['name' => 'India', 'flag' => 'images/india.png', 'prefix' => null],
        'uae' => ['name' => 'UAE', 'flag' => 'images/uae.png', 'prefix' => 'uae'],
        'new-zealand' => ['name' => 'New Zealand', 'flag' => 'images/new-zealand.png', 'prefix' => 'new-zealand']
    ];

    $normalizedCountry = array_key_exists(strtolower($currentCountry), $countries) ? strtolower($currentCountry) : 'india';
@endphp

<div class="main-header-one__top-end text-end">
    <li class="nav-item dropdown d-inline-block">
        <a class="nav-link dropdown-toggle" href="#" id="countryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-responsive" src="{{ asset($countries[$normalizedCountry]['flag']) }}" alt="{{ $countries[$normalizedCountry]['name'] }} Flag" width="40">
            <span class="text-white m-2">{{ $countries[$normalizedCountry]['name'] }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-start main-menu__list" aria-labelledby="countryDropdown">
            @foreach ($countries as $key => $data)
                <li>
                    <a class="dropdown-item" href="{{ $data['prefix'] ? url($data['prefix'] . '/plant-led-grow-lights-product-range') : url('plant-led-grow-lights-product-range') }}">
                        {{ $data['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </li>
</div>



                </div>
            </div>
            <div class="main-header-one__bottom">
                <div class="main-header-one__bottom-inner">
                    <nav class="main-menu main-menu-one">
                        <div class="main-menu__wrapper clearfix">
                            <div class="auto-container">
                                <div class="main-menu__wrapper-inner">
                                    <div class="main-header-one__bottom-left">
                                        <div class="logo-box-one footer-logo">
                                            <a href="{{ route('web.home') }}">
                                                <img class="img-responsive" src="{{ static_asset('images/logo.png') }}" alt="{{ app_setting('app_title') }}">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="main-header-one__bottom-middle">
                                        <div class="main-menu-box">
                                            <a href="#" class="mobile-nav__toggler">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                            <ul class="main-menu__list">
                                                <li class="{{ Route::current()->getName() == 'web.home' ? 'current' : '' }}">
                                                    <a href="{{ route('web.home') }}"> {{ translate('Home') }}</a>
                                                </li>
                                                <li class="dropdown {{ Route::current()->getName() == 'web.about_us' ? 'current' : '' }}">
                                                    <a href="{{ route('web.about_us') }}">{{ translate('About Us') }}</a>
                                                    <ul>
                                                        <li><a href="{{ route('web.about_us') }}">{{ translate('Company Profile') }}</a></li>
                                                        <li><a href="{{ route('web.why_us') }}">{{ translate('Why NEXSEL') }}</a>
                                                    </ul>
                                                </li>
                                                @php 
                                                    $currentCountry = request()->segment(1);
                                                    $validCountries = ['uae', 'new-zealand'];
                                                    
                                                    $isValidCountry = in_array($currentCountry, $validCountries);
                                                    $countryPrefix = $isValidCountry ? $currentCountry : null;
                                                    $country = $isValidCountry ? $currentCountry : 'india';
                                                    $category = DB::table('category')->where('parent_id','=','0')->where('country','=',$country)->where('is_active','=','1')->get();
                                                   
                                                   
                                                @endphp
                                                <li class="dropdown">
                                                    <a href="{{ route('web.product') }}">{{ translate('Products') }}</a>
                                                    <ul>
                                                        @if(isset($category) && !empty($category))
                                                            @foreach ($category as $key => $value) 
                                                                <li>
                                                                    @php
                                                                        $check_product = DB::table('product')->where('category_id','=',$value->id)->where('is_active','=','1')->count();
                                                                    @endphp
                                                                    @if(isset($check_product) && $check_product>1)
                                                                        <a href="javascript:void(0);">{{ $value->name }}</a>
                                                                    @else
                                                                       <a href="{{ $countryPrefix 
                                                                                ? url($countryPrefix . '/product/' . $value->slug) 
                                                                                : url('product/' . $value->slug) }}">
                                                                                {{ $value->name }}
                                                                            </a>
                                                                    @endif
                                                                    @php 
                                                                        $sub_category = DB::table('category')->where('parent_id','=', $value->id)->where('country','=',$country)->where('is_active','=','1')->get()->toArray();
                                                                    @endphp
                                                                    @if(isset($sub_category) && !empty($sub_category))
                                                                        <ul>
                                                                            @foreach ($sub_category as $skey => $svalue)
                                                                            <li>
                                                                                @php $ch_product = DB::table('product')->where('category_id','=',$svalue->id)->where('is_active','=','1')->first(); 
                                                                                @endphp
                                                                                @if(isset($ch_product) && !empty($ch_product))
                                                                                   <a href="{{ $countryPrefix 
                                                                                                ? url($countryPrefix . '/product/' . $svalue->slug) 
                                                                                                : url('product/' . $svalue->slug) }}">
                                                                                                {{ $svalue->name }}
                                                                                            </a>
                                                                                @else
                                                                                    <a href="{{ $countryPrefix 
                                                                                            ? url($countryPrefix . '/product/' . $svalue->slug) 
                                                                                            : url('product/' . $svalue->slug) }}">
                                                                                            {{ $svalue->name }}
                                                                                        </a>
                                                                                @endif
                                                                            </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif    
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{{ route('web.blog') }}">{{ translate('Horticulture Science') }}</a>
                                                </li>
                                                @php 
                                                   $first_tool = DB::table('tool')->where('id','=','1')->where('is_active','=','1')->first();
                                                @endphp
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);">{{ translate('Tools') }}</a>
                                                    <ul>
                                                        <li><a href="javascript:void(0);">Tools/Calculators</a></li>
                                                        <li><a href="javascript:void(0);">Guides</a></li>
                                                        <li><a href="{{ route('web.tool',['slug'=>$first_tool->slug]) }}">Measuring/Monitoring</a></li>
                                                    </ul>
                                                </li>
                                                @php 
                                                   $gy_category = DB::table('gallery_category')->where('parent_id','=','0')->where('is_active','=','1')->get();
                                                @endphp
                                                <li class="dropdown">
                                                    <a href="javascript:void(0);">{{ translate('Gallery') }}</a>
                                                    <ul>
                                                        @if(isset($gy_category) && !empty($gy_category))
                                                            @foreach ($gy_category as $key => $value)
                                                                <li><a href="{{ route('web.gallery',['slug'=>$value->slug]) }}">{{ $value->name }}</a></li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </li>
                                                <li lass="dropdown">
                                                    <a href="{{ route('web.contact_us') }}">{{ translate('Contact Us') }}</a>
                                                    <ul>
                                                        <li><a href="{{ route('web.contact_us') }}">Contact Us</a></li>
                                                        <li><a href="{{ route('web.support') }}">Support</a></li>
                                                    </ul>
                                                </li>
                                            </ul>    
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('web.contact_us') }}" type="btn" class="btn main-heade-buttons text-white">IOT Login</a>
                                        <a href="javascript:void(0);" type="btn" class="btn main-heade-buttons text-white btn-enquiry">Get Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title text-center enquiry-md-header" id="enquiryModalLabel">Get Quote</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ translate('Close') }}"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="{{ route('web.new_quote') }}" class="data-parsley-validate" method="post" data-block_form="true">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control"  name="name" placeholder="{{ translate('Name') }}" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="contact_number" placeholder="{{ translate('Contact Number') }}" autocomplete="off" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control"  name="email_id" placeholder="{{ translate('Email') }}" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control"  name="country" placeholder="{{ translate('Country') }}" required="">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" name="message" rows="3" placeholder="{{ translate('Message') }}" required></textarea>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <button data-res="" type="submit" class="btn btn-success w-50 fw-bold" >Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="stricky-header stricky-header--two stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>
        @yield('content')
        @if(isset($frm_enquiry) && $frm_enquiry)
        <section class="about-two">
            <div class="about-two__bg why_us-bg-1" style="background-image: url({{ static_asset('assets/home/images/shapes/faq-v2-shape1.png') }});"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-two__img">
                            <img src="{{ static_asset('assets/home/images/about/plant-research-page.webp') }}" alt="why-nexsel">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-two__content">
                            <div class="sec-title style2" style="padding-bottom: 0px;">
                                <h2 class="sec-title__title">Enquire Now</h2>
                            </div>
                            <div class="about-two__content-text2">
                                <form action="{{ route('web.new_enquiry') }}" class="data-parsley-validate" method="post" data-block_form="true">
                                    <div class="row g-3">
                                      <div class="col-md-12">
                                        <input type="text" class="form-control" name="name" placeholder="{{ translate('Name') }}" required>
                                      </div>
                                      <div class="col-md-12">
                                        <input type="email" class="form-control"  name="email_id" placeholder="{{ translate('Email') }}" required="">
                                      </div>
                                      <div class="col-md-12">
                                        <input type="text" class="form-control" name="contact_number" placeholder="{{ translate('Phone') }}" autocomplete="off" required="">
                                      </div>
                                      <div class="col-12">
                                        <textarea class="form-control" name="message" rows="5" placeholder="{{ translate('Message') }}" required></textarea>
                                      </div>
                                      <!-- reCAPTCHA widget -->
                                        <div class="col-12">
                                            <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY_HERE"></div>
                                        </div>
                                      <div class="col-12">
                                        <div class="row">
                                          <div class="col-md-6">
                                            <button data-res="" type="submit" class="btn btn-success w-50 fw-bold" >Submit</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <footer class="footer-one custom-footer">
            <div class="footer-one__bg" style="background-image: url({{ static_asset('assets/home/images/shapes/footer-v1-shape3.png') }});"></div>
            <div class="shape1 float-bob-y"><img src="{{ static_asset('assets/home/images/shapes/footer-v1-shape1.png') }}" alt="image"></div>
            <div class="shape2 float-bob-y"><img src="{{ static_asset('assets/home/images/shapes/footer-v1-shape2.png') }}" alt="image"></div>
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 wow animated fadeInUp" data-wow-delay="0.1s">
                            <div class="footer-widget__single">
                                <div class="footer-widget__single-about">
                                    <div class="logo-box mb-2">
                                        <a href="{{ route('web.home') }}"><img src="{{ static_asset('images/logo.png') }}" alt="{{ app_setting('app_title') }}"></a>
                                    </div>

                                    <p class="text-justify text-white">Our main products : Hydroponics grow light, tissue culture grow light , speed breeding, LED grow lights,  They feature with Energy Saving, Long Lifetime, Environment Friendly</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="footer-one__right">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 wow animated fadeInUp" data-wow-delay="0.2s">
                                        <div class="footer-one__right-single mb50">
                                            <div class="title">
                                                <h2>Quick Link</h2>
                                            </div>
                                            <div class="footer-one__right-single-services">
                                                <ul class="footer-one__right-single-list">
                                                    <li><a href="{{ route('web.home') }}">{{ translate('Home') }}</a></li>
                                                    <li><a href="{{ route('web.about_us') }}">{{ translate('About Us') }}</a></li>
                                                    <li><a href="{{ route('web.product') }}">{{ translate('Products') }}</a></li>
                                                    <li><a href="{{ route('web.support') }}">{{ translate('Support') }}</a></li>
                                                    <li><a href="{{ route('web.social') }}">{{ translate('Social Impact') }}</a></li>
                                                    <li><a href="{{ route('web.contact_us') }}">{{ translate('Contact Us') }}</a></li>
                                                    <li><a href="{{ route('web.gallery',['slug'=>'our-project']) }}">{{ translate('Our Projects') }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 wow animated fadeInUp" data-wow-delay="0.3s">
                                        <div class="footer-one__right-single mb50">
                                            <div class="title">
                                                <h2>Other Links</h2>
                                            </div>
                                            <div class="footer-one__right-single-links">
                                                <ul class="footer-one__right-single-list">
                                                     
                                                    <li><a href="{{ route('web.warranty') }}">FAQs</a></li>
                                                    <li><a href="{{ route('web.blog') }}">Technology</a></li>
                                                    <li><a href="{{ route('web.privacy-policy') }}">Privacy Policy</a></li>
                                                    <li><a href="{{ route('web.terms') }}">Terms & Conditions</a></li>
                                                    <li><a href="{{ route('web.warranty') }}">Warranty Policy</a></li>
                                                    <li><a href="{{ route('web.shipping-and-delivery') }}">Shipping & Delivery</a></li>
                                                    <li><a href="{{ route('web.refund-policy') }}">Refund Policy</a></li>
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 wow animated fadeInUp" data-wow-delay="0.4s">
                                        <div class="footer-one__right-single">
                                            <div class="title">
                                                <h2>Contact</h2>
                                            </div>
                                            <div class="footer-one__right-single-contact">
                                                <p>Corporate Office: Chaitanya Industrial Estate, S/No 6, Narhe Road, Behind Hotel Gandharv , Near Bank Of Maharashtra, Narhe, Pune, India 411 041</p>
                                                <a href="mailto:Info@Nexsel.Tech">Info@Nexsel.Tech</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-one__right-bottom wow animated fadeInUp" data-wow-delay="0.1s">
                                    <ul class="social-links">
                                        <li> <a href=""https://twitter.com/NexselT" target="_blank"><span class="icon-twitter"></span></a> </li>
                                        <li> <a href="https://www.facebook.com/NexselLED" target="_blank"><span class="icon-facebook"></span></a> </li>
                                        <li> <a href="https://www.linkedin.com/company/nexsel" target="_blank"><span class="icon-linked-in-logo-of-two-letters"></span></a> </li>
                                        <li> <a href="https://www.instagram.com/nexselgrowlights/" target="_blank"><span class="icon-instagram"></span></a> </li>
                                        <li> <a href="https://www.instagram.com/nexselgrowlights/" target="_blank"><span class="fab fa-youtube"></span></a> </li>
                                    </ul>
                                    <div class="footer-one__right-bottom-contact">
                                        <div class="icon-box">
                                            <span class="icon-phone-call"></span>
                                        </div>
                                        <div class="content-box">
                                            <p>Call Anytime</p>
                                            <h4><a href="tel:+91 8604486047">+91 8604486047</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-one__bottom">
                <div class="container">
                    <div class="bottom-inner">
                        <div class="copyright">
                            <p>©2024.Nexsel Tech. All Rights Reserved.</p>
                        </div>

                        <ul class="footer-one__bottom-menu">
                            <li><a href="javascript:void(0);">Terms & Condition</a></li>
                            <li><a href="javascript:void(0);">Privacy </a></li>
                            <li><a href="javascript:void(0);">Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler">
                <i class="icon-plus"></i>
            </span>
            <div class="logo-box">
                <a href="javascript:void(0);" aria-label="logo image">
                    <img src="{{ static_asset('assets/home/images/resources/mobile-nav-logo.png') }}" alt="" />
                </a>
            </div>
            <div class="mobile-nav__container"></div>
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:info@example.com">info@example.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:123456789">444 000 777 66</a>
                </li>
            </ul>
            <div class="mobile-nav__social">
                <a href="javascript:void(0);" class="fab fa-twitter"></a>
                <a href="javascript:void(0);" class="fab fa-facebook-square"></a>
                <a href="javascript:void(0);" class="fab fa-pinterest-p"></a>
                <a href="javascript:void(0);" class="fab fa-instagram"></a>
            </div>

        </div>
    </div>

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form action="javascript:void(0);">
                <label for="search" class="sr-only">search here</label>
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </div>
    <a href="#" id="scrollToTopBtn" class="btn btn-success position-fixed bottom-0 end-0 m-4 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; z-index: 1000;display: none;">
    <i class="fas fa-arrow-up"></i>
    </a>
    <script src="{{ static_asset('assets/home/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/circleType/jquery.circleType.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/circleType/jquery.lettering.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/jquery-migrate/jquery-migrate.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/parallax/parallax.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/timepicker/timePicker.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/typed-2.0.11/typed-2.0.11.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/wow/wow.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/language-switcher/jquery.polyglot.language.switcher.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/slick-slider/slick.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/progress-bar/knob.js') }}"></script>
    <script src="{{ static_asset('assets/home/vendors/parsley/parsley.min.js') }}"></script>
    <script src="{{ static_asset('assets/home/js/custom.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    @yield('script_files')
    <script>
        $(document).ready(function () {
           var swiper = new Swiper(".review-swiper", {
                slidesPerView: 2,
                spaceBetween: 30,
                slidesPerGroup: 1,
                centeredSlides: false,
                loop: true,
                slideToClickedSlide: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    320: {
                    slidesPerView: 1,
                    spaceBetween: 10
                    },
                    480: {
                    slidesPerView: 1,
                    spaceBetween: 10
                    },
                    640: {
                    slidesPerView: 1,
                    spaceBetween: 10
                    },
                    980: {
                    slidesPerView: 2,
                    spaceBetween: 30
                    }
                }
           });

           var swiper2 = new Swiper(".client-swiper", {
                slidesPerView: 5,
                spaceBetween: 30,
                slidesPerGroup: 1,
                centeredSlides: true,
                loop: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    320: {
                    slidesPerView: 3,
                    spaceBetween: 10
                    },
                    480: {
                    slidesPerView: 3,
                    spaceBetween: 10
                    },
                    640: {
                    slidesPerView: 3,
                    spaceBetween: 10
                    },
                    980: {
                    slidesPerView: 5,
                    spaceBetween: 30
                    }
                }
           });

           var swiper3 = new Swiper(".tool-swiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                slidesPerGroup: 1,
                centeredSlides: true,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    320: {
                    slidesPerView: 3,
                    spaceBetween: 30
                    },
                    480: {
                    slidesPerView: 3,
                    spaceBetween: 30
                    },
                    640: {
                    slidesPerView: 3,
                    spaceBetween: 30
                    },
                    980: {
                    slidesPerView: 5,
                    spaceBetween: 30
                    }
                }
           });

           var swiper4 = new Swiper(".blog-swiper", {
                spaceBetween: 10,
                slidesPerView: 3,
                centeredSlides: true,
                loopAdditionalSlides: 30,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    320: {
                    slidesPerView: 1,
                    spaceBetween: 30
                    },
                    480: {
                    slidesPerView: 1,
                    spaceBetween: 30
                    },
                    640: {
                    slidesPerView: 1,
                    spaceBetween: 30
                    },
                    980: {
                    slidesPerView: 3,
                    spaceBetween: 30
                    }
                }
           });

           var swiper4 = new Swiper(".testimonial-swiper", {
                spaceBetween: 10,
                slidesPerView: 3,
                loopAdditionalSlides: 30,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    320: {
                    slidesPerView: 1,
                    spaceBetween: 30
                    },
                    480: {
                    slidesPerView: 1,
                    spaceBetween: 30
                    },
                    640: {
                    slidesPerView: 1,
                    spaceBetween: 30
                    },
                    980: {
                    slidesPerView: 3,
                    spaceBetween: 30
                    }
                }
           });
       });
   
  
// document.getElementById("scrollToTopBtn").addEventListener("click", function(e){
//     e.preventDefault();
//     window.scrollTo({ top: 0, behavior: 'smooth' });
// });
const btn = document.getElementById("scrollToTopBtn");
window.onscroll = () => {
    btn.style.display = window.scrollY > 300 ? "flex" : "none";
};
</script>

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiperContainers = document.querySelectorAll('.thm-swiper__slider');

        swiperContainers.forEach(function (container) {
            var options = JSON.parse(container.getAttribute('data-swiper-options'));
            new Swiper(container, options);
        });
    });
</script>


<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<script>
    $(document).ready(function () {
        $('.acc-btn').on('click', function () {
            var $this = $(this);
            var $content = $this.next('.acc-content');

            // Close all other accordions
            $('.acc-content').not($content).slideUp();
            $('.acc-btn').not($this).removeClass('active');

            // Toggle current
            $content.slideToggle();
            $this.toggleClass('active');
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Function to animate counter
        function animateCounter(counter) {
            const target = +counter.getAttribute('data-target');
            const speed = 200; // lower = faster

            const updateCount = () => {
                const current = +counter.innerText;
                const increment = Math.ceil(target / speed);

                if (current < target) {
                    counter.innerText = current + increment;
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target.toLocaleString(); // format number
                }
            };

            updateCount();
        }

        // Animate when in viewport
        function isInViewport(elem) {
            const rect = elem.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function checkCounters() {
            $('.counter').each(function () {
                if (!$(this).hasClass('counted') && isInViewport(this)) {
                    $(this).addClass('counted');
                    animateCounter(this);
                }
            });
        }

        // Check on scroll
        $(window).on('scroll', checkCounters);
        // Initial check
        checkCounters();
    });
</script>
</body>
</html>