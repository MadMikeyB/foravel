@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('home') !!}
@stop

@section('content')
<h2><span>Latest News</span></h2>
    @unless ( $posts->isEmpty() )
    @foreach ( $posts as $post )
    <div class="article-promo">
        <div class="article-photo">
            <span class="article-image-out">
                <span class="image-comments"><span>{{ $post->comments->count() }}</span></span>
                <span class="article-image">
                    <span class="nth1 strike-tooltip" title="Read Article">
                        <a href="/read/{{ $post->slug }}"><i class="fa fa-eye"></i></a>
                    </span>
                    <span class="nth2 strike-tooltip" title="Save to read later">
                        <a href="#"><i class="fa fa-plus"></i></a>
                    </span>
                    @unless ( $post->images->isEmpty() )
                        @foreach ( $post->images as $image )
                            <a href="/{{$image->image_path}}" target="_blank"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}"></a>
                        @endforeach
                    @else 
                        <a href="/read/{{ $post->slug }}"><img src="https://source.unsplash.com/category/nature/weekly" alt="" title=""></a>
                    @endunless
                </span>
            </span>
        </div>
        <div class="article-content">
            <h3><a href="/read/{{ $post->slug }}">{{ $post->title }}</a></h3>
            <div class="article-icons">
                <a href="/&#64;{{ $post->user->slug }}" class="user-tooltip"><i class="fa fa-fire"></i>{{ $post->user->name }}</a>
                <a href="#"><i class="fa fa-calendar"></i>{{ $post->created_at->diffForHumans() }}</a>
            </div>
            <p>{!! Markdown::convertToHtml(strip_tags(str_limit($post->content, 155))) !!}</p>
            <a href="/read/{{ $post->slug }}" class="defbutton"><i class="fa fa-reply"></i>Read full article</a>
        </div>
    </div>
    <div class="clear-float do-the-split"></div>
    @endforeach
    @endunless

    <div class="clear-float do-the-split" style="margin-bottom:5px;"></div>
    <div>
        <a href="/posts" class="defbutton"><i class="fa fa-book"></i>View more articles</a>
    </div>
@endsection
