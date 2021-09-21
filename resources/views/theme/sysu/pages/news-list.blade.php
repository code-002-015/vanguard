@extends('theme.'.env('FRONTEND_TEMPLATE').'.main')
@section('pagecss')

@endsection
@section('content')
<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <span onclick="openNav()" class="d-lg-none mb-4 btn btn-primary btn-bg"><i class="icon-list-alt"></i></span>

                <div id="mySidenav">
                  <a href="javascript:void(0)" class="closebtn d-lg-none" onclick="closeNav()">&times;</a>

                  <div class="heading-block">
                    <h3>Search</h3>
                  </div>
                    <form id="frm_search">
                      <div class="input-group pb-5">
                        <input type="text" name="searchtxt" id="searchtxt" class="form-control" placeholder="Search news" aria-label="Search news" aria-describedby="button-addon2" />
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" name="submit" id="button-addon2"><span class="icon-search"></span></button>
                        </div>
                      </div>
                    </form>
                  <div class="heading-block">
                    <h3>Category</h3>
                  </div>
                  {!! $categories !!}

                  <div class="heading-block">
                    <h3>Archive</h3>
                  </div>
                  {!! $dates !!}

                </div>
            </div>
            <div class="col-lg-9">
                @if(isset($_GET['type']))
                    @if($_GET['type'] == 'searchbox')
                        @if($totalSearchedArticle > 0)
                        <div class="style-msg successmsg">
                            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Woo hoo!</strong> We found <strong>(<span>{{ $totalSearchedArticle }}</span>)</strong> matching results.</div>
                        </div>
                        @else
                        <div class="style-msg2 errormsg">
                            <div class="msgtitle p-0 border-0">
                                <div class="sb-msg">
                                    <i class="icon-thumbs-up"></i><strong>Uh oh</strong>! <span><strong>{{ app('request')->input('criteria') }}</strong></span> you say? Sorry, no results!
                                </div>
                            </div>
                            <div class="sb-msg">
                                <ul>
                                    <li>Check the spelling of your keywords.</li>
                                    <li>Try using fewer, different or more general keywords.</li>
                                </ul>
                            </div>
                        </div>
                        @endif
                    @endif
                @endif

                <br>

                @foreach($articles as $article)
                    <div class="small-thumbs">
                        <div class="entry clearfix">
                            <div class="entry-image pb-4">
                                @if($article->thumbnail_url)
                                    <a href="{{ route('news.front.show',$article->slug) }}" class="image_fade"><img src="{{ $article->thumbnail_url }}" alt="..."></a>
                                @else
                                    <a href="{{ route('news.front.show',$article->slug) }}" class="image_fade"><img src="{{ asset('storage/news_image/news_thumbnail/No_Image_Available.jpg')}}" alt="no image"></a>
                                @endif
                            </div>
                            <div class="entry-c pb-3">
                                <div class="entry-title">
                                    <h2><a href="{{ route('news.front.show',$article->slug) }}">{{ $article->name }}</a></h2>
                                </div>
                                <ul class="entry-meta clearfix pb-3">
                                    <li><i class="icon-calendar3"></i> {{ Setting::date_for_news_list($article->created_at) }}</li>
                                </ul>
                                <div class="entry-content">
                                    <p>{{ $article->teaser }}</p>
                                    <a href="{{ route('news.front.show',$article->slug) }}"class="more-link">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $articles->links('theme.'.env('FRONTEND_TEMPLATE').'.layout.pagination') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
@endsection

@section('customjs')
    <script>
        var navikMenuListDropdown = $(".side-menu ul li:has(ul)");

        navikMenuListDropdown.each(function() {
            $(this).append('<span class="dropdown-append"></span>');
        });

        $(".side-menu .active").each(function() {
            $(this).parents("ul").css("display", "block");
            $(this).parents("ul").prev("a").css("color", "#00bfca");
            $(this).parents("ul").next(".dropdown-append").addClass("dropdown-open");
        });

        $(".dropdown-append").on("click", function() {
            $(this).prev("ul").slideToggle(300);
            $(this).toggleClass("dropdown-open");
        });
    </script>
    <script>
        $(function() {
            $('#frm_search').on('submit', function(e) {
                e.preventDefault();
                window.location.href = "{{route('news.front.index')}}?type=searchbox&criteria="+$('#searchtxt').val();
            });
        });
    </script>
@endsection
