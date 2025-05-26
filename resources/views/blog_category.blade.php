
@extends('home')
@section('meta_tag')
<meta name="robots" content="follow, noindex"/>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $page_title }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
<meta property="og:image" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:secure_url" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:width" content="250" />
<meta property="og:image:height" content="250" />
<meta property="og:image:type" content="image/png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $page_title }}" />
<meta name="twitter:image" content="{{ static_asset('images/favicon.png') }}" />
<style>
    .date-box {
    border-radius: 0 0.5rem 0.5rem 0;
    font-weight: bold;
    z-index: 2;
}

.blog-title-1 {
    font-size: 1.25rem;
    font-weight: 600;
}

.blog-content-1 {
    font-size: 0.95rem;
    color: #555;
}
</style>
@endsection
@section('content')
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/page-header-bg.jpg') }})">
    </div>
    <div class="shape1">
        <img src="{{ static_asset('assets/home/images/shapes/page-header-shape1.png') }}" alt="image">
    </div>

    <div class="container">
        <div class="page-header__inner">
            <h2>{{ isset($page_title) && $page_title!='' ? $page_title : 'Blog' }}</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>-</span></li>
                <li>{{ isset($page_title) && $page_title!='' ? $page_title : 'Blog' }}</li>
            </ul>
        </div>
    </div>
</section>
@if(isset($blogs) && !empty($blogs))
<section class="blog-details pt-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-9">
                <div class="row">
                    @foreach ($blogs as $key => $value)
                         <div class="col-xl-4 col-md-4 col-12">
                            <a href="{{ route('web.blog_details',['slug'=>$value->slug]) }}">
                                <div class="card h-100 blog-card border-0 shadow-sm">
                                    <div class="blog-page__single-img">
                                    <a href="{{ route('web.blog_details', ['slug' => $value->slug]) }}">
                                        <img class="card-img-top lazy-image" src="{{ uploads_url($value->image) }}" alt="{{ $value->name }}" style="height: 250px; object-fit: cover;">
                                    </a>
                                        <div class="date-box">
                                            <h4>{{ display_datetime_format($value->created_at,'day') }} <br> {{ display_datetime_format($value->created_at,'month') }}</h4>
                                        </div>
                                    </div>
                                     <div class="card-body d-flex flex-column">
                                        <h5 class="card-title blog-title-1 mb-2">
                                            <a href="{{ route('web.blog_details', ['slug' => $value->slug]) }}" class="text-dark text-decoration-none">
                                                {{ $value->name }}
                                            </a>
                                        </h5>
                                        <p class="card-text blog-content-1 mb-3">
                                            {{ $value->short_description }}
                                        </p>
                                        <a href="{{ route('web.blog_details', ['slug' => $value->slug]) }}" class="btn btn-outline-green mt-auto">Read More</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                      

                    @endforeach
                </div>
                <div class="d-flex m-4 p-2 justify-content-center">
                    {{ $blogs->links() }}
                </div>
            </div>
            <div class="col-xl-3">
                <div class="sidebar">
                    <div class="sidebar__single sidebar__search wow animated fadeInUp" data-wow-delay="0.1s">
                        <form action="javascript:void(0);" class="sidebar__search-form">
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
                                            <h3><a href="javascriptvoid:(0);">{{ $value->name }}</a></h3>
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
@endif
@endsection