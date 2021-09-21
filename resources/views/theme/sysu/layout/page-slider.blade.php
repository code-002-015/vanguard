
<div class="side-cover-wrapper full-screen d-none d-lg-block slick-carousel">
    <div class="swiper-container swiper-parent" style="height: 100% !important;">
        <div class="slick-wrapper" id="banner" style="height: inherit !important;">
            @foreach($page->album->banners as $banner)
            <div class="swiper-slide full-screen force-full-screen" style="background: url('{{ $banner->image_path }}') center right; background-size: cover; height: 100% !important;"></div>
            @endforeach
        </div>
    </div>
</div>
