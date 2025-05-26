@extends('home')
@section('meta_tag')
<meta name="description" content="Yes, all lighting systems produce heat, but our systems dissipate the heat differently than other LED systems, fluorescent or HID (i.e. metal halide) lighting"/>
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $page_title }}" />
<meta property="og:description" content="Yes, all lighting systems produce heat, but our systems dissipate the heat differently than other LED systems, fluorescent or HID (i.e. metal halide) lighting" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
<meta property="og:image" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:secure_url" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:width" content="180" />
<meta property="og:image:height" content="180" />
<meta property="og:image:alt" content="testimonal" />
<meta property="og:image:type" content="image/png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $page_title }}" />
<meta name="twitter:description" content="Yes, all lighting systems produce heat, but our systems dissipate the heat differently than other LED systems, fluorescent or HID (i.e. metal halide) lighting" />
<meta name="twitter:image" content="{{ static_asset('images/favicon.png') }}" />
<meta name="twitter:label1" content="Time to read" />
<meta name="twitter:data1" content="10 minutes" />
@endsection
@section('content')
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/page-header-bg.jpg') }})">
    </div>
    <div class="shape1">
        <img src="{{ static_asset('assets/home/images/shapes/testimonials-v3-shape2.png') }}" alt="about-img">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Support</h2>
        </div>
    </div>
</section>
@if(isset($faq) && !empty($faq)) 
@php $i=0; @endphp
<section class="faq-one" style="background-color: transparent; background-image: radial-gradient(at center center, #FFFFFF 0%, #F4FFEA 53%)">
    <div class="sec-title-three text-center">
        <div class="sec-title-three__tagline">
            <h6>WHAT OUR PRODUCTS DO AND HOW THEY DO IT.</h6>
        </div>
        <h2 class="sec-title-three__title">Frequently Asked Questions (FAQ'S)</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="img-div" style="padding-top: 70px;">
                    <img class="img-responsive" src="{{ static_asset('assets/home/images/about/contact-support.webp') }}" width="100%" alt="support">
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="faq-one__accordion mt-0">
                    <ul class="accordion-box">
                        @foreach ($faq as $key => $value)
                        @php $i++; @endphp
                            <li class="accordion block" style="box-shadow: 1px 1px 1px 1px #dfdfdf;">
                                <div class="acc-btn">
                                    <div class="icon-outer"><i class="icon-up-arrow"></i></div>
                                    <h3>{{ $value->question }}</h3>
                                </div>
                                <div class="acc-content border-0" style="display:{{ $i==1 ?  "block" :  "none" }}">
                                    <p>{!! $value->description !!}</p>
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
@if(isset($client_faq) && !empty($client_faq))
@php $cl=0; $cr=0; @endphp
<section class="services-three support-question">
    <div class="shape3 wow slideInRight animated" data-wow-delay="100ms" data-wow-duration="2500ms" style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;"><img class="float-bob-y" src="{{ static_asset('assets/home/images/shapes/services-v3-shape2.png') }}" alt="support-shape">
    </div>
    <div class="services-three__bg"></div>
    <div class="container">
        <div class="sec-title-three text-center">
            <div class="sec-title-three__tagline">
                <h6 class="text-white">QUESTIONS ? ANSWERS</h6>
            </div>
            <h2 class="sec-title-three__title text-white">Client Portfolio</h2>
        </div>
    </div>
</section>
<section class="faq-one" style="background-color: transparent; background-image: radial-gradient(at center center, #FFFFFF 0%, #F4FFEA 53%)">
    <div class="shape1 wow slideInLeft animated" data-wow-delay="100ms" data-wow-duration="2500ms" style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInLeft;"><img class="float-bob-y" src="{{ static_asset('assets/home/images/shapes/free-quote-v1-shape1.png') }}" alt="#"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="faq-one__accordion mt-0">
                    <ul class="accordion-box">
                        @foreach ($client_faq as $ckey => $cvalue)
                            @if($cvalue->id%2==0) @php $cl++; @endphp
                                <li class="accordion block" style="box-shadow: 1px 1px 1px 1px #dfdfdf;">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><i class="icon-up-arrow"></i></div>
                                        <h3>{{ $cvalue->question }}</h3>
                                    </div>
                                    <div class="acc-content border-0" style="display:{{ $cl==1 ?  "block" :  "none" }}">
                                        <p>{!! $cvalue->description !!}</p>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="faq-one__accordion mt-0">
                    <ul class="accordion-box">
                        @foreach ($client_faq as $ckey => $cvalue)
                            @if($cvalue->id%2!=0) @php $cr++; @endphp
                                <li class="accordion block" style="box-shadow: 1px 1px 1px 1px #dfdfdf;">
                                    <div class="acc-btn">
                                        <div class="icon-outer"><i class="icon-up-arrow"></i></div>
                                        <h3>{{ $cvalue->question }}</h3>
                                    </div>
                                    <div class="acc-content border-0" style="display:{{ $cr==1 ?  "block" :  "none" }}">
                                        <p>{!! $cvalue->description !!}</p>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection
