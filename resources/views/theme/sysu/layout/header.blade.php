<header id="header" class="nobottomborder no-sticky">
    <div id="header-wrap">
        <div class="container-fluid clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{ route('home') }}" class="standard-logo" data-dark-logo="{{ asset('theme/'.env('FRONTEND_TEMPLATE').'/images/logos/logo-media.png') }}"><img src="{{ asset('theme/'.env('FRONTEND_TEMPLATE').'/images/logos/logo-media.png') }}" alt="Canvas Logo"></a>
                <a href="{{ route('home') }}" class="retina-logo" data-dark-logo="{{ asset('theme/'.env('FRONTEND_TEMPLATE').'/images/logos/logo-media@2x.png') }}"><img src="{{ asset('theme/'.env('FRONTEND_TEMPLATE').'/images/logos/logo-media@2x.png') }}" alt="Canvas Logo"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="style-2">

                @include('theme.sysu.layout.menu')

                @php 
                    $media_accounts = \App\MediaAccounts::all();
                @endphp
                <div class="header-social-set">
                    @foreach($media_accounts as $media)
                    <a target="_blank" href="{{$media->media_account}}" class="social-icon si-small si-borderless si-{{$media->name}}">
                        <i class="icon-{{$media->name}}"></i>
                        <i class="icon-{{$media->name}}"></i>
                    </a>
                    @endforeach
                </div>
            </nav>
        </div>
    </div>
</header>

<div class="clear"></div>

@if (\Route::current()->getName() != 'home')
    <div id="page-title" class="page-title-left bg-transparent border-top border-bottom sub-banner">
        <div class="clearfix">
            <div class="container-fluid head-title">
                <div class="container p-0 m-0">
                    <h1>{{ $page->name }}</h1>
                    <ol class="breadcrumb">
                        @foreach($breadcrumb as $link => $url)
                            @if($loop->last)
                                <li class="breadcrumb-item active" aria-current="page">{{$link}}</li>
                            @else
                                <li class="breadcrumb-item"><a href="{{$url}}">{{$link}}</a></li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endif