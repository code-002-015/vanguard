@extends('theme.'.env('FRONTEND_TEMPLATE').'.main')

@section('pagecss')
@endsection

@php
    $contents = $page->contents;

    $featuredArticles = \App\Article::where('is_featured', 1)->where('status', 'Published')->get();

    if ($featuredArticles->count()) {

        $featuredArticlesHTML = '';
        foreach ($featuredArticles as $index => $article) {
            $imageUrl = (empty($article->thumbnail_url)) ? asset('theme/'.env('FRONTEND_TEMPLATE').'/images/misc/no-image.jpg') : $article->thumbnail_url;

            $featuredArticlesHTML .= '<div class="oc-item home-news shadow-sm rounded overflow-hidden text-center">
                <div class="ipost clearfix">
                    <div class="entry-image m-0">
                        <a href="'. $article->get_url() .'" data-lightbox="image">
                            <img class="image_fade" src="'. $imageUrl .'" alt="Card image cap">
                        </a>
                    </div>
                    <div class="entry-title pt-4 px-2">
                        <h3><a href="'. $article->get_url() .'">'. $article->name .'</a></h3>
                    </div>
                    <ul class="entry-meta clearfix d-flex justify-content-center pb-4">
                        <li><i class="icon-calendar3"></i> '. $article->date_posted() .'</li>
                    </ul>
                </div>
            </div>';

            if (\App\Article::has_featured_limit() && $index >= env('FEATURED_NEWS_LIMIT')) {
                break;
            }
        }

        $contents = str_replace('{Featured Articles}', $featuredArticlesHTML, $contents);

    } else {
        $contents = str_replace('{Featured Articles}', '', $contents);
    }
@endphp

@section('content')
    {!! $contents !!}
@endsection

@section('pagejs')
@endsection

@section('customjs')
@endsection
