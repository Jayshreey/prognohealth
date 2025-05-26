@extends('home')
@section('meta_tag')
<meta name="description" content="Discover the best LED grow lights from Nexsel Tech. Enhance your horticulture with our professional LED lighting solution for commercial greenhouses and vertical farming."/>
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $page_title }}" />
<meta property="og:description" content="Discover the best LED grow lights from Nexsel Tech. Enhance your horticulture with our professional LED lighting solution for commercial greenhouses and vertical farming." />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
<meta property="og:image" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:secure_url" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:width" content="180" />
<meta property="og:image:height" content="180" />
<meta property="og:image:alt" content="india india LED Plant Grow Lights 3" />
<meta property="og:image:type" content="image/png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $page_title }}" />
<meta name="twitter:description" content="Discover the best LED grow lights from Nexsel Tech. Enhance your horticulture with our professional LED lighting solution for commercial greenhouses and vertical farming." />
<meta name="twitter:image" content="{{ static_asset('images/favicon.png') }}" />
<meta name="twitter:label1" content="Time to read" />
<meta name="twitter:data1" content="2 minutes" />
<style>
.owl-carousel{
  display: block !important;
  visibility: visible !important;
}
.orange-border{
    border: 5px solid orange;
}
</style>
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
            <h2>About us</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>-</span></li>
                <li>About us</li>
            </ul>
        </div>
    </div>
</section>
<section class="about-two">
    <div class="about-two__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/about-v2-bg.png') }});"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__img">
                    <div class="about-two__img1">
                        <img src="{{ static_asset('assets/home/images/about/about-v2-img1.webp') }}" alt="about-us">
                    </div>
                    <div class="about-two__img2 wow zoomIn" data-wow-delay="100ms" data-wow-duration="3500ms">
                        <img src="{{ static_asset('assets/home/images/about/Tissue-Culture-Lighting-Cost.webp') }}" alt="about">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-two__content">
                    <div class="sec-title style2">
                        <div class="sec-title__tagline">
                            <div class="img-box"><img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="image">
                            </div>
                            <h6 class="text-theme-sd">About Nexsel</h6>
                        </div>
                        <h2 class="sec-title__title">Brief About Us</h2>
                    </div>

                    <div class="about-two__content-text1">
                        <p> Nexsel Tech Pvt Ltd founded in 2017 with registered capital INR 15,00,000.
                            We are located at Pune, our factory address – Office No. 1/2/3/6, B Wing, Chaitnya Industrial Estate, Narhe Road, Narhe 411 041, Pune Maharashtra India</p>
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
                        <p>We have 2500 sq. ft manufacturing unit to provide best product and 1000 sq. ft testing facility to make we are giving proven product to our customers.
                           We are the research-based organization, who has expertise on horticulture lighting. We can give complete solution for horticulture industry right from design to installation.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services-one">
    <div class="auto-container">
        <div class="sec-title text-center">
            <div class="sec-title__tagline">
                <div class="img-box">
                    <img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="image">
                    <h6 class="text-theme-sd m-2">Our Services</h6>
                </div>
                
            </div>
            <h2 class="sec-title__title">We Offer Services For</h2>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="about1">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="about2">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="about3">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/indoor-verticle-farming.jpg') }}" alt="indoor-verticle-farming">
                    </div>
                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">Indoor Vertical <br> Farming</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="about3">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="about4">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="about5">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/tissue-culture.jpg') }}" alt="tissue-culture">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">Tissue <br> Cultrue</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="about6">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="about7">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="about8">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/seed-companies.jpg') }}" alt="seed-companies">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">Seed <br> Companies</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="image">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="image">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="image">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/vertcle-green-wall.jpg') }}" alt="vertcle-green-wall">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">Vertical  <br> Green Wall</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="image">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="image">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="image">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/plant-reaserach.jpg') }}" alt="plant-reaserach">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">Plant Photobiology <br> Research</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="image">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="image">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="image">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/supplementory-light.jpg') }}" alt="supplementory-light">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">Supplymentary <br> Lights</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="image">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="image">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="image">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/miltary.jpg') }}" alt="miltary">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">Cordyceps <br> Militaries</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="image">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="image">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="image">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/Individuals-growers.jpg') }}" alt="Individuals-growers">
                    </div>
                    <div class="services-one__single-content text-center">
                        <h2><a href="javascript:void(0);">Individual's <br> Growers</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (isset($journey) && !empty($journey))
<section class="features-one">
    <div class="features-one__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/features-v1-bg.png') }});">
    </div>
    <div class="sec-title-three text-center">
        <h1 class="sec-title-three__title mb-4">Our Journey</h1>
    </div>
    <div class="container pt-2">
        <div class="row">
            <div class="col-xl-12">
                <div class="features-one__inner">
                    <div class="owl-carousel owl-theme thm-owl__carousel features-one__carousel"
                        data-owl-options='{
                            "loop": true,
                            "autoplay": true,
                            "margin": 30,
                            "nav": false,
                            "dots": false,
                            "smartSpeed": 500,
                            "autoplayTimeout": 10000,
                            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                            "responsive": {
                                    "0": {
                                        "items": 1
                                    },
                                    "768": {
                                        "items": 2
                                    },
                                    "992": {
                                        "items": 3
                                    },
                                    "1200": {
                                        "items": 4
                                    }
                                }
                            }'>
                        @foreach ($journey as $key => $value)
                        <div class="features-one__single text-center">
                            <div class="features-one__single-inner">
                                <div class="icon-box">
                                    <span class="icon-shovels"></span>
                                </div>

                                <div class="text-box">
                                    <h2>{{$value->title}}</h2>
                                    <p>{!! $value->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <!-- <div class="features-one__single text-center">
                            <div class="features-one__single-inner">
                                <div class="icon-box">
                                    <span class="icon-agriculture"></span>
                                </div>
                                <div class="text-box">
                                    <h2>2016</h2>
                                    <p><b>August</b><br>
                                        Take over LED manufacturing unit in Pune.<br>
                                        <b>August</b><br>
                                        Expansion of LED and RO products in two separate units.<br><br><br><br><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="features-one__single text-center">
                            <div class="features-one__single-inner">
                                <div class="icon-box">
                                    <span class="icon-gardening-1"></span>
                                </div>

                                <div class="text-box">
                                    <h2>2017</h2>
                                    <p><b>Jan</b><br>
                                        Started R&amp;D work of horticulture light.<br>
                                        <b>July</b><br>
                                        Brand evolution from “Spartan” to “Nexsel”<br><br><br><br><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="features-one__single text-center">
                            <div class="features-one__single-inner">
                                <div class="icon-box">
                                    <span class="icon-lawn-mower"></span>
                                </div>

                                <div class="text-box">
                                    <h2>2018</h2>
                                    <p><b>Jan</b><br>
                                        Initiated horticulture lights production and commercial selling.<br>
                                        <b>June</b><br>
                                        Decided to give complete focus on horticulture lights as Nexsel.<br><br><br><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="features-one__single text-center">
                            <div class="features-one__single-inner">
                                <div class="icon-box">
                                    <span class="icon-leaf"></span>
                                </div>
                                <div class="text-box">
                                    <h2>2019</h2>
                                    <p><b>Feb</b><br>
                                        First export order to Kuwait.
                                        <br><br><br><br><br><br><br><br><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="features-one__single text-center">
                            <div class="features-one__single-inner">
                                <div class="icon-box">
                                    <span class="icon-seeding"></span>
                                </div>
                                <div class="text-box">
                                    <h2>2020</h2>
                                    <p><b>May</b><br>
                                        Developed UVC products in COVID pandemic as social responsibility.<br>
                                        <b>October</b><br>
                                        Started 1000 Sq.ft. testing facility.<br>
                                        <b>December</b><br>
                                        Developed and launched LED grow chambers for plant research.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="features-one__single text-center">
                            <div class="features-one__single-inner">
                                <div class="icon-box">
                                    <span class="icon-leaf"></span>
                                </div>
                                <div class="text-box">
                                    <h2>2021</h2>
                                    <p><b>feb 2021</b> <br>
                                        Expanded production unit to new 2000 sq. ft facility <br>
                                        <b>Sept 2021
                                        </b> <br>
                                        Completed first commercial “Speed Breeding” project at Hyderabad <br>
                                        <br>
                                        <br><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="features-one__single text-center">
                            <div class="features-one__single-inner">
                                <div class="icon-box">
                                    <span class="icon-leaf"></span>
                                </div>
                                <div class="text-box">
                                    <h2>2022</h2>
                                    <p><b>Jan 2022</b> <br>
                                        Supplied first speed breeding grow chamber .<br>
                                        <b>March 2022 </b> <br>
                                        Appointed “Skyfield Agritech UAE’ as authorized distributor and service partner to serve customer in Gulf countries  
                                        2022<br>
                                        <b>Nov 2022 </b><br>
                                        Okra Speed Breeding Protocol – Successfully finalized okra speed breeding protocol at Nexsel inhouse research facility  <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="features-one__single text-center">
                            <div class="features-one__single-inner">
                                <div class="icon-box">
                                    <span class="icon-seeding"></span>
                                </div>
                                <div class="text-box">
                                    <h2>2023</h2>
                                    <p><b>April 2023</b> <br>
                                        80 million + tissue culture plants are successfully growing under Nexsel grow lights per year<br>
                                        <b>Sept 2023  </b> <br> 
                                        Appointed “ElecSys Lab New Zealand’ as authorized distributor and service partner to serve customer in New Zealand Territory <br>
                                        <b>Sept 2023 </b> <br>
                                        ‘Nexsel Research Facility’ (NRC) 10000 sq.ft  - Construction and Development work started  <br>
                                        <b>Dec 2023 </b> <br>12 Countries Market Presence – UAE, Kuwait, Saudi Arabia, Maldives, Australia, New Zealand, South Africa, Malesia, Philippines, Irelandd  <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="features-one__single text-center">
                            <div class="features-one__single-inner">
                                <div class="icon-box">
                                    <span class="icon-gardening-1"></span>
                                </div>

                                <div class="text-box">
                                    <h2>2024</h2>
                                    <p><b>Feb 2024</b> <br>
                                        “Nexsel Research Facility” started – 10,000 sq.ft dedicated research facility for artificial lighting for plants started functioning . <br><br><br><br><br><br>
                                    </p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="services-one about_vm-bg">
    <div class="auto-container about_vm-container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title text-white">Core Values, Vision & Mission</h2>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="services-one__single about_vm">
                    <div class="shape1 shape_vm"><img class="img" src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" width="100%" alt="img"></div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg" style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                    </div>

                    <div class="services-one__single-content">
                        <h2 class="about_vm-title">Core Values</h2>
                        <p class="about_vm-cotent">We always believe our core values define us<br>

                            <b>*</b> Continuous Improvement<br>
                            <b>*</b> Speed<br>
                            <b>*</b> Fail &amp; Fail Fast<br>
                            <b>*</b> Respect Individuals</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="services-one__single about_vm">
                    <div class="shape1 shape_vm"><img class="img" src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" width="100%"  alt="img">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg" style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                    </div>

                    <div class="services-one__single-content">
                        <h2 class="about_vm-title">Vision</h2>
                        <p class="about_vm-cotent">Our vision is leads us<br>
                            “To give such solutions and products to client so they will get best results”<br><br><br></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="services-one__single about_vm">
                    <div class="shape1 shape_vm"><img class="img" src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}"  width="100%" alt="img">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg" style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                    </div>

                    <div class="services-one__single-content">
                        <h2 class="about_vm-title">Mission</h2>
                        <p class="about_vm-cotent">Our mission motivates us<br>
                            “To become most trusted brand in horticulture lighting”
                            <br><br><br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (isset($team) && !empty($team))
<section class="features-one">
    <div class="features-one__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/features-v1-bg.png') }});">
    </div>
    <div class="sec-title-three text-center">
        <h1 class="sec-title-three__title mb-4">Leadership Team</h1>
    </div>
    <div class="container pt-2">
        <div class="row">
            @foreach ($team as $key => $value)
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="services-three__single about_team">
                        <img src="{{ uploads_image($value->image) }}" alt="{{ $value->name }}">
                        <div class="services-three__single-content mt-4">
                            <h3 class="text-black mb-2">{{ $value->name }}</h3>
                            <h6>{{ $value->position }}</h6>
                            <p>{{ $value->short_description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@if (isset($certificate) && !empty($certificate))
<section class="services-one about_vm-bg ">
    <div class="auto-container about_vm-container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title text-white">Certificates</h2>
        </div>
        <div class="row">
            @foreach ($certificate as $key => $value)
                <div class="col-xl-4 col-lg-4 col-md-4 ">
                    <img class="img orange-border" src="{{ uploads_url($value->image) }}" width="100%">
                </div>
            @endforeach
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
                            <img src="{{ uploads_image($value->image) }}" alt="{{ $value->name }}">
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
<!-- <section class="services-one about-btm-bg">
    <div class="auto-container about_vm-container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title">our Team</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card about-btm">
                    <img class="img" src="{{ static_asset('assets/home/images/about/slide-1.webp') }}" width="100%">
                </div>
            </div>
           
        </div>
    </div>
</section> -->
<section class="services-one about-btm-bg">
    <div class="auto-container about_vm-container">
        <div class="container my-5">
            <div class="sec-title text-center mb-4">
                <h2 class="sec-title__title">Our Team</h2>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-12">
                    <div class="card about-btm border-0 shadow-sm">
                        <img class="img-fluid rounded orange-border" src="{{ static_asset('assets/home/images/about/DSC07109-1536x864.webp') }}" alt="Our Team">
                    </div>
                </div>
            </div>
        </div>
        <div class="sec-title text-center">
            <h2 class="sec-title__title">Global Presence</h2>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card about-btm">
                    <img class="img" src="{{ static_asset('assets/home/images/about/slide-1.webp') }}" width="100%">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card about-btm">
                    <img class="img" src="{{ static_asset('assets/home/images/about/slide-2.webp') }}" width="100%">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- jQuery (important to load before using $) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$(document).ready(function() {
  $('.features-one__carousel').owlCarousel({
    loop: true,
    autoplay: true,
    margin: 30,
    nav: false,
    dots: false,
    smartSpeed: 500,
    autoplayTimeout: 10000,
    navText: ["<span class=\"fa fa-angle-left\"></span>", "<span class=\"fa fa-angle-right\"></span>"],
    responsive: {
      0: { items: 1 },
      768: { items: 2 },
      992: { items: 3 },
      1200: { items: 4 }
    }
  });
});
</script>