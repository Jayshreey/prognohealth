@extends('home')
@section('meta_tag')
<meta name="description" content="{{ $product->seo_description }}"/>
<meta name="keywords" content="{{ $product->seo_keywords }}">
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $product->seo_title }}" />
<meta property="og:description" content="{{ $product->seo_description }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
@php $meta_key_words = explode(',',$product->seo_keywords) @endphp
@if(isset($meta_key_words) && !empty($meta_key_words))@foreach ($meta_key_words as $meta_key_word)
<meta property="article:tag" content="{{ $meta_key_word }}" />
@endforeach @endif
<meta property="og:updated_time" content="{{ $product->updated_at }}" />
<meta property="og:image" content="{{ uploads_url($product->image) }}" />
<meta property="og:image:secure_url" content="{{ uploads_url($product->image) }}" />
<meta property="og:image:width" content="1917" />
<meta property="og:image:height" content="1080" />
<meta property="og:image:alt" content="{{ $product->seo_title }}" />
<meta property="og:image:type" content="image/png" />
<meta property="article:published_time" content="{{ $product->created_at }}" />
<meta property="article:modified_time" content="{{ $product->updated_at }}" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $product->seo_title }}" />
<meta name="twitter:description" content="{{ $product->seo_description }}" />
<meta name="twitter:image" content="{{ uploads_url($product->image) }}" />
<meta name="twitter:label1" content="Written by" />
<meta name="twitter:data1" content="Team Nexsel" />
<meta name="twitter:label2" content="Time to read" />
<meta name="twitter:data2" content="2 minutes" />
@endsection
@section('content')
<section class="page-header gallery-header" style="background-image: url({{ static_asset('assets/home/images/backgrounds/slogan-v1-bg.png') }})">
    <div class="container">
        <div class="page-header__inner p-2 text-center">
            <h2>{{ isset($page_title) && $page_title!='' ? $page_title : 'Products' }}</h2>
        </div>
    </div>
</section>
@if(isset($product) && !empty($product))
<section class="testimonials-three testimonials-three--about pt-2" style="padding-bottom: 0px;background-image: url({{ static_asset('assets/home/images/shapes/why-choose-v1-shape1.png') }})">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 text-center">
                <img class="img-responsive product-img" src="{{ uploads_image($product->image) }}" alt="{{ $product->name }}" width="50%">
                <div class="card gallery-head-card m-4">
                @if(isset($product->product_details) && !empty($product->product_details))    <p class="gallery-content-1">{!! $product->product_details !!}</p>  @endif     
                </div>
            </div>
            <div class="col-12 col-sm-6 ">
                <div class="card gallery-head-card m-4 text-wrap">
                    <p class="gallery-content-1">{!! $product->about !!}</p>
                </div>
                <div class="btn-box ms-4"> @php $attac =  isset($product->attachments) && $product->attachments != '' ? json_decode($product->attachments) : array(); @endphp
                    @if(isset($attac) && !empty($attac))
                                        <a href="{{ uploads_url('files/'.$attac->name) }}" target="_blank" class="thm-btn rounded-0 m-2 btn-enquiry">
                                        Data sheet
                                        </a>
                    @endif     
                    <!-- <a href="javascript:void(0);" class="thm-btn rounded-0 m-2 btn-enquiry">Data sheet</a>
                    <a href="javascript:void(0);" class="thm-btn rounded-0 m-2 btn-enquiry">Data Sheet</a> -->
                    <a href="javascript:void(0);" class="thm-btn rounded-0 m-2 btn-enquiry">Get Quote</a>
                    <a href="javascript:void(0);" class="thm-btn rounded-0 m-2">Call Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
@php 
$sec_count = json_decode(isset($product->section_count) && $product->section_count!= '' ? $product->section_count : '')

@endphp
@if(isset($sec_count) && !empty($sec_count)) 
<section class="slogan-one mt-4 mb-0">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="slogan-one__inner">
                    <div class="shape1">
                        <img src="{{ static_asset('assets/home/images/shapes/slogan-v1-shape1.png') }}" alt="#">
                    </div>
                    <div class="slogan-one__bg"
                        style="background-image: url({{ static_asset('assets/home/images/backgrounds/slogan-v1-bg.png') }}); opacity: 0.1;">
                    </div>
                    <div class="container">
                        <ul class="counter-one__box">
                            @foreach ($sec_count as $sect)
                                <li class="counter-one__single">
                                    <div class="counter-one__single-inner">
                                        <div class="content-box">
                                            <h2 class="counter text-theme-sd" data-target="{{ $sect->count }}">0</h2>
                                            <!-- <h2 class="text-theme-sd">{{ $sect->count }}+</h2> -->
                                            <span class="text-theme-pm">{!! $sect->description !!}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@php 
$de_sec = json_decode(isset($product->section) && $product->section!= '' ? $product->section : '')

@endphp

@if(isset($de_sec) && !empty($de_sec)) 
<section class="services-one pt-2">
    <div class="container">
        @foreach ($de_sec as $dkey => $dvalue)
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card product-section m-2 p-4">
                        <h5 class="mb-2">{{  $dvalue->name }}</h5>
                        <p>{!! $dvalue->description !!}</p>
                    </div>
                </div>
            </div>

            {{-- Alternating layout only for image + features --}}
            @php $isEven = $loop->index % 2 === 0; @endphp
            <div class="container mb-4">
                <div class="row align-items-center">
                    @if ($isEven)
                    
                        {{-- Features Left, Image Right --}}
                        <div class="col-xl-8 col-lg-8 order-lg-1 order-2">
                            <div class="faq-one__accordion mt-0">
                                @if (!empty($dvalue->features) && is_array($dvalue->features))
                                    <ul class="accordion-box">
                                        @foreach ($dvalue->features as $key => $value)
                                            <li class="accordion block" style="box-shadow: 1px 1px 1px 1px #dfdfdf;">
                                                <div class="acc-btn">
                                                    <div class="icon-outer"><i class="icon-up-arrow"></i></div>
                                                    <h3>{{ $value->feature }}</h3>
                                                </div>
                                                <div class="acc-content border-0">
                                                    <p>{!! $value->description !!}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 order-lg-2 order-1">
                            @if (!empty($dvalue->images) && is_array($dvalue->images))
                                <div id="carousel_{{ $dkey }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($dvalue->images as $imgKey => $image)
                                            <div class="carousel-item {{ $imgKey === 0 ? 'active' : '' }}">
                                                <img src="{{ uploads_url($image) }}" class="d-block w-100" alt="Image {{ $imgKey + 1 }}">
                                            </div>
                                        @endforeach
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel_{{ $dkey }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel_{{ $dkey }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    @else
                      {{-- Image Left, Features Right --}}
                        
                        <div class="col-xl-4 col-lg-4">
                            @if (!empty($dvalue->images) && is_array($dvalue->images))
                                <div id="carousel_{{ $dkey }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($dvalue->images as $imgKey => $image)
                                            <div class="carousel-item {{ $imgKey === 0 ? 'active' : '' }}">
                                                <img src="{{ uploads_url($image) }}" class="d-block w-100" alt="Image {{ $imgKey + 1 }}">
                                            </div>
                                        @endforeach
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel_{{ $dkey }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel_{{ $dkey }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="faq-one__accordion mt-0">
                                @if (!empty($dvalue->features) && is_array($dvalue->features))
                                    <ul class="accordion-box">
                                        @foreach ($dvalue->features as $key => $value)
                                            <li class="accordion block" style="box-shadow: 1px 1px 1px 1px #dfdfdf;">
                                                <div class="acc-btn">
                                                    <div class="icon-outer"><i class="icon-up-arrow"></i></div>
                                                    <h3>{{ $value->feature }}</h3>
                                                </div>
                                                <div class="acc-content border-0">
                                                    <p>{!! $value->description !!}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif



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
                                <div class="features-one__single-inner rating-review pt-0 pb-0 d-flex flex-column justify-content-between" style="border: 1px solid grey; border-radius: 10px; min-height: 150px;">
                                    <div class="testimonilas-two__single client-testimonials d-flex flex-column justify-content-between h-100">
                                        <div class="testimonilas-two__single-bottom p-0 m-0">
                                            <div class="left-box">
                                             
                                                <div class="text-box">
                                                    <h3 class="text-black text-start"><strong>{{ $value->name }}</strong></h3>
                                                    <div class="rating-box text-start">
                                                        <ul>
                                                            @for ($i = 0; $i <= $value->rating; $i++)
                                                                <li><span class="icon-pointed-star"></span></li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="testimonilas-two__single-top">
                                            <p class="text-black text-start">
                                                {{ $value->description }}
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
<section class="blog-one pt-2">
    <div class="container">
        @php 
            $images = json_decode(isset($product->images) && $product->images!= '' ? $product->images : '')
        @endphp
        <div class="row">
            @if(isset($images) && !empty($images)) 
                @foreach ($images as $img)
                    <div class="col-12 col-sm-4">
                        <img class="img-thumbnail" src="{{ uploads_image($img) }}" alt="img" width="100%">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- <section class="blog-one pt-2">
    <div class="container">
        @php 
            $images = json_decode(isset($product->images) && $product->images!= '' ? $product->images : '')
        @endphp
        <div class="row">
            @if(isset($images) && !empty($images)) 
                @foreach ($images as $img)
                    <div class="col-12 col-sm-4">
                        <img class="img-thumbnail" src="{{ uploads_url($img) }}" alt="img" width="100%">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section> -->
@if(isset($related_products) && !empty($related_products)) 
<section>
    <div class="container">
        <div class="row">
            <h5 class="mb-3">Related Posts :</h5>
            <div class="col-xl-9">
                <div class="row">
                    @foreach ($related_products as $key => $value)
                        <div class="col-xl-4 col-md-4 col-12">
                            <a href="javascript:void(0);">
                                <div class="card blog-card-1">
                                    <div class="card-title">
                                        <img class="img-responsive lazy-image" src="{{ uploads_url($value->image) }}" style="width:100%; max-height: 250px" alt="{{ $value->name }}">
                                    </div>
                                    <div class="card-body m-2">
                                        <h3 class="blog-title-1 mb-2">{{ $value->name }}</h3>
                                        <p class="blog-content-1">{{ $value->short_description }}</p>
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
<!-- <section class="about-two">
    <div class="about-two__bg why_us-bg-1" style="background-image: url({{ static_asset('assets/home/images/shapes/faq-v2-shape1.png') }});"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__img">
                    <img src="{{ static_asset('assets/home/images/about/plant-research-page.webp') }}" alt="why-nexsel">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-two__content">
                    <div class="sec-title style2" style="padding-bottom: 0px;">
                        <h2 class="sec-title__title">Enquire Now</h2>
                    </div>
                    <div class="about-two__content-text2">
                        <form>
                            <div class="row g-3">
                              <div class="col-md-12">
                                <input type="text" class="form-control" id="your-name" name="your-name" placeholder="Your Name" required>
                              </div>
                              <div class="col-md-12">
                                <input type="email" class="form-control" id="your-email" name="your-email" placeholder="Your Email" required>
                              </div>
                              <div class="col-md-12">
                                <input type="text" class="form-control" id="your-phone" name="your-phone" placeholder="Your Phone">
                              </div>
                              <div class="col-12">
                                <textarea class="form-control" id="your-message" name="your-message" rows="5" placeholder="Write Message" required></textarea>
                              </div>
                              <div class="col-12">
                                <div class="row">
                                  <div class="col-md-6">
                                    <button data-res="" type="submit" class="btn btn-success w-50 fw-bold" >Submit</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
@endif
@endsection
