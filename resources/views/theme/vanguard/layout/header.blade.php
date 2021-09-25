
<header id="header" class="header-size-md" data-sticky-class="not-dark">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{ route('home') }}" class="standard-logo"><img src="{{ asset('storage/logos/'.Setting::getFaviconLogo()->company_logo) }}" alt="Varguard Academy"></a>
                <a href="{{ route('home') }}" class="retina-logo"><img src="{{ asset('storage/logos/'.Setting::getFaviconLogo()->company_logo) }}" alt="Vanguard Academy"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu">
                <div class="primary-menu-wrap d-flex justify-content-end align-items-center w-100 mb-3">
                    <div class="d-flex">
                        <form class="top-search-form mb-0" action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                    </form>
                        <div class="header-socials d-flex font-weight-bold">
                            <span class="mr-3">Find our latest updates:</span>
                            <ul class="list-inline">
                                <li class="list-inline-item mr-3"><a class="text-primary" href="https://www.facebook.com/"><i class="icon-facebook1"></i></a></li>
                                <li class="list-inline-item mr-3"><a class="text-primary" href="https://instagram.com/"><i class="icon-instagram"></i></a></li>
                                <li class="list-inline-item mr-3"><a class="text-primary" href="https://twitter.com/"><i class="icon-youtube"></i></a></li>
                                <li class="list-inline-item"><a class="text-primary" href="https://linkedin.com/"><i class="icon-linkedin"></i></a></li>
                            </ul>                   
                        </div>
                        <div id="top-search" class="header-misc-icon">
                            <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                        </div>
                    </div>
                </div>

                @include('theme.'.env('THEME_FOLDER').'.layout.menu')
            </nav><!-- #primary-menu end -->
        </div>
    </div>
</header>