@php
    $is_video = 0;
    if($page->album->banner_type == 'video'){
        $is_video = 1;
    }
@endphp

<div class="row">
    <div class="col-lg-12" style="padding:0;">
        <div id="banner" class="slick-slider">
            @foreach ($page->album->banners as $banner)
                <div class="hero-slide">
                    @if($is_video > 0)
                        <video autoplay="" muted="" loop="" id="myVideo">
                            <source src="{{ $banner->image_path }}" type="video/mp4">
                        </video>
                    @else
                        <img src="{{ $banner->image_path }}">
                    @endif

                    <div class="banner-caption">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <h6 class="mb-4 ls5 text-uppercase text-secondary text-lg-white">{{ $banner->title }}</h6>
                                    <h2 class="mb-4 mb-lg-0 text-lg-white">{{ $banner->description }}</h2>
                                </div>
                                <div class="col-lg-4">
                                    @if($banner->url && $banner->button_text)
                                        <a href="{{ $banner->url }}" class="button custom button-border button-light button-fill button-xlarge noleftmargin clearfix float-lg-end">{{ $banner->button_text }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


