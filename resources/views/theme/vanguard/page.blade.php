@extends('theme.'.env('FRONTEND_TEMPLATE').'.main')

@section('content')
    <section id="section-content">
        <div class="content-wrap">
            <div class="container clearfix position-static">
            
                <div class="row">
                    <span onclick="closeNav()" class="dark-curtain"></span>
                    <div class="col-lg-12 col-md-5 col-sm-12">
                        <span onclick="openNav()" class="button noleftmargin d-lg-none mb-4"><span class="icon-chevron-left mr-2"></span> Filter</span>
                    </div>

                    @if($parentPage)
                        <div class="col-lg-3">
                            <div class="tablet-view">
                                <a href="javascript:void(0)" class="closebtn d-block d-lg-none" onclick="closeNav()">&times;</a>
                                <h4 class="font-weight-bold">{{ $parentPage->name }}</h4>
                                <div class="side-menu">
                                    <ul>
                                        @foreach($parentPage->sub_pages as $subPage)
                                            <li @if($subPage->id == $page->id) class="active" @endif>
                                                <a href="{{ $subPage->get_url() }}"><div>{{ $subPage->name }}</div></a>
                                                @if ($subPage->has_sub_pages())
                                                    <ul>
                                                        @foreach ($subPage->sub_pages as $subSubPage)
                                                        <li @if ($subSubPage->id == $page->id) class="active" @endif>
                                                            <a href="{{ $subSubPage->get_url() }}"><div>{{ $subSubPage->name }}</div></a>
                                                            @if ($subSubPage->has_sub_pages())
                                                            <ul>
                                                                @foreach ($subSubPage->sub_pages as $subSubSubPage)
                                                                    <li @if ($subSubSubPage->id == $page->id) class="active" @endif>
                                                                        <a href="{{ $subSubSubPage->get_url() }}"><div>{{ $subSubSubPage->name }}</div></a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-9">
                            {!! $page->contents !!}
                        </div>
                    @else
                        <div class="col-lg-12">
                            {!! $page->contents !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
