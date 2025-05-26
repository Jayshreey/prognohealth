@extends('home')
@section('meta_tag')
<meta name="description" content="LED Grow Lights - Enhance your plant growth and yield with Nexsel Tech&#039;s high-quality horticulture lighting products. Upgrade your setup today!"/>
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="LED Grow Lights | Boost Your Horticulture with Nexsel Tech" />
<meta property="og:description" content="LED Grow Lights - Enhance your plant growth and yield with Nexsel Tech&#039;s high-quality horticulture lighting products. Upgrade your setup today!" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
<meta property="og:image" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:secure_url" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:width" content="180" />
<meta property="og:image:height" content="180" />
<meta property="og:image:alt" content="india LED Grow Lights" />
<meta property="og:image:type" content="image/png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="LED Grow Lights | Boost Your Horticulture with Nexsel Tech" />
<meta name="twitter:description" content="LED Grow Lights - Enhance your plant growth and yield with Nexsel Tech&#039;s high-quality horticulture lighting products. Upgrade your setup today!" />
<meta name="twitter:image" content="{{ static_asset('images/favicon.png') }}" />
<meta name="twitter:label1" content="Time to read" />
<meta name="twitter:data1" content="43 minutes" />
@endsection
@section('content')
<!-- <section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/product-bg.jpg') }})">
    </div>
    <div class="shape1">
        <img src="{{ static_asset('assets/home/images/shapes/testimonials-v3-shape2.png') }}" alt="about-img">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <h2>{{ $page_title }}</h2>
        </div>
    </div>
</section> -->
<section class="main-slider main-slider-three">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true, "effect": "fade", "autoplay": { "delay": 5000 }}'>
        <div class="swiper-wrapper">
           
                <div class="swiper-slide">
                    <div class="image-layer" style="background-image:url({{ static_asset('assets/home/images/backgrounds/product-bg.jpg') }})"></div>
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/slider-v3-shape1.png') }}" alt="img"></div>
                    <div class="container">
                        <div class="main-slider-three__content">
                            <div class="title">
                                <h2>{{ $page_title }}</h2>
                            </div>

                            <div class="text">
                                <p>BUY Grow Lights! Pricing starts from Rs. 400 to Rs. 1500</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</section>
<section class="about-two">
    <div class="about-two__bg"></div>
    <div class="container">
        <div class="row p-4">
            <div class="col-xl-6">
                <img src="{{ static_asset('assets/home/images/backgrounds/grow-light-distance-from-plants.jpg') }}" alt="about-us">
            </div>
            <div class="col-xl-6">
                <div class="about-two__content">
                    <h5 class="tool-sec-heading" >{{ $fr_category->name }}</h5>
                    <div class="about-two__content-text1">
                        <p>We excel in plant biology research, identifying optimal spectra for plant development. Our fixtures, crafted with premium components, offer customizable options. This process aids in extracting meaningful insights, enhancing signal clarity, and improving data interpretation.</p>
                    </div>
                    <div class="btn-box">
                        <a class="thm-btn" href="{{ route('web.product_details',['slug'=>$fr_category->slug]) }}">
                            <span class="txt">Read more</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(isset($category) && !empty($category))
@foreach ($category as $key => $value)
    @php
        $product = DB::table('product')->where('id','!=', '12')->where('category_id','=', $value->id)->where('is_active','=','1')->get()->toarray();
    @endphp
    @if(isset($product) && !empty($product))
    <section class="team-two">
    <div class="shape1 float-bob-y">
        <img src="{{ static_asset('assets/home/images/shapes/team-v2-shape1.png') }}" alt="product-img">
    </div>
    <div class="shape2 float-bob-y">
        <img src="{{ static_asset('assets/home/images/shapes/team-v2-shape2.png') }}" alt="product-img">
    </div>
    <div class="container">
        <div class="sec-title-three text-center">
            <h2 class="sec-title-three__title">{{ $value->name }}</h2>
        </div>
        <div class="row">
            @foreach ($product as $pkey => $pvalue)
                <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
                    <div class="team-two__single flex-column d-flex w-100">
                        <div class="team-two__single-img">
                            <img src="{{ uploads_image($pvalue->image) }}" alt="{{ $pvalue->name }}">
                            <ul class="social-links clearfix">
                                <li class="share">
                                    <a href="javascript:void(0);"><span class="icon-gardening-1"></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="team-two__single-content d-flex flex-column h-100">
                            <h2><a href="javascript:void(0);">{{ $pvalue->name }}</a></h2>
                            <p class="text-black product-pr mb-2">{!! $pvalue->short_description !!}</p>

                            <!-- Spacer to push button down -->
                            <div class="mt-auto text-center">
                                <a href="{{ route('web.product_details',['slug'=>$value->slug]) }}"
                                   style="color: #ffffff; background-color: #2B8010; border-radius: 5px; padding: 8px 15px; text-decoration: none;">
                                   <b>View More</b>
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
@endforeach
@endif
@if (isset($review) && !empty($review))
<section class="features-one testimonilas-custom-bg">
    <div class="features-one__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/features-v1-bg.png') }});">
    </div>
    <div class="sec-title-three text-center">
        <h1 class="sec-title-three__title mb-4">Reviews & Ratings</h1>
    </div>
    <div class="container pt-2">
        <div class="row">
            <div class="col-xl-12 p-4 m-4" style="overflow: hidden;">
                <div class="swiper review-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($review as $key => $value)
                            <div class="features-one__single swiper-slide text-center">
                                <div class="features-one__single-inner rating-review pt-0 pb-0" style="border: 1px solid #000;">
                                    <div class="testimonilas-two__single client-testimonials">
                                        <div class="testimonilas-two__single-bottom p-0 m-0">
                                            <div class="left-box">
                                                <div class="img-box">
                                                    <div class="inner testimonilas-img-inner">
                                                        <img class="img-responsive" src="{{ uploads_url($value->image) }}" alt="{{ $value->name }}" >
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="text-box">
                                                    <h3 class="text-black text-start">{{ $value->name }}</h3>
                                                    <div class="rating-box text-start">
                                                        <ul>
                                                            @for ($i=0; $i<=$value->rating; $i++)
                                                                <li>
                                                                    <span class="icon-pointed-star"></span>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <p class="text-black text-start">{{ $value->position }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonilas-two__single-top">
                                            <p class="text-black text-start">{{ $value->description }}</p>
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
@if(isset($fr_category) && !empty($fr_category))
    @php 
        $fr_product = DB::table('product')->where('id','=', '1')->where('category_id','=', $fr_category->id)->where('is_active','=','1')->first();
    @endphp
    @if(isset($fr_category) && !empty($fr_category))
        <section class="about-two p-4" style="background-color: #F7F7F7">
            <div class="about-two__bg why_us-bg-1"></div>
            <div class="container p-4">
                {{-- <div class="row"> --}}
                    <div style="text-align: justify; padding-left: 4%;"></div>
                {{-- </div> --}}
            </div>
        </section>
    @endif
@endif
@if(isset($faq) && !empty($faq))
@php $f=0; @endphp
<section class="faq-two faq-two--faq">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-12">
                <div class="faq-two__accordion">
                    <div class="sec-title-three text-center">
                        <h2 class="sec-title-three__title">FAQ's</h2>
                    </div>

                    <ul class="accordion-box">
                        @foreach ($faq as $fkey => $fvalue)
                        @php $f++; @endphp
                            <li class="accordion block active-block" style="border: none">
                                <div class="acc-btn product-faq {{ $f==1 ?  "active" :  "" }}">
                                    <div class="icon-outer text-white">
                                        <i class="icon-plus-1"></i>
                                    </div>
                                    <h3 class="product-faq-h3"> {{ $fvalue->question }}</h3>
                                </div>
                                <div class="acc-content {{ $f==1 ?  "current" :  "" }} mt-2">
                                    <p>{!! $fvalue->description !!}</p>
                                </div>
                            </li> 
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="team-two">
    <div class="shape1 float-bob-y"><img src="assets/images/shapes/team-v2-shape1.png" alt="#"></div>
    <div class="shape2 float-bob-y"><img src="assets/images/shapes/team-v2-shape2.png" alt="#"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 text-center">
                <img class="img-responsive" src="{{ uploads_url('../images/owner-photo.webp') }}">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <h2 class="text-black" style="font-weight: 500; font-size: 38px; font-family: Arial, Helvetica, sans-serif, 'Arial Black', Gadget, sans-serif;">Vishal Bhosale</h2>
                <div class="about-border-box1"></div>
                <strong class="text-black" style="font-size: 14pt;">CEO & Founder of Nexsel Tech Pct Ltd </strong><br>
                <strong class="text-black">Education:</strong> BE Mechanical
                The entrepreneur, CEO, and Founder of Nexsel Tech Pct Ltd, has 8 years of experience in artificial lighting for controlled environment agriculture. They have created over 22 spectra for applications like tissue culture, speed breeding, vertical farming, supplemental lighting, green walls, algae cultivation, and crafting. Specializing in innovative lighting solutions, they use a 4-step spectra development process with a unique growth chamber and Al-based application. Their spectra are in use across 12 countries globally. Their contributions to controlled environment agriculture earned them the ACE Game Changer Award in 2023, recognizing their impact on plant growth and productivity optimization in specialized environments.
                <div class="blog-details__social-list justify-content-end mt-4">
                    <a href="https://www.linkedin.com/in/vishal-bhosale-ab35a7135/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://x.com/vishalbhosale22" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="javascript:void(0);"><i class="fab fa-facebook"></i></a>
                    <a href="javascript:void(0);"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection