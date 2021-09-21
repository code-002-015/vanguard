@extends('theme.'.env('FRONTEND_TEMPLATE').'.main')

@section('pagecss')
@endsection

@section('content')
    <div class="content-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    {!! Setting::info()->data_privacy_content !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
@endsection
