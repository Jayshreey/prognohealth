@extends('home')
@section('meta_tag')
<meta name="description" content="{{ $gallery->seo_description }}"/>
<meta name="keywords" content="{{ $gallery->seo_keywords }}">
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $gallery->seo_title }}" />
<meta property="og:description" content="{{ $gallery->seo_description }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
<meta property="og:updated_time" content="{{ $gallery->updated_at }}" />
<meta property="og:image" content="{{ uploads_url($gallery->image) }}" />
<meta property="og:image:secure_url" content="{{ uploads_url($gallery->image) }}" />
<meta property="og:image:width" content="1280" />
<meta property="og:image:height" content="960" />
<meta property="og:image:alt" content="hydroponic farms" />
<meta property="og:image:type" content="image/webp" />
<meta property="article:published_time" content="{{ $gallery->created_at }}" />
<meta property="article:modified_time" content="{{ $gallery->updated_at }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $gallery->seo_title }}" />
<meta name="twitter:description" content="{{ $gallery->seo_description }}" />
<meta name="twitter:image" content="{{ uploads_url($gallery->image) }}" />
<meta name="twitter:label1" content="Time to read" />
<meta name="twitter:data1" content="Less than a minute" />
<style>
    .gallery-image {
        width: 100%;                 /* Responsive within the column */
        height: 250px;               /* Set a fixed height */
        object-fit: cover;           /* Crop to fill the box */
        border-radius: 20px;
    }
</style>
@endsection
@section('content')
@section('style_files')
<link rel="stylesheet" href="{{ static_asset('assets/home/vendors/fancybox/fancybox.css') }}" />
@endsection
@php $i = 0; @endphp
<section class="page-header gallery-header" style="background-image: url({{ static_asset('assets/home/images/backgrounds/slogan-v1-bg.png') }})">
    <div class="container">
        <div class="page-header__inner p-2 text-center">
            <h2>{{ isset($gallery->name) && $gallery->name!='' ? $gallery->name : 'Gallery' }}</h2>
        </div>
    </div>
</section>
<section class="testimonials-three testimonials-three--about pt-2" style="background-image: url({{ static_asset('assets/home/images/shapes/why-choose-v1-shape1.png') }})">
    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/testimonials-v3-shape2.png') }}" alt="gallery-details"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 p-4">
                <img class="img-responsive" src="{{ uploads_url($gallery->image) }}" alt="{{ $gallery->name }}">
            </div>
            @php 
                $features = json_decode(isset($gallery->features) && $gallery->features!= '' ? $gallery->features : '')
            @endphp
            <div class="col-12 col-sm-6 p-4">
                <div class="card gallery-head-card m-4 p-4">
                    <h2>Project Decription :</h2>
                    @if(isset($features) && !empty($features)) 
                        @foreach ($features as $fkey => $fvalue)
                            <p class="gallery-content-1">{{ isset($fvalue->feature) && $fvalue->feature!='' ? $fvalue->feature : '' }} : <strong>{{ isset($fvalue->description) && $fvalue->description!='' ? $fvalue->description : '' }}</strong></p>
                        @endforeach
                    @endif
                </div>
                <div class="btn-box ms-4">
                    <a href="javascript:void(0);" class="thm-btn rounded-0 m-2 btn-enquiry">Get Quote</a>
                    <a href="javascript:void(0);" class="thm-btn rounded-0 m-2">Call Now</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-one">
    <div class="container">
        <div class="sec-title text-center">
            <div class="sec-title__tagline">
                <span class="left"></span>
                <h6>Project Gallery</h6>
                <span class="right"></span>
            </div>
        </div>
        @php 
            $images = json_decode(isset($gallery->images) && $gallery->images != '' ? $gallery->images : '')
        @endphp
        <div class="row">
            @if(isset($images) && !empty($images)) 
                @foreach ($images as $img)
                    <div class="col-12 col-sm-4 mb-4">
                        <a data-fancybox="image" data-src="{{ uploads_url($img) }}">
                            <img class="gallery-image" src="{{ uploads_url($img) }}" alt="img">
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@section('script_files')
<script type="text/javascript" src="{{ static_asset('assets/home/vendors/fancybox/fancybox.umd.js') }}"></script>
@endsection
@endsection