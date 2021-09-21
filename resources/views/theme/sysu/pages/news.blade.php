@extends('theme.'.env('FRONTEND_TEMPLATE').'.main')

@section('pagecss')
    <link rel="stylesheet" href="{{ asset('theme/sysu/plugins/jssocials/jssocials.css') }}" />
    <link rel="stylesheet" href="{{ asset('theme/sysu/plugins/jssocials/jssocials-theme-flat.min.css') }}" />
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
                        <h3>News</h3>
                    </div>

                    <div class="tab-content clearfix">
                        <div id="popular-post-list-sidebar">
                            @foreach($latestArticles as $latest)
                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        @if($latest->thumbnail_url)
                                            <a href="{{ route('news.front.show',$latest->slug) }}" class="nobg"><img class="rounded-circle" src="{{ $latest->thumbnail_url }}" alt="..."></a>
                                        @else
                                            <a href="{{ route('news.front.show',$latest->slug) }}" class="nobg"><img class="rounded-circle" src="{{ asset('storage/news_image/news_thumbnail/No_Image_Available.jpg')}}" alt="no image"></a>
                                        @endif
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="{{ route('news.front.show',$latest->slug) }}">{{ $latest->name }}</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li><i class="icon-calendar3"></i> {{ date('F d, Y',strtotime($latest->date)) }} <!-- 10th July 2014 --></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">

                <div class="heading-block">
                    <h3>{{ $news->name }}</h3>
                </div>

                <div class="entry clearfix">
                    <ul class="entry-meta clearfix">
                        <li><i class="icon-calendar3"></i> Posted {{ Setting::date_for_news_list($news->date) }}, by<span class="article-meta-author"><strong> {{$news->user->name}}</strong></span></li>
                    </ul>

                    @if($news->image_url)
                        <div class="entry-image">
                            <a href="#" class="news-post-image"><img src="{{ $news->image_url }}" alt="..."></a>
                        </div>
                    @endif

                    <div class="entry-content notopmargin">
                        {!! $news->contents !!}

                        
                        <div class="clear"></div>
                        <br>
                        <div class="si-share noborder clearfix">
                            <span>Share this Post:</span>
                            <div>
                                <a href="#" class="social-icon si-borderless si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon si-borderless si-email3">
                                    <i class="icon-email3"></i>
                                    <i class="icon-email3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <!-- <div class="modal fade" id="email-article" tabindex="-1" role="dialog" aria-labelledby="email-article" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">E-mail this article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form id="shareEmailForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="form_email_to" type="email" name="email_to" class="form-control" placeholder="Email to" required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input id="form_recipient_name" type="text" name="name" class="form-control" placeholder="Recipient's Name" required="required">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input id="form_email_from" type="email" name="email_from" class="form-control" placeholder="Your email address" required="required" data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input id="form_name" type="text" name="sender_name" class="form-control" placeholder="Your name" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="btnSendArticle"><span id="spanSendArticle">Send Article</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <!-- <div class="modal fade" id="email-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">E-mail this article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Article successfully sent!
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div class="modal fade" id="email-failed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">E-mail this article</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   Failed to share email. Try it again later.
               </div>
           </div>
       </div>
    </div> -->
@endsection

@section('pagejs')
    <script src="{{ asset('theme/sysu/plugins/jssocials/jssocials.js') }}"></script>
    <script src="{{ asset('theme/sysu/plugins/jssocials/jssocials-extension.js') }}"></script>
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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('#frm_search').on('submit', function(e) {
            e.preventDefault();
            window.location.href = "{{route('news.front.index')}}?type=searchbox&criteria="+$('#searchtxt').val();
        });

        // $('#shareEmailForm').submit(function(evt) {
        //     evt.preventDefault();
        //     let data = $('#shareEmailForm').serialize();

        //     $('#spanSendArticle').html('Sending...');
        //     $('#btnSendArticle').prop('disabled',true);
            
        //     $.ajax({
        //         data: data,
        //         type: "POST",
        //         url: "{{ route('news.front.share', $news->slug) }}",
        //         success: function(returnData) {
        //             $('#email-success').modal('show');
        //             $('#email-article').modal('hide');
        //             $('#email-article input').val('');
        //         },
        //         error: function(){
        //             $('#email-failed').modal('show');
        //             $('#email-article').modal('hide');
        //             $('#email-article input').val('');
        //         }
        //     });
        //     return false;
        // });
    });
</script>
@endsection
