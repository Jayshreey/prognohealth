
@extends('home')
@section('meta_tag')
<meta name="description" content="Delve into the fascinating world of horticulture science with our insightful blog. Discover cutting-edge research and gardening tips to cultivate your knowledge today."/>
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $page_title }}" />
<meta property="og:description" content="Delve into the fascinating world of horticulture science with our insightful blog. Discover cutting-edge research and gardening tips to cultivate your knowledge today." />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
<meta property="og:image" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:secure_url" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:width" content="180" />
<meta property="og:image:height" content="180" />
<meta property="og:image:alt" content="india Horticulture Science" />
<meta property="og:image:type" content="image/png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $page_title }}" />
<meta name="twitter:description" content="Delve into the fascinating world of horticulture science with our insightful blog. Discover cutting-edge research and gardening tips to cultivate your knowledge today." />
<meta name="twitter:image" content="{{ static_asset('images/favicon.png') }}" />
<meta name="twitter:label1" content="Time to read" />
<meta name="twitter:data1" content="Less than a minute" />
<style>
    .blog-card-img {
    width: 100%;
    height: 250px;
    object-fit: cover; /* Ensures image covers the area without distortion */
    border-top-left-radius: 0.5rem; /* Optional: matches card style */
    border-top-right-radius: 0.5rem;
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
            <h2>Horticulture Science</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>-</span></li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
</section>
@if(isset($blogs) && !empty($blogs))
<section class="blog-details pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9">
                <div class="row">
                    @foreach ($blogs as $key => $value)
                        <div class="col-xl-4 col-md-4 col-12">
                            <a href="{{ route('web.blog_details',['slug'=>$value->slug]) }}">
                                <div class="card blog-card-1">
                                    <div class="card-title">
                                    <img class="img-responsive lazy-image blog-card-img" src="{{ uploads_image($value->image) }}" alt="{{ $value->name }}">
                                    </div>
                                    <div class="card-body m-2">
                                        <h3 class="blog-title-1 mb-2">{{ $value->name }}</h3>
                                        <p class="blog-content-1">{{ $value->short_description }}</p>
                                    </div>
                                    <div class="card-footer blog-ft-1">
                                        {{ $value->created_at }}
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
                                            <img src="{{ uploads_image($value->image) }}" alt="{{ $value->name }}">
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
@endif
@endsection