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
    <div class="page-header__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/page-header-bg.jpg') }})">
    </div>
    <div class="shape1">
        <img src="{{ static_asset('assets/home/images/shapes/page-header-shape1.png') }}" alt="#">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Contact Us</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>-</span></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</section>
<section class="about-two pb-2" style="background-color: #F7F7F7">
    <div class="about-two__bg why_us-bg-1"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__content">
                    <div class="sec-title style2" style="padding-bottom: 0px;">
                        <h2 class="sec-title__title">Enquire Now</h2>
                    </div>
                    <div class="about-two__content-text2">
                        <form action="{{ route('web.new_enquiry') }}" class="data-parsley-validate" method="post" data-block_form="true">
                            <div class="row g-3">
                                <div class="col-md-12">
                                  <input type="text" class="form-control" name="name" placeholder="{{ translate('Name') }}" required>
                                </div>
                                <div class="col-md-12">
                                  <input type="email" class="form-control"  name="email_id" placeholder="{{ translate('Email') }}" required="">
                                </div>
                                <div class="col-md-12">
                                  <input type="text" class="form-control" name="contact_number" placeholder="{{ translate('Phone') }}" autocomplete="off" required="">
                                </div>
                                <div class="col-12">
                                  <textarea class="form-control" name="message" rows="5" placeholder="{{ translate('Message') }}" required></textarea>
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
            <div class="col-xl-6">
                <div class="about-two__img">
                    <img class="img-responsive" src="{{ static_asset('assets/home/images/about/vertcle_green_wall.jpg') }}" alt="contact-us">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-page-bottom mt-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="contact-page-bottom__content">
                    <div class="sec-title">
                        <div class="sec-title__tagline">
                            <h6>Head Office And Manufacturing Unit</h6>
                            <span class="right"></span>
                        </div>
                        <h2 class="sec-title__title">Nexsel Tech Pvt Ltd</h2>
                    </div>
                    <div class="contact-page-bottom__content-img">
                        <img src="{{ static_asset('assets/home/images/resources/contact-page-bottom-img.jpg') }}" alt="image">
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <div class="inner">
                                        <div class="icon-box">
                                            <span class="icon-phone-call-1"></span>
                                        </div>
                                        <div class="content-box">
                                            <p> Tel : <a href="tel:+91 8604486047">+91 8604486047</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon-box">
                                            <span class="icon-placeholder"></span>
                                        </div>
                                        <div class="content-box">
                                            <p>Add : Chaitnya Industrial Estate,<br>
                                                On Narhe Road Narhe 411 041,
                                                Pune MH India</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="contact-page-bottom-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d484438.9013546238!2d73.821796!3d18.452882!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2953e8eeb2b13%3A0x4cd0cbffbb4d87d6!2sChaitanya%20Industrial!5e0!3m2!1sen!2sus!4v1719835698720!5m2!1sen!2sus" width="100%" height="680" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-6">
                <div class="contact-page-bottom-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d484765.72216881334!2d73.875937!3d18.336688!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2ed1eb102c105%3A0xf65c6ab75242ab79!2s8VPG%2BM9%2C%20Kasurdi%2C%20Maharashtra%20412205%2C%20India!5e0!3m2!1sen!2sus!4v1719835435255!5m2!1sen!2sus" width="100%" height="680" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="contact-page-bottom__content">
                    <div class="sec-title">
                        <div class="sec-title__tagline">
                            <h6>Research Centre</h6>
                            <span class="right"></span>
                        </div>
                        <h2 class="sec-title__title">Nexsel Research Centre</h2>
                    </div>
                    <div class="contact-page-bottom__content-img">
                        <img src="{{ static_asset('assets/home/images/resources/contact-page-bottom-img.jpg') }}" alt="image">
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <div class="inner">
                                        <div class="icon-box">
                                            <span class="icon-phone-call-1"></span>
                                        </div>
                                        <div class="content-box">
                                            <p> Tel : <a href="tel:+91 9881798822">+91 9881798822</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon-box">
                                            <span class="icon-placeholder"></span>
                                        </div>
                                        <div class="content-box">
                                            <p>Add : Kasurdi Village, Khed Shivapur Pune MH, India</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-6">
                <div class="contact-page-bottom__content">
                    <div class="sec-title">
                        <div class="sec-title__tagline">
                            <h6>Head Office And Manufacturing Unit</h6>
                            <span class="right"></span>
                        </div>
                        <h2 class="sec-title__title">Nexsel Tech Pvt Ltd</h2>
                    </div>
                    <div class="contact-page-bottom__content-img">
                        <img src="{{ static_asset('assets/home/images/resources/contact-page-bottom-img.jpg') }}" alt="image">
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <div class="inner">
                                        <div class="icon-box">
                                            <span class="icon-phone-call-1"></span>
                                        </div>
                                        <div class="content-box">
                                            <p> Tel : <a href="tel:+971 52 254 7216">+971 52 254 7216</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon-box">
                                            <span class="icon-phone-call-1"></span>
                                        </div>
                                        <div class="content-box">
                                            <p> Tel : <a href="tel:+971 56 134 8331">+971 56 134 8331</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon-box">
                                            <span class="icon-placeholder"></span>
                                        </div>
                                        <div class="content-box">
                                            <p>Add : Block B-215 - Jumeirah 1 -<br>
                                                Dubai - United Arab Emirates</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="contact-page-bottom-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d462130.0076788939!2d55.237168!3d25.190044!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f4244dde67821%3A0x2a9b18ce766874cf!2sJumeirah%20-%20Jumeirah%201%20-%20Dubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sus!4v1719835922151!5m2!1sen!2sus" width="100%" height="680" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-6">
                <div class="contact-page-bottom-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d370175.1888506943!2d172.594124!3d-43.544174!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d318a9b2b9f6c13%3A0x953dcf8c17621629!2s2%2F2%20Birmingham%20Drive%2C%20Middleton%2C%20Christchurch%208024%2C%20New%20Zealand!5e0!3m2!1sen!2sus!4v1719836036425!5m2!1sen!2sus" width="100%" height="680" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="contact-page-bottom__content">
                    <div class="sec-title">
                        <div class="sec-title__tagline">
                            <h6>Research Centre</h6>
                            <span class="right"></span>
                        </div>
                        <h2 class="sec-title__title">Nexsel Research Centre</h2>
                    </div>
                    <div class="contact-page-bottom__content-img">
                        <img src="{{ static_asset('assets/home/images/resources/contact-page-bottom-img.jpg') }}" alt="image">
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <div class="inner">
                                        <div class="icon-box">
                                            <span class="icon-phone-call-1"></span>
                                        </div>
                                        <div class="content-box">
                                            <p> Tel : <a href="tel:+64 210 255 2444">+64 210 255 2444</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="inner">
                                        <div class="icon-box">
                                            <span class="icon-placeholder"></span>
                                        </div>
                                        <div class="content-box">
                                            <p>Add : 2/2 Birmingham Drive, Middleton,<br>
                                                Christchurch 8024, New Zealand.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection