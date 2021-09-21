@extends('admin.layouts.app')

@section('pagecss')
    <link href="{{ asset('lib/bselect/dist/css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <script src="{{ asset('lib/ckeditor/ckeditor.js') }}"></script>
    <style>
        .image_path {
            opacity: 0;
            width: 0;
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('dashboard')}}">CMS</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('careers.index')}}">Careers</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Career</li>
                    </ol>
                </nav>
                <h4 class="mg-b-0 tx-spacing--1">Create a Career</h4>
            </div>
        </div>

        <form id="createForm" method="POST" action="{{ route('careers.store') }}" enctype="multipart/form-data">
            <div class="row row-sm">
                @method('POST')
                @csrf

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block">Name *</label>
                        <input name="name" id="name" value="{{ old('name') }}" required type="text" class="form-control @error('name') is-invalid @enderror">
                        @hasError(['inputName' => 'name'])
                        @endhasError
                    </div>
                    <div class="form-group">
                        <label class="d-block">Category *</label>
                        <select name="category_id" class="selectpicker mg-b-5" required data-style="btn btn-outline-light btn-md btn-block tx-left" title="Select career category" data-width="100%">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @hasError(['inputName' => 'category_id'])
                        @endhasError
                    </div>

                    <div class="form-group">
                        <label class="d-block">Vacant Position *</label>
                        <input name="vacant_pos" id="vacant_pos" value="{{ old('vacant_pos') }}" required type="number" class="form-control @error('vacant_pos') is-invalid @enderror">
                        @hasError(['inputName' => 'vacant_pos'])
                        @endhasError
                    </div>

                    <div class="form-group">
                        <label class="d-block">Start Date *</label>
                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', date('Y-m-d')) }}">
                        @hasError(['inputName' => 'start_date'])
                        @endhasError
                    </div>
                    <div class="form-group">
                        <label class="d-block">End Date *</label>
                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date', date('Y-m-d')) }}">
                        @hasError(['inputName' => 'end_date'])
                        @endhasError
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="d-block">Contents *</label>
                        <textarea name="contents" id="editor1" rows="10" cols="80">
                             {{ old('contents') }}
                        </textarea>
                        @hasError(['inputName' => 'contents'])
                        @endhasError
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="d-block">Teaser *</label>
                        <textarea class="form-control @error('teaser') is-invalid @enderror" name="teaser" rows="4" required @htmlValidationMessage({{__('standard.empty_all_field')}})>{{ old("teaser") }}</textarea>
                        @hasError(['inputName' => 'teaser'])
                        @endhasError
                    </div>
                    <div class="form-group">
                        <label class="d-block">Visibility</label>
                        <div class="custom-control custom-switch @error('is_active') is-invalid @enderror">
                            <input type="checkbox" class="custom-control-input" name="is_active" {{ (old("is_active") ? "checked":"") }} id="customSwitch1">
                            <label class="custom-control-label" id="label_visibility" for="customSwitch1">{{ (old("is_active") ? "Published" : "Private") }}</label>
                            @hasError(['inputName' => 'is_active'])
                            @endhasError
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mg-t-30">
                    <input class="btn btn-primary btn-sm btn-uppercase" type="submit" value="Save Career">
                    <a href="{{ route('careers.index') }}" class="btn btn-outline-secondary btn-sm btn-uppercase">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('pagejs')
    <script src="{{ asset('lib/bselect/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('lib/bselect/dist/js/i18n/defaults-en_US.js') }}"></script>
    <script src="{{ asset('lib/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
@endsection

@section('customjs')
    <script>
        var options = {
            filebrowserImageBrowseUrl: '{{ env('APP_URL') }}/laravel-filemanager?type=Images',
            filebrowserImageUpload: '{{ env('APP_URL') }}/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: '{{ env('APP_URL') }}/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '{{ env('APP_URL') }}/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}',
            allowedContent: true,

        };
        let editor = CKEDITOR.replace('contents', options);

        $(function() {
            $('.selectpicker').selectpicker();

            $("#customSwitch1").change(function() {
                if(this.checked) {
                    $('#label_visibility').html('Published');
                }
                else{
                    $('#label_visibility').html('Private');
                }
            });
        });
    </script>
@endsection
