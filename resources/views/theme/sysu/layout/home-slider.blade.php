
<div class="side-cover-wrapper full-screen d-none d-lg-block slick-carousel">
    <div class="swiper-container swiper-parent" style="height: 100% !important;">
        <div class="slick-wrapper" id="banner" style="height: inherit !important;">
            @if($page->album->banner_type == 'image')
                @foreach ($page->album->banners as $banner)
                    <div class="swiper-slide full-screen force-full-screen" style="background: url('{{ $banner->image_path }}') center right; background-size: cover; height: 100% !important;"></div>
                @endforeach
            @else
                <div class="slick-wrapper" id="banner" style="height: inherit !important;">
                    <div class="swiper-slide full-screen force-full-screen d-flex justify-content-center">
                        <video poster="" preload="auto" loop autoplay muted>
                            @foreach ($page->album->banners as $banner)
                                <source src='{{ $banner->image_path }}' type='video/mp4' />
                            @endforeach
                        </video>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>


