
<div class="row">
    <div class="col-lg-12" style="padding:0;">
        <div id="banner" class="slick-slider">
            @foreach ($page->album->banners as $banner)
                <div class="hero-slide">
                    <div class="banner-overlay-1"></div>
                    <img src="{{ $banner->image_path }}">
                    <div class="banner-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <h6 class="mb-4 ls5 text-uppercase text-secondary">{{ $banner->title }}</h6>
                                    @if(isset($banner->title))
                                    <hr />
                                    @endif
                                    
                                    <h2>{{ $banner->description }}</h2>
                                    @if($banner->url && $banner->button_text)
                                        <a href="{{ $banner->url }}" class="button button-custom button-large nomargin clearfix">{{ $banner->button_text }}</a>
                                    @endif
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
