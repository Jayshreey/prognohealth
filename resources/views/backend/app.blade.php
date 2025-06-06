<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{ getBaseURL() }}">
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<?php /*if(app_setting('seo_author')!=''){ ?>
            <meta name="author" content="<?php echo app_setting('seo_author'); ?>">
        <?php } ?>
        <?php if(app_setting('seo_visit_after')!=''){ ?>
            <meta name="revisit-after" content="<?php echo app_setting('seo_visit_after'); ?> days">
        <?php } ?>
        <?php if(app_setting('seo_description')!=''){ ?>
            <meta name="description" content="<?php echo app_setting('seo_description'); ?>">
        <?php } ?>
        <?php if(app_setting('seo_keywords')!=''){ ?>
            <meta name="keywords" content="<?php echo $this->seo_keywords; ?>">
        <?php }*/ ?>
		<link rel="icon" href="{{ static_asset('images/favicon.png') }}" type="image/x-icon"/>
		<title>@yield('page_title', translate('System')) - {{ app_setting('app_title') }} {{ app_setting('seo_title')!='' ? ' | '.app_setting('seo_title') : '' }}</title>
		<style>
            @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap");
            :root {
                --primary-bg-color: #512d56;
                --primary-bg-hover: #7c59e6;
                --primary-bg-border: #8c68f8;
                --dark-primary-hover: #233ac5;
                --primary-transparentcolor: #eaedf7;
                --darkprimary-transparentcolor: #2b356e;
                --transparentprimary-transparentcolor: rgba(255, 255, 255, 0.05);
            }
			
        </style>
        @if(app_setting("app_rtl","off") == 'on')
            <link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/bootstrap/css/bootstrap.rtl.min.css') }}">
        @else
            <link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/bootstrap/css/bootstrap.min.css') }}">
        @endif
        <link rel="stylesheet" href="{{ static_asset('assets/backend/css/icons.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/backend/css/style.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/backend/css/skins.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/backend/css/dark-style.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/backend/css/boxed.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/magnific/magnific.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/fancybox/fancybox.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/fancybox/panzoom.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/notify/css/notify.css') }}">
        <link rel="stylesheet" href="{{ static_asset('assets/backend/plugins/parsley/parsley.css') }}">
        @yield('style_files')
        <link rel="stylesheet" href="{{ static_asset('assets/backend/css/custom.css') }}">
        
        <script type="text/javascript" src="{{ static_asset('assets/backend/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ static_asset('assets/backend/plugins/bootstrap/popper.min.js') }}"></script>
		<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/sidemenu/sidemenu.js') }}"></script>
        <script type="text/javascript" src="{{ static_asset('assets/backend/plugins/notify/js/notify.min.js') }}"></script>
		<script type="text/javascript" src="{{ static_asset('assets/backend/plugins/parsley/parsley.min.js') }}"></script>
        <script type="text/javascript" src="{{ static_asset('assets/backend/js/sticky.js') }}"></script>
        <script type="text/javascript" src="{{ static_asset('assets/backend/plugins/magnific/magnific.min.js') }}"></script>
        <script type="text/javascript" src="{{ static_asset('assets/backend/plugins/fancybox/fancybox.umd.js') }}"></script>
        <script type="text/javascript" src="{{ static_asset('assets/backend/plugins/sweet-alert/sweetalert.min.js') }}"></script>
        <script type="text/javascript" src="{{ static_asset('assets/backend/plugins/select2/select2.min.js') }}"></script>
        <script type="text/javascript" src="{{ static_asset('assets/backend/js/custom.js') }}"></script>
        @yield('script_files')
		<script type="text/javascript" src="{{ static_asset('assets/backend/js/external.js') }}"></script>
        <?php /*if(app_setting('google_analytics_id')!=''){ ?>
	        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo app_setting('google_analytics_id') ?>"></script>
	        <script>
	            window.dataLayer = window.dataLayer || [];
	            function gtag() {
	                dataLayer.push(arguments);
	            }
	            gtag('js', new Date());
	            gtag('config', "<?php echo app_setting('google_analytics_id') ?>");
	        </script>
	    <?php } ?>
	    <?php if(app_setting('facebook_pixel_id')!=''){ ?>
	        <script>
	            !function(f,b,e,v,n,t,s)
	            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	            n.queue=[];t=b.createElement(e);t.async=!0;
	            t.src=v;s=b.getElementsByTagName(e)[0];
	            s.parentNode.insertBefore(t,s)}(window, document,'script',
	            'https://connect.facebook.net/en_US/fbevents.js');
	            fbq('init', '<?php echo app_setting('facebook_pixel_id') ?>');
	            fbq('track', 'PageView');
	        </script>
	        <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo app_setting('facebook_pixel_id') ?>&ev=PageView&noscript=1"/></noscript>
	    <?php } ?>
	    <?php if(!empty(json_decode(app_setting('seo_noscript')))){ ?>
	        <noscript>
	            <?php foreach (json_decode(app_setting('seo_noscript')) as $key => $value) { ?>
	            <h1><?php echo $value; ?></h1>
	        <?php } ?>
	        </noscript>
	    <?php }*/ ?>
	</head>
    @php
        $rtl = app_setting("app_rtl") == "on" ? 'rtl' : 'ltr';
        $layout = app_setting("app_layout") == "boxed" ? 'layout-boxed' : 'ltr';
    @endphp
	<body class="main-body {{ $rtl }} {{ $layout }} login-img">
		<div id="global-loader">
			<img src="<?php echo uploads_url('loader.gif'); ?>" class="loader-img" alt="{{ translate('loader') }}">
		</div>
        <div class="page">
			<div class="main-header side-header sticky">
				<div class="container-fluid main-container">
					<div class="main-header-left sidemenu">
						<a class="main-header-menu-icon" href="" id="mainSidebarToggle"><span></span></a>
					</div>
					<a class="main-header-menu-icon  horizontal d-lg-none" href="" id="mainNavShow"><span></span></a>
					<div class="main-header-left horizontal">
						<a class="main-logo" href="{{ getBaseURL() }}">
							<img src="{{ static_asset('images/logo.png') }}" class="header-brand-img desktop-logo" alt="{{ app_setting('app_title') }}">
							<img src="{{ static_asset('images/logo.png') }}" class="header-brand-img desktop-logo theme-logo" alt="{{ app_setting('app_title') }}">
						</a>
					</div>
					<div class="main-header-right">
						<button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fe fe-more-vertical "></span>
						</button>
						<div class="navbar navbar-expand-lg navbar-collapse responsive-navbar p-0">
							<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
								<ul class="nav nav-item header-icons navbar-nav-right ms-auto">
									<div class="dropdown  d-flex">
										<a class="nav-link icon theme-layout nav-link-bg layout-setting">
											<span class="dark-layout"><i class="fe fe-moon"></i></span>
											<span class="light-layout"><i class="fe fe-sun"></i></span>
										</a>
									</div>
                                    <li>
										<a class="nav-link icon" href="{{ route('admin.clear_cache') }}">
											<i class="fa fa-hdd-o"></i>
										</a>
									</li>
									<li class="dropdown main-profile-menu">
										<a class="main-img-user" href=""><img alt="<?php //echo user_setting('user_name'); ?>" src="{{ static_asset('images/profile/default.png') }}"></a>
										<div class="dropdown-menu">
											<div class="header-navheading">
												<h6 class="main-notification-title">{{ session('username') }}</h6>
												<p class="main-notification-text"><?php //echo user_setting('role_name'); ?></p>
											</div>
											<a class="dropdown-item border-top" href="{{ route('admin.profile.basic') }}">
						                        <i class="fe fe-user"></i> {{ translate('Profile & Account Settings') }}
						                    </a>
						                    <a class="dropdown-item border-top popup-page" href="<?php //echo admin_site_url('profile/page/change-password'); ?>">
						                        <i class="fe fe-lock"></i> {{ translate('Change Password') }}
						                    </a>
						                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
						                        <i class="fe fe-power"></i> {{ translate('Log Out') }}
						                    </a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-sidebar main-sidemenu main-sidebar-sticky side-menu">
				<div class="sidemenu-logo">
					<a class="main-logo" href="{{ route('admin.dashboard') }}">
						<img src="{{ static_asset('images/logo.png') }}" class="header-brand-img desktop-logo" alt="{{ app_setting('app_title') }}">
						<img src="{{ static_asset('images/favicon.png') }}" class="header-brand-img icon-logo" alt="{{ app_setting('app_title') }}">
						<img src="<?php //echo uploads_url('logo-light.png') ?>" class="header-brand-img desktop-logo theme-logo" alt="<?php echo app_setting('app_title'); ?>">
						<img src="{{ static_asset('images/favicon.png') }}" class="header-brand-img icon-logo theme-logo" alt="{{ app_setting('app_title') }}">
					</a>
				</div>
				<div class="main-sidebar-body">
					<div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
						fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
						<path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
					</svg></div>
					<ul class="nav hor-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fe fe-airplay"></i><span class="sidemenu-label">{{ translate('dashboard') }}</span></a>
						</li>
						@php
							$permissions = customer_setting('permissions');
							
							$menu = array();
							$menu['admin.blog_category'] = ['name' => 'Blogs Category', 'icon' => 'fa fa-list'];
							$menu['admin.blog'] = ['name' => 'Blog', 'icon' => 'fa fa-newspaper-o'];
							$menu['admin.faq_category'] = ['name' => 'Faq Category', 'icon' => 'fa fa-list-ul'];
							$menu['admin.faq'] = ['name' => 'Faq', 'icon' => 'fa fa-question-circle'];
							$menu['admin.slider'] = ['name' => 'Slider', 'icon' => 'fa fa-sliders'];
							$menu['admin.category'] = ['name' => 'Category', 'icon' => 'fa fa-list'];
							$menu['admin.gallery_category'] = ['name' => 'Gallery Category', 'icon' => 'fa fa-file-image-o'];
							$menu['admin.gallery'] = ['name' => 'Gallery', 'icon' => 'fa fa-calendar'];
							$menu['admin.tool'] = ['name' => 'Tool', 'icon' => 'fa fa-wrench'];
							// $menu['admin.gallery_type'] = ['name' => 'Gallery Type', 'icon' => 'fa fa-calendar'];
							$menu['admin.product'] = ['name' => 'Product', 'icon' => 'fa fa-cube'];
							$menu['admin.client'] = ['name' => 'Client', 'icon' => 'fa fa-user-circle-o'];
							$menu['admin.team'] = ['name' => 'Team', 'icon' => 'fa fa-user'];
							$menu['admin.certification'] = ['name' => 'Certification', 'icon' => 'fa fa-certificate'];
							$menu['admin.role'] = ['name' => 'Role', 'icon' => 'fa fa-key'];
							$menu['admin.filemanager'] = ['name' => 'Filemanager', 'icon' => 'fa fa-folder-open'];
							$menu['admin.testimonial_category'] = ['name' => 'Testimonial Category', 'icon' => 'fa fa-th-list'];
							$menu['admin.testimonials'] = ['name' => 'Testimonials', 'icon' => 'fa fa-tags'];
							$menu['admin.review_category'] = ['name' => 'Review Category', 'icon' => 'fa fa-list-ul'];
							$menu['admin.review'] = ['name' => 'Review', 'icon' => 'fa fa-comments'];
							$menu['admin.pages'] = ['name' => 'Pages', 'icon' => 'fa fa-comments'];
							$menu['admin.journey'] = ['name' => 'journey', 'icon' => 'fa fa-cube'];
							
							@endphp 
						
                        @foreach($menu as $key => $value)
							@php $str = ['admin.','1']; $str_key = str_replace($str,'',$key); @endphp
                            @if(empty($permissions) || isset($permissions[$str_key])) 
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route($key) }}">
                                        <i class="{{ $value['icon'] }}"></i>
                                        <span class="sidemenu-label">{{ translate($value['name']) }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                        @php
                            $settings = ['basic' => translate('Basic'), 'theme' => translate('Theme')];
                        @endphp
                        @if(empty($permissions) || isset($permissions['settings']))
                            <li class="nav-item">
								<a class="nav-link with-sub" href="javascript:void(0);"><i class="fa fa-cog"></i>
									<span class="sidemenu-label">{{ translate('Settings') }}</span><i class="angle fe fe-chevron-right"></i>
								</a>
								<ul class="nav-sub">
                                    @foreach($settings as $key => $value)
										@php $s_str = ['admin.','1']; $s_str_key = str_replace($s_str,'',$key); @endphp
                                        @if(empty($permissions) || isset($permissions['settings'][$s_str_key]))
                                            <li class="nav-sub-item">
                                                <a class="nav-sub-link" href="{{ route('admin.settings.'.$key) }}">{{ $value }}</a>
                                            </li>
                                        @endif
                                    @endforeach
								</ul>
							</li>
                        @endif
					</ul>
					<div class="slide-right" id="slide-right">
						<svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
							<path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
						</svg>
					</div>
				</div>
			</div>
			<div class="main-content side-content pt-0">
				<div class="side-app">
				  	<div class="main-container container-fluid">
                        @yield('content')
                    </div>
				</div>
			</div>
			<div class="main-footer text-center">
				<div class="">
					<div class="row">
						<div class="col-md-12">
                            <span><p>{{ translate('Copyright') }} © {{ date('Y') }} {{ app_setting('app_title') }} {!! app_setting('app_footer_credit') !!}</p></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>
        @yield('script')
	</body>
</html>
