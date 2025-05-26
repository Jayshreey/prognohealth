@extends('home')
@section('meta_tag')
<meta name="description" content="Discover the best LED grow lights for your indoor farm. Reach out to Nexsel today and maximize your yields. Contact us now!"/>
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $page_title }}" />
<meta property="og:description" content="Discover the best LED grow lights for your indoor farm. Reach out to Nexsel today and maximize your yields. Contact us now!" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="Nexsel Tech" />
<meta property="og:updated_time" content="2024-07-30T11:30:42+05:30" />
<meta property="og:image" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:secure_url" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:width" content="180" />
<meta property="og:image:height" content="180" />
<meta property="og:image:alt" content="india LED Plant Grow Lights 7" />
<meta property="og:image:type" content="image/png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $page_title }}" />
<meta name="twitter:description" content="Discover the best LED grow lights for your indoor farm. Reach out to Nexsel today and maximize your yields. Contact us now!" />
<meta name="twitter:image" content="{{ static_asset('images/favicon.png') }}" />
<meta name="twitter:label1" content="Time to read" />
<meta name="twitter:data1" content="Less than a minute" />
@endsection
@section('content')
 <section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/back_slider.webp') }})">
    </div>
    <div class="shape1">
        <img src="{{ static_asset('assets/home/images/shapes/page-header-shape1.png') }}" alt="#">
    </div>
    <div class="container">
        <div class="page-header__inner">
            
            <h2>{{ translate($page_title) }}</h2>
            <!-- <ul class="thm-breadcrumb">
          
                <li></li>
            </ul> -->
        </div>
    </div>
</section> 

<section class="about-two pb-2" style="background-color: #F7F7F7">
    <div class="about-two__bg why_us-bg-1"></div>
        <div class="container" style="margin-left:20px;">
            <div class="row">
            <div class="col-xl-2" style="background-image: url({{ static_asset('assets/home/images/backgrounds/testimonilas-v2-shape1.png') }})">
               
                </div>
                <div class="col-xl-8">
                {!! $pages->description !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection