@extends('home')
@section('content')
@if(isset($slider) && !empty($slider))
<section class="main-slider main-slider-three">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true, "effect": "fade", "autoplay": { "delay": 5000 }}'>
        <div class="swiper-wrapper">
            @foreach($slider as $key => $value)
                <div class="swiper-slide">
                    <div class="image-layer" style="background-image:url({{ uploads_url($value->image) }})"></div>
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/slider-v3-shape1.png') }}" alt="img"></div>
                    <div class="container">
                        <div class="main-slider-three__content">
                            <div class="title">
                                <h2>{{ translate($value->name) }}</h2>
                            </div>

                            <div class="text">
                                <p>There are many variations of passage available the major <br> suffered alteration</p>
                            </div>
                            <div class="btn-box">
                                <a class="thm-btn" href="{{ route('web.contact_us') }}">
                                    <span class="txt">Contact Us</span>
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
<section class="about-two">
    <div class="about-two__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/about-v2-bg.png') }});"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__img">
                    <div class="about-two__img1">
                        <img src="{{ static_asset('assets/home/images/about/about-v2-img1.webp') }}" alt="#">
                    </div>
                    <div class="about-two__img2 wow zoomIn" data-wow-delay="100ms" data-wow-duration="3500ms">
                        <img src="{{ static_asset('assets/home/images/about/about-v2-img2.webp') }}" alt="#">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-two__content">
                    <div class="sec-title style2">
                        <div class="sec-title__tagline">
                            <div class="img-box"><img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="#">
                            </div>
                            <h6 class="text-theme-sd">About Nexsel</h6>
                        </div>
                        <h2 class="sec-title__title">Manufactures And Solution <br> Provider Of Horticulture <br> Lights</h2>
                    </div>

                    <div class="about-two__content-text1">
                        <p>Nexsel is a research-driven horticultural lighting manufacturer that provides LED grow lights for biotech and horticulture purposes.</p>
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
                        <p>Founded in 2017 in Pune, India, they focus on plant biology research to create optimal spectra for plant development using advanced technology and a 4-step spectra development process. We offer support to customers from seedling to selling.</p>
                    </div>
                    <div class="btn-box mt-4">
                        <a class="thm-btn" href="{{ route('web.contact_us')}}">
                            <span class="txt">Read More</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services-two bg-theme-homeproduct">
    <div class="shape1 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms"><img
            class="float-bob-y" src="{{ static_asset('assets/home/images/shapes/services-v2-shape3.png') }}" alt="shape3"></div>
    <div class="shape2 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img
            class="float-bob-y" src="{{ static_asset('assets/home/images/shapes/services-v2-shape4.png') }}" alt="shape4"></div>
    <div class="container">
        <div class="sec-title style2 text-center">
            <div class="sec-title__tagline center"></div>
            <h2 class="sec-title__title mb-4">Our Products</h2>
        </div>
        <div class="row mt-4">
            <div class="col-xl-6 col-lg-6">
                <img class="img-fit mt-4" src="{{ static_asset('assets/home/images/about/about-us-2.webp') }}" alt="product-img">
            </div>
            <div class="col-xl-6 col-lg-6 lh-lg" >
                <p class="text-white">
                    We are a leading company with a complete range of horticulture lighting products that are designed and tested in our <strong> state-of-the-art 2000 sq. ft in-house plant research facility.</strong>
                </p>
                <p class="text-white">
                    Our unique <strong> 4-step spectrum development process,</strong> which utilizes AI-based applications, ensures superior quality products.
                </p>   
                <p class="text-white">
                    We offer a generous <strong> warranty of up to 60 months </strong> on each product, and our products are <strong> BIS, CE, and RoHS certified.</strong>
                </p>
                <p class="text-white">
                    To ensure timely replacements during the warranty period, we maintain a <strong> 1% extra stock.</strong>
                </p>
                <p class="text-white">
                    Our manufacturing processes strictly adhere to <strong> industry-standard design rules,</strong> ensuring consistently high-quality products.
                </p>
                <p class="text-white">
                    Additionally, our unique service offering includes a <strong> 7-step follow-up after dispatch </strong> make us different from others.
                </p>
            </div>
        </div>
        @if(isset($product) && !empty($product))
            <div class="row mt-4">
                @foreach ($product as $key => $value)
                    <div class="col-xl-4 col-lg-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="services-two__single">
                            <div class="services-two__single-inner">
                                <div class="services-two__single-img">
                                    <div class="inner">
                                        <img class="img-fit" src="{{ uploads_url($value->image) }}" alt="{{ $value->name }}">
                                    </div>
                                </div>
                                <div class="services-two__single-content">
                                    <h2><a href="{{ route('web.product') }}">{{ $value->name }}</a></h2>
                                    <p>{{ $value->short_description }}</p>
                                    <a href="{{ route('web.product') }}" type="btn" class="btn btn-sm main-heade-buttons text-white">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
<section class="slogan-one mt-4 mb-0">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="slogan-one__inner">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/slogan-v1-shape1.png') }}" alt="#"></div>
                    <div class="slogan-one__bg"
                        style="background-image: url({{ static_asset('assets/home/images/backgrounds/slogan-v1-bg.png') }}); opacity: 0.1;">
                    </div>
                    <div class="container">
                        <ul class="counter-one__box">
                            <li class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="content-box">
                                        <h2 class="text-theme-sd">2,058</h2>
                                        <span class="text-theme-pm">Customer<br>Served</span>
                                    </div>
                                </div>
                            </li>
                            <li class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="content-box">
                                        <h2 class="text-theme-sd">16</h2>
                                        <span class="text-theme-pm">Country Market <br> Presence</span>
                                    </div>
                                </div>
                            </li>
                            <li class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="content-box">
                                        <h2 class="text-theme-sd">68</h2>
                                        <span class="text-theme-pm">Spectrum <br> Tested</span>
                                    </div>
                                </div>
                            </li>
                            <li class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="content-box">
                                        <h2 class="text-theme-sd">16</h2>
                                        <span class="text-theme-pm">Sub <br> Divisions</span>
                                    </div>
                                </div>
                            </li>
                            <li class="counter-one__single">
                                <div class="counter-one__single-inner">
                                    <div class="content-box">
                                        <h2 class="text-theme-sd">10,000</h2>
                                        <span class="text-theme-pm">Sq. Ft Research <br> Facility</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (isset($testimonials) && !empty($testimonials))
<section class="features-one testimonilas-custom-bg">
    <div class="features-one__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/features-v1-bg.png') }});">
    </div>
    <div class="sec-title-three text-center">
        <h1 class="sec-title-three__title mb-4">Reviews & Ratings</h1>
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
                            "smartSpeed": 1000,
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
                                        "items": 2
                                    },
                                    "1200": {
                                        "items": 2
                                    }
                                }
                            }'>
                        @foreach ($testimonials as $key => $value)
                            <div class="features-one__single text-center">
                                <div class="features-one__single-inner rating-review pt-0 pb-0">
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
                                                            <li>
                                                                <span class="icon-pointed-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="icon-pointed-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="icon-pointed-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="icon-pointed-star"></span>
                                                            </li>
                                                            <li>
                                                                <span class="icon-pointed-star"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <p class="text-black text-start">{{ $value->position }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonilas-two__single-top">
                                            <p class="text-black text-start">“ There are many variations of passages of available at
                                                but the majority have suffered alteration in some atlok
                                                form, by injected randomised words which koiu layio
                                                don’t look even slightly believable avialabalo ore a do
                                                psum is a simply to free dumy to text the pricing.”</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="services-one">
    <div class="container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title">Clients Testimonials</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="projects-three-brand">
                    <div class="auto-container">
                        <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 3, "autoplay": { "delay": 5000 }, "breakpoints": {
                                        "0": {
                                            "spaceBetween": 30,
                                            "slidesPerView": 1
                                        },
                                        "375": {
                                            "spaceBetween": 30,
                                            "slidesPerView": 1
                                        },
                                        "575": {
                                            "spaceBetween": 30,
                                            "slidesPerView": 2
                                        },
                                        "768": {
                                            "spaceBetween": 30,
                                            "slidesPerView": 3
                                        },
                                        "992": {
                                            "spaceBetween": 30,
                                            "slidesPerView": 3
                                        },
                                        "1200": {
                                            "spaceBetween": 30,
                                            "slidesPerView": 3
                                        }
                                    }}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ static_asset('assets/home/images/brand/brand-v1-img1.png') }}" alt="#">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if (isset($client) && !empty($client))
<section class="features-one our-client">
    <div class="sec-title-three text-center">
        <h1 class="sec-title-three__title mb-4 text-white">Our Clients</h1>
    </div>
    <div class="container pt-2">
        <div class="row">
            <div class="col-xl-12">
                <div class="features-one__inner">
                    <div class="owl-carousel owl-theme thm-owl__carousel features-one__carousel"
                        data-owl-options='{
                            "loop": true,
                            "autoplay": true,
                            "margin": 10,
                            "nav": false,
                            "dots": true,
                            "smartSpeed": 1000,
                            "autoplayTimeout": 10000,
                            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                            "responsive": {
                                    "0": {
                                        "items": 1
                                    },
                                    "768": {
                                        "items": 3
                                    },
                                    "992": {
                                        "items": 4
                                    },
                                    "1200": {
                                        "items": 5
                                    }
                                }
                            }'>
                        @foreach ($client as $key => $value)
                        <div class="features-one__single text-center">
                            <img src="{{ uploads_url($value->image) }}" alt="{{ $value->name }}">
                        </div>
                        @endforeach
                    </div>
                    <div class="owl-dots"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<section class="services-one">
    <div class="features-one__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/features-v1-bg.png') }});">
    </div>
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title">Why Choose Us</h2>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms"
                data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="#">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="#">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="#">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/wh-1.webp') }}" alt="#">
                    </div>
                    <div class="services-one__single-content text-center">
                        <h2><a href="arbor-management.html">2000 sq. ft plant <br> testing facility</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms"
                data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="#">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="#">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="#">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/wh-2.webp') }}" alt="#">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="arbor-management.html">Market presence in 4 continents, 11+ countries and 24 states in India.</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms"
                data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="#">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="#">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="#">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/wh-3.webp') }}" alt="#">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="arbor-management.html">4 steps spectra development process using AI</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="100ms"
                data-wow-duration="1000ms">
                <div class="services-one__single">
                    <div class="shape1"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape2.png') }}" alt="#">
                    </div>
                    <div class="shape2"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape3.png') }}" alt="#">
                    </div>
                    <div class="shape3"><img src="{{ static_asset('assets/home/images/shapes/services-v1-shape4.png') }}" alt="#">
                    </div>
                    <div class="services-one__single-img">
                        <div class="services-one__single-img-bg"
                            style="background-image: url({{ static_asset('assets/home/images/shapes/services-v1-shape1.png') }});"></div>
                        <div class="overlay-icon">
                            <div class="icon-box">
                                <span class="icon-gardening-1"></span>
                            </div>
                        </div>
                        <img src="{{ static_asset('assets/home/images/services/wh-4.webp') }}" alt="#">
                    </div>

                    <div class="services-one__single-content text-center">
                        <h2><a href="arbor-management.html">7 steps-follow after dispatch</a></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-box text-center">
            <a class="thm-btn" href="{{ route('web.why_us') }}">
                <span class="txt">Read more</span>
            </a>
        </div>
    </div>
</section>
@if (isset($certificate) && !empty($certificate))
<section class="services-one about_vm-bg">
    <div class="auto-container about_vm-container">
        <div class="sec-title text-center">
            <h2 class="sec-title__title text-white">Certificates</h2>
        </div>
        <div class="row">
            @foreach ($certificate as $key => $value)
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <img class="img" src="{{ uploads_url($value->image) }}" width="100%">
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
<section class="about-two">
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
</section>
@endsection