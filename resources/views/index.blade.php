@extends('home')
@section('meta_tag')
<meta name="description" content="Elevate your cultivation with top-quality LED Plant grow lights from Nexsel. Leading Hydroponics Solution Provider in India. Optimize plant growth and yields. Explore now."/>
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Nexsel&#039;s Spectrum Selection Guide: Optimize Plant Growth with the Best LED Lights" />
<meta property="og:description" content="Discover how Nexsel&#039;s expert team provides guidance on choosing the right spectrum LED lights for optimal plant growth. Maximize your results today." />
<meta property="og:title" content="{{ $page_title }}" />
<meta property="og:description" content="Elevate your cultivation with top-quality LED Plant grow lights from Nexsel. Leading Hydroponics Solution Provider in India. Optimize plant growth and yields. Explore now." />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
<meta property="og:image" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:secure_url" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:width" content="180" />
<meta property="og:image:height" content="180" />
<meta property="og:image:alt" content="LED Plant Grow Lights" />
<meta property="og:image:type" content="image/png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $page_title }}" />
<meta name="twitter:description" content="Elevate your cultivation with top-quality LED Plant grow lights from Nexsel. Leading Hydroponics Solution Provider in India. Optimize plant growth and yields. Explore now." />
<meta name="twitter:image" content="{{ static_asset('images/favicon.png') }}" />
<meta name="twitter:label1" content="Written by" />
<meta name="twitter:data1" content="Team Nexsel" />
<meta name="twitter:label2" content="Time to read" />
<meta name="twitter:data2" content="6 minutes" />
@endsection
@section('content')
@section('style_files')
<link rel="stylesheet" href="{{ static_asset('assets/home/vendors/fancybox/fancybox.css') }}" />
@endsection
@if(isset($slider) && !empty($slider))
<section class="main-slider main-slider-three">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true, "effect": "fade", "autoplay": { "delay": 5000 }}'>
        <div class="swiper-wrapper">
            @foreach($slider as $key => $value)
                <div class="swiper-slide">
                    <div class="image-layer" style="background-image:url({{ uploads_url($value->image) }})"></div>
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/slider-v3-shape1.png') }}" alt="img"></div>
                    <div class="container">
                        <div class="main-slider-three__content">
                            <div class="title">
                                <h2>{{ translate($value->name) }}</h2>
                            </div>

                            <div class="text">
                                <p>There are many variations of passage available the major <br> suffered alteration</p>
                            </div>
                            <div class="btn-box">
                                <a class="thm-btn" href="{{ route('web.contact_us') }}">
                                    <span class="txt">Contact Us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach    
        </div>
    </div>
</section>
@endif
<section class="about-two">
    <div class="about-two__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/about-v2-bg.png') }});"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__img">
                    <div class="about-two__img1">
                        <img src="{{ static_asset('assets/home/images/about/about-v2-img1.webp') }}" alt="#">
                    </div>
                    <div class="about-two__img2 wow zoomIn" data-wow-delay="100ms" data-wow-duration="3500ms">
                        <img src="{{ static_asset('assets/home/images/about/about-v2-img2.webp') }}" alt="#">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-two__content">
                    <div class="sec-title style2">
                        <div class="sec-title__tagline">
                            <div class="img-box"><img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="#">
                            </div>
                            <h6 class="text-theme-sd">About Nexsel</h6>
                        </div>
                        <h2 class="sec-title__title">Manufactures And Solution <br> Provider Of Horticulture <br> Lights</h2>
                    </div>

                    <div class="about-two__content-text1">
                        <p>Nexsel is a research-driven horticultural lighting manufacturer that provides LED grow lights for biotech and horticulture purposes.</p>
                    </div>

                    <div class="about-two__content-text2">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5">
                                <div class="single-box">
                                    <div class="icon-box bg-theme-sd">
                                        <span class="icon-planting"></span>
                                    </div>
                                    <div class="title-box">
                                        <h3>Founded In 2017</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-7 col-lg-7 col-md-7">
                                <div class="single-box">
                                    <div class="icon-box bg-theme-sd p-4">
                                        <span class="icon-planting"></span>
                                    </div>
                                    <div class="title-box">
                                        <h3>10000 Sq. Ft Plant Research Facility</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="about-two__content-text3">
                        <p>Founded in 2017 in Pune, India, they focus on plant biology research to create optimal spectra for plant development using advanced technology and a 4-step spectra development process. We offer support to customers from seedling to selling.</p>
                    </div>
                    <div class="btn-box mt-4">
                        <a class="thm-btn" href="{{ route('web.about_us')}}">
                            <span class="txt">Read More</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services-two bg-theme-homeproduct">
    <div class="shape1 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"><img
            class="float-bob-y" src="{{ static_asset('assets/home/images/shapes/services-v2-shape3.png') }}" alt="shape3"></div>
    <div class="shape2 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img
            class="float-bob-y" src="{{ static_asset('assets/home/images/shapes/services-v2-shape4.png') }}" alt="shape4"></div>
    <div class="container">
        <div class="sec-title style2 text-center">
            <div class="sec-title__tagline center"></div>
            <h2 class="sec-title__title mb-4">Our Products</h2>
        </div>
        <div class="row mt-4">
            <div class="col-xl-6 col-lg-6">
                <img class="img-fit mt-4" src="{{ static_asset('assets/home/images/about/about-us-2.webp') }}" alt="product-img">
            </div>
            <div class="col-xl-6 col-lg-6 lh-lg" >
                <p class="text-white">
                    We are a leading company with a complete range of horticulture lighting products that are designed and tested in our <strong> state-of-the-art 2000 sq. ft in-house plant research facility.</strong>
                </p>
                <p class="text-white">
                    Our unique <strong> 4-step spectrum development process,</strong> which utilizes AI-based applications, ensures superior quality products.
                </p>   
                <p class="text-white">
                    We offer a generous <strong> warranty of up to 60 months </strong> on each product, and our products are <strong> BIS, CE, and RoHS certified.</strong>
                </p>
                <p class="text-white">
                    To ensure timely replacements during the warranty period, we maintain a <strong> 1% extra stock.</strong>
                </p>
                <p class="text-white">
                    Our manufacturing processes strictly adhere to <strong> industry-standard design rules,</strong> ensuring consistently high-quality products.
                </p>
                <p class="text-white">
                    Additionally, our unique service offering includes a <strong> 7-step follow-up after dispatch </strong> make us different from others.
                </p>
            </div>
        </div>

        @if(isset($main_category) && !empty($main_category))
            <div class="row mt-4">
                @foreach ($main_category as $key => $value)
                    @php
                        $or_product = DB::table('product')->where('category_id','=',$value->id)->where('is_active','=','1')->count();
                        
                        @endphp
                    @if(isset($or_product) && $or_product<=1 && $or_product!=0)
                    <div class="col-xl-4 col-lg-6 wow fadeInLeft">
                        <div class="services-two__single d-flex h-100 overflow-hidden p-2 ">
                            
                                <!-- Left: Image -->
                                <div class="services-two__single-img d-flex align-items-center">
                                    <div class="inner">
                                        <img class="img-fit" style="height: 237px;" 
                                            src="{{ uploads_url(getColumnValue('product',['category_id'=>$value->id],'image')) }}" 
                                            alt="{{ $value->name }}">
                                    </div>
                                </div>

                            <!-- Right: Content -->
                            <div class="services-two__single-content d-flex flex-column flex-grow-1">
                                <div>
                                    <h4 class="fw-bold cat_size">
                                        <a href="{{ route('web.product_details',['slug'=>$value->slug]) }}">{{ $value->name }}</a>
                                    </h4>
                                    <p class="mb-3">{!! getColumnValue('product',['category_id'=>$value->id],'description') !!}</p>
                                </div>

                                <!-- Push button to bottom -->
                                <div class="mt-auto">
                                    <a href="{{ route('web.product_details',['slug'=>$value->slug]) }}" 
                                    class="btn btn-sm main-heade-buttons text-white">
                                        View More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    @else
                        @php 
                            $s_category = DB::table('category')->where('parent_id','=', $value->id)->where('is_active','=','1')->first();
                            
                            @endphp
                        @if(isset($s_category) && !empty($s_category))
                            <div class="col-xl-4 col-lg-6 wow fadeInLeft">
                                <div class="services-two__single">
                                    <div class="services-two__single-inner">
                                        <div class="services-two__single-img">
                                            <div class="inner">
                                                <img class="img-fit" src="{{ uploads_url(getColumnValue('product',['category_id'=>$s_category->id],'image')) }}" alt="{{ $value->name }}">
                                            </div>
                                        </div>
                                        <div class="services-two__single-content">
                                            <h4 class="fw-bold cat_size"><a href="{{ route('web.product_details',['slug'=>$s_category->slug]) }}">{{ $value->name }}</a></h4>
                                            <p>{!! getColumnValue('product',['category_id'=>$s_category->id],'description') !!}</p>
                                            <div class="mt-auto">
                                                <a href="{{ route('web.product_details',['slug'=>$s_category->slug]) }}" type="btn" class="btn btn-sm main-heade-buttons text-white">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif    
                @endforeach
            </div>
        @endif
    </div>
</section>
<section class="slogan-one mt-4 mb-0">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="slogan-one__inner">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/slogan-v1-shape1.png') }}" alt="#"></div>
                    <div class="slogan-one__bg"
                        style="background-image: url({{ static_asset('assets/home/images/backgrounds/slogan-v1-bg.png') }}); opacity: 0.1;">
                    </div>
                    <div class="container">
                        <ul class="counter-one__box">
                            <li class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="content-box">
                                        <!-- <h2 class="text-theme-sd">2,058</h2> -->
                                        <h2 class="counter text-theme-sd" data-target="2058">0</h2>
                                        <span class="text-theme-pm">Customer<br>Served</span>
                                    </div>
                                </div>
                            </li>
                            <li class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="content-box">
                                        <!-- <h2 class="text-theme-sd">16</h2> -->
                                        <h2 class="counter text-theme-sd" data-target="16">0</h2>
                                        <span class="text-theme-pm">Country Market <br> Presence</span>
                                    </div>
                                </div>
                            </li>
                            <li class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="content-box">
                                        <h2 class="counter text-theme-sd" data-target="68">0</h2>
                                        <span class="text-theme-pm">Spectrum <br> Tested</span>
                                    </div>
                                </div>
                            </li>
                           <li class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="content-box">
                                       <h2 class="counter text-theme-sd" data-target="16">0</h2>
                                        <span class="text-theme-pm">Sub <br> Divisions</span>
                                    </div>
                                </div>
                            </li>
                            <li class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="content-box">
                                        <h2 class="counter text-theme-sd" data-target="10000">0</h2>
                                        <span class="text-theme-pm">Sq. Ft Research <br> Facility</span>
                                    </div>
                                </div>
                            </li> 
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (isset($review) && !empty($review))
<section class="features-one testimonilas-custom-bg">
    <div class="features-one__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/features-v1-bg.png') }});"></div>
    
    <div class="sec-title-three text-center">
        <h1 class="sec-title-three__title mb-4">Reviews & Ratings</h1>
        <p style="max-width: 800px; margin: 0 auto; text-align: center;">
            “Nexsel Tech is pioneering the LED Grow Light revolution, with customers praising their quality, performance, and customer service.”
        </p>
    </div>

    <div class="container pt-2">
        <div class="row">
            <div class="col-xl-12 p-4 m-4" style="overflow: hidden;">
                <div class="swiper review-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($review as $key => $value)
                            <div class="features-one__single swiper-slide text-center d-flex align-items-stretch">
                                <div class="features-one__single-inner rating-review pt-0 pb-0 d-flex flex-column justify-content-between" style="border: 1px solid grey; border-radius: 10px; min-height: 450px;">
                                    <div class="testimonilas-two__single client-testimonials d-flex flex-column justify-content-between h-100">
                                        <div class="testimonilas-two__single-bottom p-0 m-0">
                                            <div class="left-box">
                                                <div class="img-box">
                                                    <div class="inner testimonilas-img-inner">
                                                        <img class="img-responsive" src="{{ $value->image }}" alt="{{ $value->name }}">
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="text-box">
                                                    <h3 class="text-black text-start"><strong>{{ $value->name }}</strong></h3>
                                                    <div class="rating-box text-start">
                                                        <ul>
                                                            @for ($i = 0; $i <= $value->rating; $i++)
                                                                <li><span class="icon-pointed-star"></span></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <p class="text-black text-start">{{ $value->position }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="testimonilas-two__single-top">
                                            <p class="text-black text-start">
                                                <b>{{ $value->description_title }}</b><br/>{{ $value->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next text-black"></div>
                    <div class="swiper-button-prev text-black"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endif
@if (isset($testimonial) && !empty($testimonial))
<section class="services-one">
    <div class="container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title">Clients Testimonials</h2>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div style="overflow: hidden;">
                    <div class="swiper testimonial-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($testimonial as $key => $value)
                                <div class="swiper-slide">
                                    <a data-fancybox="image" data-src="{{ $value->url }}">
                                        <img class="img-responsive" src="{{ uploads_url($value->image) }}" alt="img">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next text-black"></div>
                        <div class="swiper-button-prev text-black"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if (isset($client) && !empty($client))
<section class="features-one our-client">
    <div class="sec-title-three text-center">
        <h1 class="sec-title-three__title mb-4 text-white">Our Clients</h1>
    </div>
    <div class="container pt-2">
        <div class="row">
            <div class="col-xl-12">
                <div class="features-one__inner swiper client-swiper" style="overflow: hidden;">
                    <div class="swiper-wrapper">
                        @foreach ($client as $key => $value)
                        <div class="features-one__single text-center swiper-slide">
                            <img src="{{ $value->image }}" alt="{{ $value->name }}">
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next text-theme-pm"></div>
                    <div class="swiper-button-prev text-theme-pm"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="services-one">
    <div class="features-one__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/features-v1-bg.png') }});">
    </div>
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title">Why Choose Us</h2>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms"
                data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="#">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="#">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="#">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/wh-1.webp') }}" alt="#">
                    </div>
                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">2000 sq. ft plant <br> testing facility</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms"
                data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="#">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="#">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="#">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/wh-2.webp') }}" alt="#">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">Market presence in 4 continents, 11+ countries and 24 states in India.</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms"
                data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="#">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="#">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="#">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/wh-3.webp') }}" alt="#">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">4 steps spectra development process using AI</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="100ms"
                data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="#">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="#">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="#">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/wh-4.webp') }}" alt="#">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">7 steps-follow after dispatch</a></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-box text-center">
            <a class="thm-btn" href="{{ route('web.why_us') }}">
                <span class="txt">Read more</span>
            </a>
        </div>
    </div>
</section>
@if (isset($certificate) && !empty($certificate))
<section class="services-one about_vm-bg">
    <div class="auto-container about_vm-container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title text-white">Certificates</h2>
        </div>
        <div class="row">
            @foreach ($certificate as $key => $value)
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <img class="img" src="{{ uploads_url($value->image) }}" width="100%">
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@if (isset($home_blog) && !empty($home_blog))
<section class="services-one">
    <div class="features-one__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/features-v1-bg.png') }});">
    </div>
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title">Our Blogs On Horticulture</h2>
        </div>
        <div class="row mb-4">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div style="overflow: hidden;">
                    <div class="swiper blog-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($home_blog as $key => $value)
                                <div class="swiper-slide blog-slide" style="background-image: url('{{ uploads_url($value->image) }}');">
                                    <h5 class="blog-sec-heading">{{ $value->name }}</h5>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next text-black"></div>
                        <div class="swiper-button-prev text-black"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-box text-center mt-4">
            <a class="thm-btn" href="{{ route('web.blog') }}"><span class="txt">Read more</span> </a>
        </div>
    </div>
</section>
@endif
@section('script_files')

@endsection
@endsection
