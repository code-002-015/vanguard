@extends('theme.'.env('FRONTEND_TEMPLATE').'.main')

@section('pagecss')
@endsection

@section('content')
<section id="section-content">
    <div class="content-wrap">

        <div class="container clearfix">
            <div class="style-msg successmsg mb-5">
                <div class="sb-msg">{{ $totalItems }} result(s) found</div>
            </div>

            @foreach($searchResult as $rs)
            <div class="search-item">
                <h4 class="mb-1"><a href="{{ url('/'.$rs->slug) }}" target="_blank">{{ $rs->name }}</a></h4>
                <div class="font-13 text-success mb-3">{{ url('/'.$rs->slug) }}</div>
            </div>
            @endforeach

            {{ $searchResult->appends(request()->input())->links('theme.'.env('FRONTEND_TEMPLATE').'.layout.pagination') }}
        </div>

    </div>
</section>
@endsection

@section('pagejs')
@endsection
