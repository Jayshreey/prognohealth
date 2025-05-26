@extends('home')
@section('meta_tag')
<meta name="description" content="{{ $tool->seo_description }}"/>
<meta name="keywords" content="{{ $tool->seo_keywords }}">
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $tool->seo_title }}" />
<meta property="og:description" content="{{ $tool->seo_description }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
@php $meta_key_words = explode(',',$tool->seo_keywords) @endphp
@if(isset($meta_key_words) && !empty($meta_key_words))@foreach ($meta_key_words as $meta_key_word)
<meta property="article:tag" content="{{ $meta_key_word }}" />
@endforeach @endif
<meta property="og:updated_time" content="{{ $tool->updated_at }}" />
<meta property="og:image" content="{{ uploads_url($tool->image) }}" />
<meta property="og:image:secure_url" content="{{ uploads_url($tool->image) }}" />
<meta property="og:image:width" content="1917" />
<meta property="og:image:height" content="1080" />
<meta property="og:image:alt" content="{{ $tool->seo_title }}" />
<meta property="og:image:type" content="image/png" />
<meta property="article:published_time" content="{{ $tool->created_at }}" />
<meta property="article:modified_time" content="{{ $tool->updated_at }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $tool->seo_title }}" />
<meta name="twitter:description" content="{{ $tool->seo_description }}" />
<meta name="twitter:image" content="{{ uploads_url($tool->image) }}" />
<meta name="twitter:label1" content="Written by" />
<meta name="twitter:data1" content="Team Nexsel" />
<meta name="twitter:label2" content="Time to read" />
<meta name="twitter:data2" content="2 minutes" />
@endsection
@section('content')
@section('style_files')
<link rel="stylesheet" href="{{ static_asset('assets/home/vendors/fancybox/fancybox.css') }}" />
@endsection
@php $i = 0; @endphp
<section class="page-header gallery-header" style="background-image: url({{ static_asset('assets/home/images/backgrounds/slogan-v1-bg.png') }})">
    <div class="container">
        <div class="page-header__inner p-2 text-center">
            <h2>{{ isset($page_title) && $page_title!='' ? $page_title : $tool->name }}</h2>
        </div>
    </div>
</section>
<section class="testimonials-three testimonials-three--about pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 p-4">
                <img class="img-responsive" src="{{ uploads_url($tool->image) }}" alt="{{ $tool->name }}">
            </div>
            <div class="col-12 col-sm-6 p-4">
                <div class="card gallery-head-card m-4 p-4">
                    {!! $tool->description !!}
                </div>
                <div class="btn-box ms-4">
                    <a href="javascript:void(0);" class="thm-btn rounded-0 m-2 btn-enquiry">Get Quote</a>
                    <a href="javascript:void(0);" class="thm-btn rounded-0 m-2">Call Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
@php 
$de_sec = json_decode(isset($tool->section) && $tool->section!= '' ? $tool->section : '')
@endphp
@if(isset($de_sec) && !empty($de_sec)) 
<section class="services-one pt-0">
    <div class="container">
        <div class="row">
            @foreach ($de_sec as $dkey => $dvalue)
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card product-section m-2 p-4">
                        <h5 class="tool-sec-heading">{{  $dvalue->name }}</h5>
                        <p>{!! $dvalue->description !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<section class="blog-one pt-2">
    <div class="container">
        @php 
            $images = json_decode(isset($tool->images) && $tool->images!= '' ? $tool->images : '')
        @endphp
        @if(isset($images) && !empty($images)) 
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card p-4" style="overflow: hidden;">
                        <div class="swiper tool-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($images as $img)
                                    <div class="swiper-slide">
                                        <img class="img-thumbnail" src="{{ uploads_url($img) }}" alt="img" width="100%">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next text-black"></div>
                            <div class="swiper-button-prev text-black"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@if(isset($popular_blogs) && !empty($popular_blogs)) 
<section>
    <div class="container">
        <div class="row">
            <h5 class="mb-3">Related Posts :</h5>
            <div class="col-xl-9">
                <div class="row">
                    @foreach ($popular_blogs as $key => $value)
                        <div class="col-xl-4 col-md-4 col-12">
                            <a href="javascript:void(0);">
                                <div class="card blog-card-1">
                                    <div class="card-title">
                                        <img class="img-responsive lazy-image" src="{{ uploads_url($value->image) }}" style="width:100%; max-height: 250px" alt="{{ $value->name }}">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="blog-title-1 mb-2">{{ $value->name }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@section('script_files')
<script type="text/javascript" src="{{ static_asset('assets/home/vendors/fancybox/fancybox.umd.js') }}"></script>
@endsection
@endsection