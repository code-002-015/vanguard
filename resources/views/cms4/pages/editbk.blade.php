@extends('admin.layouts.app')

@section('pagetitle')
    Edit Page
@endsection

@section('pagecss')
	<link href="{{ asset('lib/bselect/dist/css/bootstrap-select.css') }}" rel="stylesheet">
	<!-- <script src="{{ asset('lib/ckeditor/ckeditor.js') }}"></script> -->
    <link href="{{ asset('lib/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owl.carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">

    <link
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
			rel="stylesheet"
		/>
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/toastr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/grapes.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/grapick.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/grapesjs-preset-webpage.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/tooltip.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/grapesjs-plugin-filestack.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/tui-color-picker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/tui-image-editor.min.css') }}" />
@endsection

@section('content')

<div class="container pd-x-0">
	<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
		<div>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-style1 mg-b-10">
					<li class="breadcrumb-item" aria-current="page"><a href="{{route('dashboard')}}">CMS</a></li>
					<li class="breadcrumb-item" aria-current="page"><a href="{{route('pages.index')}}">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">Edit a Page</li>
				</ol>
			</nav>
            <h4 class="mg-b-0 tx-spacing--1">Edit a Page</h4>
		</div>
        <div>
            <a class="btn btn-outline-primary btn-sm" href="{{$page->get_url()}}" target="_blank">Preview Page</a>
        </div>
	</div>
	<form id="editForm" action="{{ route('pages.update',$page->id) }}" method="post" enctype="multipart/form-data">
		<div class="row row-sm">
			<div class="col-lg-6">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label class="d-block">Page Title *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $page->name) }}" required>
                    @hasError(['inputName' => 'name'])
                    @endhasError
                    <small id="page_slug"><a target="_blank" href="{{env('APP_URL')}}/{{$page->slug}}">{{env('APP_URL')}}/{{$page->slug}}</a></small>
                    @hasError(['inputName' => 'slug'])
                    @endhasError
				</div>
                <div class="form-group">
                    <label class="d-block">Page Label *</label>
                    <input type="text" class="form-control @error('label') is-invalid @enderror" name="label" id="label" value="{{ old('label', $page->label) }}" required>
                    @hasError(['inputName' => 'label'])
                    @endhasError
                </div>
                <div class="form-group">
                    <label class="d-block">Parent Page</label>
                    <select id="parentPage" class="selectpicker mg-b-5 @error('parent_page_id') is-invalid @enderror" name="parent_page_id" data-style="btn btn-outline-light btn-md btn-block tx-left" title="- None -" data-width="100%">
                        <option value="0" @if (empty($page->parent_page_id)) selected @endif>- None -</option>
                        @forelse($parentPages as $parentPage)
                            <option value="{{$parentPage->id}}" {{ (old("parent_page_id", $page->parent_page_id) == $parentPage->id ? "selected":"") }}> {{$parentPage->name}} </option>
                        @empty
                        @endforelse

                    </select>
                    @hasError(['inputName' => 'parent_page_id'])
                    @endhasError
                </div>
				@php
					$album_active = 'active';
					$image_active = '';
					$banner_type = 'banner_slider';
					if(strlen($page->image_url) > 0){
						$album_active = '';
						$image_active = 'active';
						$banner_type = 'banner_image';
					}
				@endphp

                <div class="form-group">
                    <label class="d-block">Page Banner</label>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" id="banner_slider" class="btn page_banner_btn btn-secondary {{ $album_active }}">Slider</button>
                        <button type="button" id="banner_image" class="btn page_banner_btn btn-secondary {{ $image_active }}">Image</button>

                        <input type="hidden" name="banner_type" id="banner_type" value="{{ $banner_type }}">
                    </div>
                </div>

                <div class="form-group banner-image" style="{{($banner_type == 'banner_slider' ? 'display:none;':'')}}">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('image_url') is-invalid @enderror"  id="image_url" name="image_url" @if (!empty($page->image_url)) title="{{$page->get_image_file_name()}}" @endif>
                        <label class="custom-file-label" for="customFile" id="img_name">@if (empty($page->image_url)) Choose file @else {{$page->get_image_file_name()}} @endif</label>
                    </div>
                    <p class="tx-10">
                        Required image dimension: {{ env('SUB_BANNER_WIDTH') }}px by {{ env('SUB_BANNER_HEIGHT') }}px <br /> Maximum file size: 1MB <br /> Required file type: .jpeg .png
                    </p>
                    @error('image_url')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div id="image_div" @if($page->has_slider()) style="display:none;" @endif>
                        <img src="{{ old('image_url', $page->image_url) }}" height="300" width="180" id="img_temp" alt="">  <br /><br />
                        <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove_image();">Remove Image</a>
                    </div>
                </div>

				<div class="form-group banner-slider" style="{{($banner_type == 'banner_image' ? 'display:none;':'')}}">
					<div class="row">
						<div class="col-md-10">
                            <select class="selectpicker mg-b-5 @error('album_id') is-invalid @enderror" id="album_id" name="album_id" data-style="btn btn-outline-light btn-md btn-block tx-left" title="Select album" data-width="100%">
                                <option value="0" @if (empty($page->album_id)) selected @endif>- None -</option>
                                @forelse($albums as $album)
                                    <option value="{{$album->id}}" {{ (old("album_id",$page->album_id) == $album->id ? "selected":"") }}> {{$album->name}} </option>
                                @empty
                                @endforelse
                            </select>
						</div>
{{--						<div class="col-md-2">--}}
{{--							<div class="col-md-2" id="preview_btn_div" @if(!$page->has_slider() || empty($page->album_id)) style="display:none;" @endif>--}}
{{--                                <a href="#" data-toggle="modal" data-target="#preview-banner" id="preview_btn" class="btn btn-xs btn-success" data-id="{{$page->album_id}}">Preview</a>--}}
{{--						    </div>--}}
{{--						</div>--}}
					</div>
                    @hasError(['inputName' => 'album_id'])
                    @endhasError
				</div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<label class="d-block">Content *</label>

                    <div id="gjs">
                        @php
                            echo html_entity_decode(old('contents', $page->contents))
                        @endphp
                    </div>

                    <input type="hidden" name="contents" id="contents" value="{{ old('contents', $page->contents) }}">
                    <input type="hidden" name="wysiwyg_styles" id="wysiwyg_styles">


                    @hasError(['inputName' => 'contents'])
                    @endhasError
                    <span class="invalid-feedback" role="alert" id="contentsRequired" style="display: none;">
                        <strong>The content field is required</strong>
                    </span>
				</div>
				<div class="form-group">
					<label class="d-block">Page Visibility</label>
                    <div class="custom-control custom-switch @error('visibility') is-invalid @enderror">
                        <input type="checkbox" class="custom-control-input" name="visibility" {{ (old("visibility") == "ON" || $page->status == "PUBLISHED" ? "checked":"") }} id="customSwitch1">
                        <label class="custom-control-label" id="label_visibility" for="customSwitch1">{{ucfirst(strtolower($page->status))}}</label>
                    </div>
				</div>
			</div>

			<div class="col-lg-12 mg-t-30">
				<h4 class="mg-b-0 tx-spacing--1">Manage SEO</h4>
				<hr>
			</div>

			<div class="col-lg-6 mg-t-30">
				<div class="form-group">
					<label class="d-block">Title <code>(meta title)</code></label>
					<input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title',$page->meta_title) }}">
                    @hasError(['inputName' => 'meta_title'])
                    @endhasError
					<p class="tx-11 mg-t-4">{{ __('standard.seo.title') }}</p>
				</div>
				<div class="form-group">
					<label class="d-block">Description <code>(meta description)</code></label>
					<textarea rows="3" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description">{!! old('meta_description',$page->meta_description) !!}</textarea>
                    @hasError(['inputName' => 'meta_description'])
                    @endhasError
					<p class="tx-11 mg-t-4">{{ __('standard.seo.description') }}</p>
				</div>
				<div class="form-group">
					<label class="d-block">Keywords <code>(meta keywords)</code></label>
					<textarea rows="3" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword">{!! old('meta_keyword',$page->meta_keyword) !!}</textarea>
                    @hasError(['inputName' => 'meta_keyword'])
                    @endhasError
					<p class="tx-11 mg-t-4">{{ __('standard.seo.keywords') }}</p>
				</div>
			</div>

			<div class="col-lg-12 mg-t-30">
				<input class="btn btn-primary btn-sm btn-uppercase" type="submit" value="Update Page">
				<a href="{{route('pages.index')}}" class="btn btn-outline-secondary btn-sm btn-uppercase" type="cancel">Cancel</a>
			</div>
		</div>
	</form>
</div>


<div class="modal fade" id="preview-banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel3">Preview</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="owl-carousel owl-theme" id="previewCarousel">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
	<script src="{{ asset('lib/bselect/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('lib/bselect/dist/js/i18n/defaults-en_US.js') }}"></script>
    <script src="{{ asset('lib/owl.carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/file-upload-validation.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button-2.js') }}"></script>

    <script src="{{ asset('lib/grapesjs/toastr.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapes.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-pkurg-bootstrap4-plugin.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-lory-slider.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-custom-code.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-touch.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-parser-postcss.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-tooltip.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-tui-image-editor.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-typed.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-style-bg.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/fabric.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/tui-code-snippet.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/tui-color-picker.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/tui-image-editor.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-style-gradient.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-plugin-ckeditor.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-plugin-export.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/grapesjs-blocks-bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lib/grapesjs/b4bulder-custom-blocks.js') }}"></script>
    <script src="{{ asset('lib/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('lib/ckeditor/adapters/jquery.js') }}"></script>
    <!-- <script src="{{ asset('lib/grapesjs/grapesjs-script.js') }}"></script> -->
@endsection

@section('customjs')
    <script>
        var editorgjs = grapesjs.init({
        height: "100%",
        container: "#gjs",
        fromElement: 1,
        showOffsets: 1,
        noticeOnUnload: 0,
        colorPicker: { appendTo: "parent", offset: { top: 20, left: -175 } },
        storageManager: {
            id: "gjs-", // Prefix identifier that will be used on parameters
            type: "remote", //type: 'local', type: 'remote',Type of the storage
            autosave: false, // Store data automatically
            autoload: true, // Autoload stored data on init
            contentTypeJson: false,
            storeComponents: true,
            storeStyles: true,
            storeHtml: true,
            storeCss: true,
        },
        plugins: [
            PB4,
            "grapesjs-custom-code",
            "grapesjs-parser-postcss",
            "grapesjs-tooltip",
            "grapesjs-tui-image-editor",
            "grapesjs-style-bg",
            "grapesjs-style-gradient",
            "grapesjs-plugin-ckeditor",
            "grapesjs-plugin-export",
            "grapesjs-blocks-bootstrap4",
            PB4CustomBlocks,
        ],
        pluginsOpts: {
            "grapesjs-blocks-bootstrap4": {
                blocks: {
                    image: false,
                },
                blockCategories: {
                    components: false,
                    forms: false
                },
            },
            "grapesjs-tabs": {
                tabsBlock: {
                    category: "Extra",
                },
            },
            "grapesjs-style-gradient": {},
            "gjs-plugin-ckeditor": {
                options: {
                    filebrowserImageBrowseUrl: '{{ env('APP_URL') }}/laravel-filemanager?type=Images',
                    filebrowserImageUpload: '{{ env('APP_URL') }}/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
                    filebrowserBrowseUrl: '{{ env('APP_URL') }}/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '{{ env('APP_URL') }}/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}',
                    allowedContent: true,
                    language: "en",
                },
            },
        },
        canvas: {
            styles: [
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/css/bootstrap.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/css/style-vars.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/css/dark.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/css/font-icons.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/css/et-line.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/css/animate.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/css/magnific-popup.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/include/cookie-alert/cookiealert.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/include/slick/slick.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/include/slick/slick-theme.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/css/responsive.css',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/css/custom.css'
            ],
            scripts: [
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/js/jquery.js',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/js/plugins.js',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/include/slick/slick.js',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/include/cookie-alert/cookiealert.js',
                '{{ env('APP_URL') }}/theme/{{ env('THEME_FOLDER') }}/js/functions.js',
            ],
        },
    });

    editorgjs.I18n.addMessages({
        en: {
            styleManager: {
                properties: {
                    "background-repeat": "Repeat",
                    "background-position": "Position",
                    "background-attachment": "Attachment",
                    "background-size": "Size",
                },
            },
        },
    });

    var pn = editorgjs.Panels;
    var modal = editorgjs.Modal;
    var cmdm = editorgjs.Commands;

    cmdm.add("update-page", {
        run: function (em, sender) {
            sender.set("active", true);
            updateContent();
        },
    });

    editorgjs.StyleManager.addProperty("decorations", {
        name: "Gradient",
        property: "background-image",
        type: "gradient",
        defaults: "none",
    });

    // Simple warn notifier
    var origWarn = console.warn;
    toastr.options = {
        closeButton: true,
        preventDuplicates: true,
        showDuration: 250,
        hideDuration: 150,
    };
    console.warn = function (msg) {
        if (msg.indexOf("[undefined]") == -1) {
            toastr.warning(msg);
        }
        origWarn(msg);
    };

    var titles = document.querySelectorAll("*[title]");

    for (var i = 0; i < titles.length; i++) {
        var el = titles[i];
        var title = el.getAttribute("title");
        title = title ? title.trim() : "";
        if (!title) break;
        el.setAttribute("data-tooltip", title);
        el.setAttribute("title", "");
    }

    // Add and beautify tooltips

    [
        ["sw-visibility", "Show Borders"],
        ["preview", "Preview"],
        ["fullscreen", "Fullscreen"],
        ["export-template", "View Code"],
        ["undo", "Undo"],
        ["redo", "Redo"],
    ].forEach(function (item) {
        pn.getButton("options", item[0]).set("attributes", {
            title: item[1],
            "data-tooltip": item[1],
            "data-tooltip-pos": "bottom",
        });
    });

    [
        ["open-sm", "Style Manager"],
        ["open-tm", "Trait Manager"],
        ["open-layers", "Layers"],
        ["open-blocks", "Blocks"],
    ].forEach(function (item) {
        pn.getButton("views", item[0]).set("attributes", {
            title: item[1],
            "data-tooltip": item[1],
            "data-tooltip-pos": "bottom",
        });
    });

    // Show borders by default
    pn.getButton("options", "sw-visibility").set("active", 1);

    // Do stuff on load
    editorgjs.on("load", function () {
        var $ = grapesjs.$;

        // Load and show settings and style manager
        var openBlkBtn = pn.getButton("views", "open-blocks");
        openBlkBtn && openBlkBtn.set("active", 1);
    });

    editorgjs.on('component:update', () => { 
        $('#contents').val(editorgjs.getHtml());
    });

    editorgjs.on('component:styleUpdate', () => { 
        $("#wysiwyg_styles").val(editorgjs.getCss());
    });

    //media assets
    cmdm.add('open-assets', {
        run(editor, sender, opts = {}) {
            var type = "image";
            var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
            var target = $("#" + opts.target.ccid);
            window.open(
                route_prefix + "?type=" + type,
                "FileManager",
                "width=900,height=600"
            );
            window.SetUrl = function (url) {
                var img = new Image();
                img.onload = function () {
                    opts.target.set('src', url);
			        const fakeAsset = { get: () => url };
			        opts.onSelect(fakeAsset);
                };
                img.src = url;
            };
            return false;
        }
    });
    </script>
	<script>

        function has_none_option(objectId, currentValue)
        {
            if (currentValue == "0" || currentValue == "" || currentValue == "null") {
                document.getElementById(objectId).selectedIndex = -1;
            }
            $('#'+objectId).on('change', function() {
                if ($(this).val() == 0) {
                    document.getElementById(objectId).selectedIndex = -1;
                }
            });
        }

        $(function() {
            $('.selectpicker').selectpicker();

            has_none_option("parentPage", "{{$page->parent_page_id}}");
            has_none_option("album_id", "{{$page->album_id}}");
        });

        /**  START Slider Preview **/
        $('#album_id').on('change', function() {
            $("#preview_btn").data("id", $('#album_id').val());
            if($('#album_id').val() && $('#album_id').val() > 0){
                $('#preview_btn_div').show();
            } else {
                $('#preview_btn_div').hide();
            }
        });

        $('#preview-banner').on('show.bs.modal', function (e) {
            let album = e.relatedTarget;
            let albumId = $(album).data('id');
            $('#previewCarousel').html('');
            $.ajax({
                type: "POST",
                data: { _token: "{{ csrf_token() }}"},
                url: "{{ route('albums.banners', '') }}/" + albumId,
                success: function(returnData) {
                    console.log(returnData);
                    let pathHTML = '';
                    $.each(returnData['banner_paths'], function(index, path) {
                        pathHTML += `<div class="item">
                            <img src="`+path+`">
                        </div>`;
                    });
                    $('#previewCarousel').trigger('destroy.owl.carousel');

                    $('#previewCarousel').html(pathHTML);

                    $('#previewCarousel').owlCarousel({
                        animateOut: returnData['transition_out'],
                        animateIn: returnData['transition_in'],
                        loop: true,
                        dots: false,
                        margin: 0,
                        autoplay: true,
                        autoplayTimeout: (returnData['transition']*1000),
                        autoplayHoverPause: false,
                        nav: false,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 1
                            }
                        }
                    });
                }
            });
        });
        /**  END Slider Preview **/

        $("#customSwitch1").change(function() {
		    if(this.checked) {
		        $('#label_visibility').html('Published');
		    }
		    else{
		    	$('#label_visibility').html('Private');
		    }
		});


        /** Generation of the page slug **/
        function get_page_slug() {
            var url = $('#name').val();
            var parentPage = $('#parentPage').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                }
            })

            $.ajax({
                type: "POST",
                url: "{{ route('pages.get_slug') }}",
                data: {url: url, parentPage: parentPage}
            })

                .done(function (response) {

                    slug_url = '{{env('APP_URL')}}/' + response;
                    $('#page_slug').html("<a target='_blank' href='" + slug_url + "'>" + slug_url + "</a>");

                });
        }

        $('#parentPage').change(function(){
            get_page_slug();
        });

        $('#name').change(function(){
            get_page_slug();
        });


        /** Handles the page banner functions **/
        $('.page_banner_btn').click(function(){

        	var btn = $(this).attr('id');

        	if(btn == $('#banner_type').val()){ // if user clicked the already selected button then cancel the operation.
    			return false;
    		}
    		else{

                /** reset the input boxes **/
                $('#image_url').val('');
                $('#album_id').val('');
                $('#image_div').hide();
                $('#img_name').html('Choose file');

    			$('#banner_type').val(btn);

    			if(btn == 'banner_slider'){ // if user selected the banner slider

    				$("#banner_image").removeClass("active");
        			$("#banner_slider").addClass("active");

        			// $("#album_id").prop('required',true);
        			// $("#image_url").prop('required',false);

        			$(".banner-image").hide();
        			$(".banner-slider").show();
	        	}


	        	if(btn == 'banner_image'){ // if user selected the banner image

	        		$("#banner_slider").removeClass("active");
        			$("#banner_image").addClass("active");

        			// $("#image_url").prop('required',true);
        			// $("#album_id").prop('required',false);

        			$(".banner-slider").hide();
        			$(".banner-image").show();
	        	}
    		}
        });

        function readURL(file) {
            let reader = new FileReader();

            reader.onload = function(e) {
                $('#img_name').html(file.name);
                $('#image_url').attr('title', file.name);
                $('#img_temp').attr('src', e.target.result);
            }

            reader.readAsDataURL(file);
            $('#image_div').show();
        }

        $("#image_url").change(function(evt) {

            $('#editForm').prepend('<input type="hidden" name="delete_image" value="1"/>');
            $('#img_name').html('Choose file');
            $('#img_temp').attr('src', '');
            $('#image_div').hide();

            let files = evt.target.files;
            let maxSize = 2;
            let validateFileTypes = ["image/jpeg", "image/png"];
            let requiredWidth = "{{ env('SUB_BANNER_WIDTH') }}";
            let requiredHeight =  "{{ env('SUB_BANNER_HEIGHT') }}";

            validate_files(files, readURL, maxSize, validateFileTypes, requiredWidth, requiredHeight, remove_banner_value_when_error);
        });

        function remove_banner_value_when_error()
        {
            $('#image_url').val('');
            $('#image_url').removeAttr('title');
        }

        function remove_image() {
            $('#editForm').prepend('<input type="hidden" name="delete_image" value="1"/>');
            $('#img_name').html('Choose file');
            $('#image_url').removeAttr('title');
            $('#image_url').val('');
            $('#img_temp').attr('src', '');
            $('#image_div').hide();
        }
    </script>
@endsection
