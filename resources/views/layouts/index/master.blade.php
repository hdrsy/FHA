<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FHA PHARMA</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="FHA Pharma - Cosmetic & Beauty Salon Website Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
        content="bootstrap, ecommerce, ecommerce html, beauty, cosmetic shop, beauty products, cosmetic, beauty shop, cosmetic store, shop, beauty store, spa, cosmetic, cosmetics, beauty salon" />
    <meta name="author" content="codecarnival" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(app()->getLocale() == 'ar')
    <link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon.webp">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/plugins/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <style>
    .d-block img,.hero-slide-thumb img,.thumb img, .product-details-thumb img, .header-logo img,.product-single-thumb img {
        width: 100%;  /* Make the image take the full width of its container */
        height: auto; /* Make the image take the full height of its container */
        object-fit: cover; /* Scale the image to preserve its aspect ratio while fitting within the element's content box */
    }
    </style>
    <style>
        /* RTL specific styles */
    /* Ensure the direction is RTL */
    [dir="rtl"] .widget-social {
        direction: ltr;
        margin-left: 100px;
    }


    </style>
<style>
 /* Style for the dropdown */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: rgb(0, 0, 0);
    padding: 12px 16px;
    font-size: 10px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropbtn {
    background-color: transparent;
    color: black;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: transparent;
}

.dropdown:hover .dropdown-content {
    display: block;
}

/* Icon styling */
.fas {
    margin-right: 5px;
}

</style>
</head>

<body>

    <!--== Wrapper Start ==-->
    <div class="wrapper">

        <!--== Start Header Wrapper ==-->
        <header class="header-area sticky-header header-transparent">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-5 col-lg-2 col-xl-1">
                        <div class="header-logo">
                            <a href="{{route('main')}}">
                                <img class="logo-main" src="{{ URL::asset('assets/images/logo.webp') }}" width="95" height="68"
                                    alt="Logo" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-7 d-none d-lg-block">
                        <div class="header-navigation ps-7">
                            <ul class="main-nav justify-content-start">
                                <li><a href="{{route('main')}}">{{ __('messages.home') }}</a></li>

                                <li><a href="{{ route('about_us') }}">{{ __('messages.nav_about') }}</a></li>
                                <li><a href="{{route('products')}}">{{ __('messages.products') }}</a></li>

                                <li><a href="{{route('blog')}}">{{ __('messages.Blogs') }}</a></li>


                                <li><a href="{{route('faq')}}">{{ __('messages.FAQ') }}</a></li>
                                <li><a href="{{ route('contact') }}">{{ __('messages.Contact') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-7 col-lg-3 col-xl-4">
                        <div class="header-action justify-content-end">
                            <div class="dropdown language-dropdown" style="margin-right: 1%">
                                <button class="dropbtn">
                                    <i class="fas fa-globe"></i> <!-- Globe icon -->
                                </button>
                                <div class="dropdown-content">
                                    <a href="{{ route('switchLang', 'en') }}">
                                        <i class="fas fa-flag-usa"></i> En
                                    </a>
                                    <a href="{{ route('switchLang', 'ar') }}">
                                        <i class="fas fa-flag"></i> Ar
                                    </a>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>

        <!--== Start Footer Area Wrapper ==-->
        <footer class="footer-area">
            <!--== Start Footer Main ==-->
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="widget-item">
                                <div class="widget-about">
                                    <a class="widget-logo" href="{{route('main')}}">
                                        <img src="{{ URL::asset('assets/images/logo.webp') }}" width="200" height="200"
                                            alt="Logo">
                                    </a>
                                    {{-- <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been.</p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 mt-md-0 mt-9">
                            <div class="widget-item">
                                <h4 class="widget-title">{{ __('messages.info') }}</h4>
                                <ul class="widget-nav">
                                    <li><a href="{{route('blog')}}">{{ __('messages.Blogs') }}</a></li>
                                    <li><a href="{{ route('about_us') }}">{{ __('messages.nav_about') }}</a></li>
                                    <li><a href="{{ route('contact') }}">{{ __('messages.Contact') }}</a></li>
                                    <li><a href="{{route('products')}}">{{ __('messages.products') }}</a></li>
                                    <li><a href="{{route('faq')}}">{{ __('messages.FAQ') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mt-lg-0 mt-6">
                            <div class="widget-item">
                                <h4 class="widget-title">{{ __('messages.social') }}</h4>
                                <div class="widget-social">
                                    <a href="https://www.instagram.com/fhapharma?fbclid=IwZXh0bgNhZW0CMTAAAR0p_vGdUvxWFxi6JXnxlpueZH6wf2a9ajbdCVjP3s643XcvIZbzw5clU5Y_aem_AfOSZ65HpJUucSJxXwMvSo-QiymuvkLSIbdSm95KVWieV9IT-X-YQZ6RTQfglz1G8XVSag8Z2pLbfPI8nxjNbaWG" target="_blank" rel="noopener">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="https://www.facebook.com/profile.php?id=61552599025055" target="_blank" rel="noopener">
                                        <i class="fab fa-facebook-f"></i>  <!-- Note: 'fa-facebook-f' might be the correct class for Facebook depending on the specific icon style you want -->
                                    </a>
                                    <a href="https://wa.me/+963983055000" target="_blank" rel="noopener">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Footer Main ==-->

            <!--== Start Footer Bottom ==-->
            <div class="footer-bottom">
                <div class="container pt-0 pb-0">
                    <div class="footer-bottom-content">
                        <p class="copyright">© 2024 FHA PHARMA. powered by <a
                                target="_blank" href="https://www.hdragency.com/">HDR.</a></p>
                    </div>
                </div>
            </div>
            <!--== End Footer Bottom ==-->
        </footer>
        <!--== End Footer Area Wrapper ==-->

    </div>
    <!--== Wrapper End ==-->

    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.11.7.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.nice-select.min.js') }}"></script>

    <!-- Custom Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>



    </div>

</body>

</html>
