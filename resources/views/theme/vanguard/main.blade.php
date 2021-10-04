<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Stylesheets
    ============================================= -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('theme/'.env('THEME_FOLDER').'/css/style.css') }}" type="text/css" />

    <!-- Document Title
    ============================================= -->
    <title>Vanguard Academy</title>

    <!-- Favicon
    ============================================= -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

</head>

<body class="stretched" data-loader="6" data-loader-color="theme">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        @include('theme.'.env('FRONTEND_TEMPLATE').'.layout.header')

        @include('theme.'.env('FRONTEND_TEMPLATE').'.layout.banner')


        <!-- Content
        ============================================= -->
        <main id="content">
            @yield('content')
        </main>

        <!-- Footer
        ============================================= -->
        <footer id="footer">
            @include('theme.'.env('FRONTEND_TEMPLATE').'.layout.footer')
        </footer>
    </div>

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    
    <!-- Privacy Policy
    ============================================= -->
    <!-- <div class="alert text-center cookiealert show" role="alert">
        Do you like cookies? We use cookies to ensure you get the best experience on our website. <a href="https://cms4.webfocusprod.wsiph2.com/mccormick/public/privacy-policy" target="_blank">Learn more</a>
        <button type="button" id="cookieAcceptBarConfirm" class="btn btn-primary btn-sm acceptcookies px-3" aria-label="Close">
            I agree
        </button>
    </div> -->

    <!-- External JavaScripts
    ============================================= -->

    <script type="text/javascript">
        var bannerFxIn = "fadeIn";
        var bannerFxOut = "slideOutLeft";
        var bannerCaptionFxIn = "fadeInUp";
        var autoPlayTimeout = 4000;
        var bannerID = "banner";
    </script>

    <script src="{{ asset('theme/'.env('THEME_FOLDER').'/js/jquery.js') }}"></script>
    <script src="{{ asset('theme/'.env('THEME_FOLDER').'/js/plugins.js') }}"></script>

    <!-- Footer Scripts
    ============================================= -->
    <script src="{{ asset('theme/'.env('THEME_FOLDER').'/js/functions.js') }}"></script>
    <script src="{{ asset('theme/'.env('THEME_FOLDER').'/js/script.js') }}"></script>

    @yield('pagejs')
    
    @yield('customjs')

</body>
</html>