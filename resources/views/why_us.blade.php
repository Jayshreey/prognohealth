@extends('home')
@section('meta_tag')
<meta name="description" content="Get comprehensive guidance, effective solutions, and customized light recipes from Nexsel&#039;s expert team for optimal plant growth. Learn why Nexsel is the preferred choice for horticulture."/>
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $page_title }}" />
<meta property="og:description" content="Get comprehensive guidance, effective solutions, and customized light recipes from Nexsel&#039;s expert team for optimal plant growth. Learn why Nexsel is the preferred choice for horticulture." />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
<meta property="og:image" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:secure_url" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:width" content="180" />
<meta property="og:image:height" content="180" />
<meta property="og:image:alt" content="why nexsel" />
<meta property="og:image:type" content="image/png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $page_title }}" />
<meta name="twitter:description" content="Get comprehensive guidance, effective solutions, and customized light recipes from Nexsel&#039;s expert team for optimal plant growth. Learn why Nexsel is the preferred choice for horticulture." />
<meta name="twitter:image" content="{{ static_asset('images/favicon.png') }}" />
<meta name="twitter:label1" content="Time to read" />
<meta name="twitter:data1" content="1 minutes" />
@endsection
@section('content')
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/why_us-banner-5.webp') }})">
    </div>
    <div class="shape1">
        <img src="{{ static_asset('assets/home/images/shapes/testimonials-v3-shape2.png') }}" alt="about-img">
    </div>

    <div class="container">
        <div class="page-header__inner">
            <h2>Why us</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>-</span></li>
                <li>Why us</li>
            </ul>
        </div>
    </div>
</section>
<section class="about-two">
    <div class="about-two__bg why_us-bg-1" style="background-image: url({{ static_asset('assets/home/images/shapes/faq-v2-shape1.png') }});"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-two__img">
                    <img src="{{ static_asset('assets/home/images/about/nexsel-banner-2-768x604.jpg') }}" alt="why-nexsel">
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-two__content">
                    <div class="sec-title style2" style="padding-bottom: 0px;">
                        <div class="sec-title__tagline">
                            <div class="img-box"><img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" height="450px" alt="img">
                            </div>
                            <h6 class="text-theme-sd">Nexsel</h6>
                        </div>
                        <h2 class="sec-title__title">WHY Nexsel</h2>
                    </div>
                    <div class="about-two__content-text2">
                        <ul class="lh-lg">
                            <li>
                                <img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="img">
                                <span class="m-2">We have 8 years of experience in horticulture lighting.</span>
                            </li>
                            <li>
                                <img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="img">
                                <span class="m-2">22+ spectra in market for various applications.</span>
                            </li>
                            <li>
                                <img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="img">
                                <span class="m-2"> 100% Refund policy; if plants are not gown. (t&c apply)</span>
                            </li>
                            <li>
                                <img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="img">
                                <span class="m-2"> 100% Material Buy Back; If the project cancelled or postponed. (t&c apply)</span>
                            </li>
                            <li>
                                <img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="img">
                                <span class="m-2"> Market Presence - 13 Countries across in 4 Continents, 24 States and 6 UT in India.</span>
                            </li>
                            <li>
                                <img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="img">
                                <span class="m-2"> 10000 sq. ft testing facility, all our light recipes are tested and proven at our testing facility.</span>
                            </li>
                            <li>
                                <img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="img">
                                <span class="m-2"> We have technical collaboration with various agriculture institutes and universities for research work.</span>
                            </li>
                            <li>
                                <img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" alt="img">
                                <span class="m-2"> We have complete technical solution right design to installation. Seed to sell support.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-three why_us-sec3">
    <div class="about-two__bg why_us-bg-2" style="background-image: url({{ static_asset('assets/home/images/shapes/faq-v2-shape1.png') }});"></div>
    <div class="container">
        <div class="sec-title-three text-center">
            <h2 class="sec-title-three__title mb-4">Client Portfolio</h2>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="about-two__content-text2 text-start">
                    <ul class="lh-lg">
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">365 D farm, Pune</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">White root farm, Pune</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">UPL Limited</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Mahyco Grow</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Rise N shine Biotech</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Shree Biotech</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Barton Breeze, Noida</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Urban Farm, Mumbai</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Raw and Ruckus Mumbai</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Aquahyd, Delhi</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">We hydroponics</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">VASP Advisor, Mumbai</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Endless Green Tech Solutions</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Leafy Greens, Kolkata</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">ElaGreens</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 text-start">
                <img class="img-responsive" src="{{ static_asset('assets/home/images/about/client-portfolio.webp') }}" alt="client-portfolio">
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="about-two__content-text2 text-start">
                    <ul class="lh-lg">
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Techxellence Agrotech, Mumbai</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Greeban Fresh, Mumbai</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Globe Florex</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Green Farming Solution</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Shivalik Agro Engineers</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Green farming Solutions</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Infinity Green Farm, Hyderabad</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Sacred Farm LLP</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Orgafit, Ahmadabad</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Greentech India</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Zepto Greens</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Hydrilla, Bangalore</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">We Hydroponics</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Amdavadi Organic Farm</span>
                        </li>
                        <li>
                            <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                            <span class="why_us-portfolio-ft m-2">Global Hydroponics</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="testimonials-three why_us-sec4">
    <div class="about-two__bg why_us-bg-3" style="background-image: url({{ static_asset('assets/home/images/shapes/testimonials-v3-shape2.png') }});"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-7"></div>
            <div class="col-xl-5">
                <div class="about-two__content">
                    <div class="sec-title style2" style="padding-bottom: 0px;">
                        <div class="sec-title__tagline">
                            <div class="img-box"><img src="{{ static_asset('assets/home/images/resources/sec-title-img2.png') }}" height="450px" alt="img">
                            </div>
                            <h6 class="text-theme-sd">Nexsel</h6>
                        </div>
                        <h2 class="sec-title__title">Nexsel Has Supplied Lights To Following Location</h2>
                    </div>
                    <div class="about-two__content-text2">
                        <div class="row">
                            <div class="col-xl-6">
                                <ul class="lh-lg">
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Dubai, UAE</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Kuwait City</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location">Riyadh,Saudi Arabia</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Kuala Lumpur</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Mumbai</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Delhi</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Noida</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Jaipur</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Kolkata</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Hyderabad</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Goa</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Nagpur</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Bangalore</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Ahmadabad</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-6">
                                <ul class="lh-lg">
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Surat</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Vijayawada</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Amritsar</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location">Thiruvananthapuram</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Lucknow</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Bhopal</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Panaji</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Ranchi</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Chennai</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Dehradun</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Chandigarh</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Gandhinagar</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Srinagar</span>
                                    </li>
                                    <li>
                                        <img src="{{ static_asset('assets/home/images/resources/mapple-leaf.png') }}" alt="img">
                                        <span class="why_us-location m-2">Kolhapur</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection