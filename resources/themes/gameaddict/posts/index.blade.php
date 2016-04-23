@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('all_posts') !!}
@stop

@section('content')
@can('create-post', Auth::user())
	<a href="/posts/create" class="button button-big btn-block" style="text-align:center;margin-bottom:10px;" name="create_post"><i class="fa fa-plus"></i>Create Article</a>
@endcan

    @unless ( $posts->isEmpty() )
    @foreach ( $posts as $post )
    <div class="blog-post">
        <div class="blog-image right">
            @unless ( $post->images->isEmpty() )
                @foreach ( $post->images as $image )
                    <a href="/{{$image->image_path}}" target="_blank"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}"></a>
                @endforeach
            @else 
                <a href="/read/{{ $post->slug }}"><img src="https://source.unsplash.com/category/nature/weekly" alt="" title=""></a>
            @endunless
            <div class="blog-date">
                <span class="date">{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>

        <div class="blog-content ">
            <h2><a href="/read/{{ $post->slug }}">{{ $post->title }}</a></h2>
            <p>{!! Markdown::convertToHtml(strip_tags(str_limit($post->content, 155))) !!}</p>
        </div>

        <div class="blog-info">
            <div class="post-pinfo">
                <span class="icon-user"></span> <a href="/&#64;{{ $post->user->slug }}">{{ $post->user->name }}</a> &nbsp;
                <span class="icon-comment"></span>  <a data-original-title="{{ str_plural('Comment', $post->comments->count()) }}" href="/read/{{ $post->slug }}#discussion" data-toggle="tooltip">{{ $post->comments->count() }} {{ str_plural('Comment', $post->comments->count()) }}</a> &nbsp;
            </div>
            <a href="/read/{{ $post->slug }}" class="button-small">Read more</a>
            <div class="clear"></div>
        </div>
    </div>
    @endforeach
    @endunless
    {!! $posts->links() !!}
@stop