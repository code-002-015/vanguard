<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Webfocus Solutions Inc.">

    <meta property="og:locale" content="tl_PH">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Webfocus Solutions Inc.">
    <meta property="og:site_name" content="Webfocus Solutions Inc.">
    <meta property="og:description" content="{{ $page->meta_description }}">
    <meta name="keywords" content="{{ $page->meta_keyword }}">

    <link rel="shortcut icon" href="{{ Setting::get_company_favicon_storage_path() }}" type="image/x-icon" />   
    <link rel="shortcut icon" href="{{ asset('theme/sysu/images/misc/favicon.ico') }}" type="image/x-icon" />

    @if (!empty($page->name) || !empty($page->meta_title))
        <title>{{ (empty($page->meta_title) ? $page->name:$page->meta_title) }} | {{ Setting::info()->company_name }}</title>
    @endif

    <!-- Stylesheets
    ============================================= -->
    <link href="{{ asset('theme/sysu/css/fonts/default.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/sysu/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/sysu/css/style-vars.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/sysu/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/sysu/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/sysu/css/et-line.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/sysu/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/sysu/css/magnific-popup.css') }}" type="text/css" />
    
    <link rel="stylesheet" href="{{ asset('theme/sysu/include/cookie-alert/cookiealert.css') }}" type="text/css"  />
    <link rel="stylesheet" href="{{ asset('theme/sysu/include/slick/slick.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('theme/sysu/include/slick/slick-theme.css') }}" type="text/css" />
    
    <link rel="stylesheet" href="{{ asset('theme/sysu/css/responsive.css') }}" type="text/css" />
    
    <link rel="stylesheet" href="{{ asset('theme/sysu/css/custom.css') }}" type="text/css" />
    
    <link rel="icon" href="favicon.png" type="image/png" sizes="16x16">
</head>

<body class="" data-loader="14">

    @include('theme.sysu.layout.banner')

    <div id="wrapper" class="clearfix">
        <div id="curtain" onclick="closeOffsideNav()"></div>

        @include('theme.sysu.layout.header')
        {{--@include('theme.sysu.layout.breadcrumb')--}}
        {{--@include('theme.sysu.layout.banner')--}}

        <section class="content">
            @yield('content')
        </section>

        <div class="alert text-center cookiealert" role="alert">
            <strong>Do you like cookies?</strong> &#x1F36A; We use cookies to ensure you get the best experience on our website. <a href="{{ route('privacy-policy')}}" target="_blank">Learn more</a>
            <button type="button" class="btn btn-primary btn-sm acceptcookies px-3" aria-label="Close">
                I agree
            </button>
        </div>

        <footer id="footer" class="dark">
            @include('theme.sysu.layout.footer')
        </footer>
    </div>

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
    ============================================= -->
    <script src="{{ asset('theme/sysu/js/jquery.js') }}"></script>
    <script src="{{ asset('theme/sysu/js/plugins.js') }}"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript">
        var bannerFxIn = "bounceIn";
        var bannerFxOut = "bounceOut";
        var bannerCaptionFxIn = "fadeInUp";
        var autoPlayTimeout = 4000;
        var bannerID = "banner";
    </script>


    <script src="{{ asset('theme/sysu/include/slick/slick.js') }}"></script>
    <script src="{{ asset('theme/sysu/include/slick/slick.extension.js') }}"></script>
    <script src="{{ asset('theme/sysu/include/cookie-alert/cookiealert.js') }}"></script>
    <script src="{{ asset('theme/sysu/js/functions.js') }}"></script>


    <!-- <script src="{{ asset('theme/sysu/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('theme/sysu/js/script.js') }}"></script>
    <script src="{{ asset('theme/sysu/plugins/materialize/js/materialize.js') }}"></script>
    <script src="{{ asset('theme/sysu/plugins/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('theme/sysu/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/sysu/plugins/rd-navbar/dist/js/jquery.rd-navbar.js') }}"></script>
    <script src="{{ asset('theme/sysu/plugins/slick/slick.js') }}"></script>
    <script src="{{ asset('theme/sysu/plugins/slick/slick.extension.js') }}"></script>
    <script src="{{ asset('theme/sysu/plugins/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('theme/sysu/js/privacy_policy.js') }}"></script> -->

    @yield('pagejs')
    
    @yield('customjs')

    
</body>
</html>
