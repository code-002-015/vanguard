@extends('theme.'.env('FRONTEND_TEMPLATE').'.main')
@section('pagecss')

@endsection
@section('content')
<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row no-gutters">
                    @foreach($categories as $cat)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ route('careers.jobs',$cat->slug) }}" class="careers-options-items center border p-3 m-0 d-block">
                                @if($cat->name == 'Production Department')
                                    <i class="icon-cogs icon-3x"></i>
                                @elseif($cat->name == 'Sales Department')
                                    <i class="icon-briefcase1 icon-3x"></i>
                                @elseif($cat->name == 'Marketing Department')
                                    <i class="icon-note icon-3x"></i>
                                @elseif($cat->name == 'Technical Department')
                                    <i class="icon-server icon-3x"></i>
                                @elseif($cat->name == 'Finance Department')
                                    <i class="icon-money-bill icon-3x"></i>
                                @else
                                    <i class="icon-pen icon-3x"></i>
                                @endif

                                <h4 class="m-0">{{ $cat->name }}</h4>
                                <p><span>({{ $cat->total_careers() }})</span> open positions</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
@endsection

@section('customjs')
@endsection
