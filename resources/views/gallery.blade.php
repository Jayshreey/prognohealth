@extends('home')
@section('meta_tag')
<meta name="description" content="Explore our innovative horticulture projects and hydroponics projects for growing high-quality leafy vegetables. Enhance your agricultural practices with Nexsel Tech."/>
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
<link rel="canonical" href="{{ url()->current() }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Horticulture Projects and Hydroponics Projects by Nexsel Tech" />
<meta property="og:description" content="Explore our innovative horticulture projects and hydroponics projects for growing high-quality leafy vegetables. Enhance your agricultural practices with Nexsel Tech." />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:site_name" content="{{ app_setting('app_title') }}" />
<meta property="og:image" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:secure_url" content="{{ static_asset('images/favicon.png') }}" />
<meta property="og:image:width" content="180" />
<meta property="og:image:height" content="180" />
<meta property="og:image:alt" content="horticulture projects" />
<meta property="og:image:type" content="image/png" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Horticulture Projects and Hydroponics Projects by Nexsel Tech" />
<meta name="twitter:description" content="Explore our innovative horticulture projects and hydroponics projects for growing high-quality leafy vegetables. Enhance your agricultural practices with Nexsel Tech." />
<meta name="twitter:image" content="{{ static_asset('images/favicon.png') }}" />
<meta name="twitter:label1" content="Time to read" />
<meta name="twitter:data1" content="4 minutes" />
@endsection
@section('content')
@php $i = 0; @endphp
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ static_asset('assets/home/images/backgrounds/page-header-bg.jpg') }})">
    </div>
    <div class="shape1">
        <img src="{{ static_asset('assets/home/images/shapes/page-header-shape1.png') }}" alt="image">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <h2>{{ isset($page_title) && $page_title!='' ? $page_title : 'Gallery' }}</h2>
            <ul class="thm-breadcrumb">
                <li><a href="{{ route('web.home') }}">Home</a></li>
                <li><span>-</span></li>
                <li>{{ isset($page_title) && $page_title!='' ? $page_title : 'Gallery' }}</li>
            </ul>
        </div>
    </div>
</section>
<!-- @if(isset($gallery_category) && !@empty($gallery_category))
    @foreach ($gallery_category as $key => $value)
        @php 
            $i++;
            $gallery = DB::table('gallery')->where('gallery_category_id','=',$value->id)->where('is_active','=','1')->get()->toarray();
       
            @endphp
        @if(isset($gallery) && !empty($gallery))
            <section class="features-one @php $i>=2 ? 'pt-2' : ''  @endphp">
                <div class="features-one__bg"></div>
                <div class="sec-title text-center">
                    <div class="sec-title__tagline">
                        <span class="left"></span>
                        <h6>{{ $value->name }}</h6>
                        <p>Successfully cultivated over 30 varieties of leafy vegetables under Nexsel spectrum.</p>
                        <span class="right"></span>
                    </div>
                </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    @foreach ($gallery as $gkey => $gvalue)
                                        <div class="col-xl-4 col-md-4 col-12">
                                            <a href="{{ route('web.gallery_details',['slug'=>$gvalue->slug]) }}">
                                                <div class="card blog-card-1 gallery-card">
                                                    <div class="card-title p-2">
                                                        <img class="img-responsive lazy-image" src="{{ uploads_url($gvalue->image) }}" style="width:100%; max-height: 250px" alt="{{ $gvalue->name }}">
                                                    </div>
                                                    @php 
                                                        $features = json_decode(isset($gvalue->features) && $gvalue->features!= '' ? $gvalue->features : '')
                                                    @endphp
                                                    <div class="card-body gallery-content gallery-card">
                                                        <h2 class="mb-2">{{ $gvalue->name }}</h2>
                                                        @if(isset($features) && !empty($features)) 
                                                            @foreach ($features as $fkey => $fvalue)
                                                                <p class="gallery-content-1">{{ isset($fvalue->feature) && $fvalue->feature!='' ? $fvalue->feature : '' }} : <strong>{{ isset($fvalue->description) && $fvalue->description!='' ? $fvalue->description : '' }}</strong></p>
                                                            @endforeach
                                                        @endif
                                                        <button type="button" class="btn btn-success bg-theme-homeproduct mt-4">View More</button>
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
    @endforeach
@endif -->
@if(isset($gallery_category) && !@empty($gallery_category))
    @foreach ($gallery_category as $key => $value)
        @php 
            $i++;
            $gallery = DB::table('gallery')->where('gallery_category_id','=',$value->id)->where('is_active','=','1')->get()->toarray();
       
            @endphp
        @if(isset($gallery) && !empty($gallery))
            <section class="features-one @php $i>=2 ? 'pt-2' : ''  @endphp">
                <div class="features-one__bg"></div>
                <div class="sec-title text-center">
                    <div class="sec-title__tagline">
                        <span class="left"></span>
                        <h6>{{ $value->name }}</h6>
                        <p>Successfully cultivated over 30 varieties of leafy vegetables under Nexsel spectrum.</p>
                        <span class="right"></span>
                    </div>
                </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- <div class="row"> -->
                                <div class="row gallery-section" data-section="{{ $value->id }}">
                                        @foreach ($gallery as $gkey => $gvalue)
                                            <div class="col-xl-4 col-md-4 col-12 gallery-item-{{ $value->id }}" style="{{ $gkey > 5 ? 'display: none;' : '' }}">
                                                <a href="{{ route('web.gallery_details',['slug'=>$gvalue->slug]) }}">
                                                <div class="card blog-card-1 gallery-card h-100">
    <div class="card-title p-2">
        <img class="img-responsive lazy-image" src="{{ uploads_image($gvalue->image) }}" style="width:100%; max-height: 250px" alt="{{ $gvalue->name }}">
    </div>
    
    @php 
        $features = json_decode(isset($gvalue->features) && $gvalue->features != '' ? $gvalue->features : '')
    @endphp
    
    <div class="card-body gallery-content d-flex flex-column justify-content-between">
        <div>
            <h2 class="mb-2">{{ $gvalue->name }}</h2>
            @if(isset($features) && !empty($features)) 
                @foreach ($features as $fkey => $fvalue)
                    <p class="gallery-content-1">
                        {{ isset($fvalue->feature) ? $fvalue->feature : '' }} :
                        <strong>{{ isset($fvalue->description) ? $fvalue->description : '' }}</strong>
                    </p>
                @endforeach
            @endif
        </div>

        <div class="mt-auto text-center">
            <button type="button" class="btn btn-success bg-theme-homeproduct mt-4">View More</button>
        </div>
    </div>
</div>

                                                </a>
                                            </div>
                                        @endforeach

                                        @if(count($gallery) > 6)
                                            <div class="col-12 text-center mt-4">
                                                <button class="btn btn-success load-more-btn" data-target="{{ $value->id }}">Load More</button>
                                            </div>
                                        @endif
                                </div>


                                  
                                <!--</div> -->
                            </div>
                        </div>
                    </div>
            </section>
        @endif
    @endforeach
@endif 
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ITEMS_TO_SHOW = 6;

        document.querySelectorAll('.load-more-btn').forEach(button => {
            button.addEventListener('click', function () {
                let sectionId = this.dataset.target;
                let hiddenItems = document.querySelectorAll(`.gallery-item-${sectionId}[style*="display: none"]`);
                
                for (let i = 0; i < ITEMS_TO_SHOW && i < hiddenItems.length; i++) {
                    hiddenItems[i].style.display = 'block';
                }

                // Hide button if no more items to load
                if (document.querySelectorAll(`.gallery-item-${sectionId}[style*="display: none"]`).length === 0) {
                    this.style.display = 'none';
                }
            });
        });
    });
</script>
