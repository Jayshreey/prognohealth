
@extends('home')
@section('meta_tag')
<meta name="description" content="{{ $blog->seo_description }}"/>
<meta name="keywords" content="{{ $blog->seo_keywords }}">
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $blog->seo_title }}" />
<meta property="og:description" content="{{ $blog->seo_description }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
<meta property="article:section" content="Basic of Artificial Lighting for Plants" />
<meta property="og:updated_time" content="{{ $blog->updated_at }}" />
<meta property="og:image" content="{{ uploads_url($blog->image) }}" />
<meta property="og:image:secure_url" content="{{ uploads_url($blog->image) }}" />
<meta property="og:image:width" content="1917" />
<meta property="og:image:height" content="1080" />
<meta property="og:image:alt" content="{{ $blog->seo_title }}" />
<meta property="og:image:type" content="image/png" />
<meta property="article:published_time" content="{{ $blog->created_at }}" />
<meta property="article:modified_time" content="{{ $blog->updated_at }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $blog->seo_title }}" />
<meta name="twitter:description" content="{{ $blog->seo_description }}" />
<meta name="twitter:image" content="{{ uploads_url($blog->image) }}" />
<meta name="twitter:label1" content="Written by" />
<meta name="twitter:data1" content="Team Nexsel" />
<meta name="twitter:label2" content="Time to read" />
<meta name="twitter:data2" content="2 minutes" />
@endsection
@section('content')
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ uploads_image($blog->background_banner) }})">
    </div>
    <div class="shape1">
        <img src="{{ static_asset('assets/home/images/shapes/page-header-shape1.png') }}" alt="image">
    </div>

    <div class="container">
        <div class="page-header__inner">
            <h2>{{ $blog->name }}</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>-</span></li>
                <li>Blog</li>
                <li><span>-</span></li>
                <li>{{ $blog->name }}</li>
            </ul>
        </div>
    </div>
</section>
<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="blog-details__content">
                    <div class="blog-page__single">
                        <div class="blog-page__single-img">
                            <div class="inner">
                                <img src="{{ uploads_image($blog->image) }}" alt="{{ $blog->name }}">
                            </div>
                        </div>
                        <div class="blog-page__single-content">
                            <div class="blog-details__social-list mt-4 mb-4">
                                <a href="https://www.facebook.com/login.php" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="https://api.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </div>
                            <ul class="meta-box">
                                <li>
                                    <a href="javascript:void(0);"><i class="fa fa-user"></i>{{ get_crud_user_details($blog->created_by,'name') }}</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa fa-calendar"></i>{{ display_datetime_format($blog->created_at,'date') }}</a>
                                </li>
                            </ul>
                            {!! $blog->description !!}
                        </div>
                        <div class="blog-details__social-list mt-4">
                            <a href="https://www.facebook.com/login.php" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="https://api.whatsapp.com/" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                    @if(isset($related_blogs) && !empty($related_blogs)) 
                        <section>
                            <div class="container">
                                <div class="row">
                                    <h5 class="mb-3">Related Posts :</h5>
                                    <div class="col-xl-9">
                                        <div class="row">
                                            @foreach ($related_blogs as $key => $value)
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
                    @php $tags = $blog->tags!='' ? explode(",",$blog->tags) : array() @endphp
                    @if(isset($tags) && !empty($tags))
                    <div class="blog-details__bottom">
                        <p class="blog-details__tags">
                            @foreach ($tags as $tag)
                                <a href="javascript:void(0);">{{ $tag }}</a>
                            @endforeach
                        </p>
                    </div>
                    @endif
                    <div class="comment-form">
                        <h3 class="comment-form__title">Leave A Reply</h3>
                        <form action="javascript:void(0);" class="comment-one__form contact-form-validated"
                            novalidate="novalidate">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Your Name" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="comment-form__input-box">
                                        <input type="email" placeholder="Email Address" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="comment-form__input-box comment-form__textarea">
                                        <textarea name="message" placeholder="Write Comment"></textarea>
                                    </div>

                                    <div class="comment-form__btn-box">
                                        <button class="thm-btn" type="submit"
                                            data-loading-text="Please wait...">
                                            <span class="txt">
                                                Post Comment
                                            </span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search wow animated fadeInUp" data-wow-delay="0.1s">
                        <form class="sidebar__search-form" id="search-form" action="{{ route('web.blog') }}" data-direct="true" method="GET">
                            <input type="search" placeholder="Search...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    @if(isset($blog_category) && !@empty($blog_category))
                        <div class="sidebar__single sidebar__category wow animated fadeInUp" data-wow-delay="0.2s">
                            <h3 class="title mb-2">{{ translate('Blog Categories') }}</h3>
                            <ul class="sidebar__category-list">
                                @foreach ($blog_category as $key => $value)
                                    <li><a href="{{ route('web.blog_category',['slug'=>$value->slug]) }}">{{ $value->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @if(isset($popular_blogs) && !empty($popular_blogs))
                        <div class="sidebar__single sidebar__post wow animated fadeInUp" data-wow-delay="0.3s">
                            <h3 class="title mb-2">{{ translate('Popular Post') }}</h3>
                            @foreach ($popular_blogs as $key => $value)
                                <div class="sidebar__post-box">
                                    <div class="sidebar__post-single">
                                        <div class="sidebar-post__img">
                                            <img src="{{ uploads_url($value->image) }}" alt="{{ $value->name }}">
                                        </div>
                                        <div class="sidebar__post-content-box">
                                            <h3><a href="{{ route('web.blog_details',['slug'=>$value->slug]) }}">{{ $value->name }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@if (isset($popular_products) && !empty($popular_products))
<section class="services-one popular-product">
    <div class="features-one__bg" style="background-image: url({{ static_asset('assets/home/images/shapes/main-header-v2-bg.png') }}); opacity: 1;">
    </div>
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title text-white">Popular Products</h2>
        </div>
        <div class="row mb-4">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div style="overflow: hidden;">
                    <div class="swiper blog-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($popular_products as $key => $value)
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
    </div>
</section>
@endif
@endsection