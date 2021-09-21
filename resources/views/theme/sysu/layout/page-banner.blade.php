@php
    $photoUrl = (isset($page->album->banners) && count($page->album->banners) == 1) ? $page->album->banners[0]->image_path : $page->image_url;
@endphp

<div class="side-cover-wrapper full-screen d-none d-lg-block slick-carousel">
    <div class="swiper-container swiper-parent" style="height: 100% !important;">
        <div class="slick-wrapper" id="banner" style="height: inherit !important;">
            <div class="swiper-slide full-screen force-full-screen" style="background: url('{{$photoUrl}}') center right; background-size: cover; height: 100% !important;"></div>
        </div>
    </div>
</div>
