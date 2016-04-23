@extends('layouts.app')

@section('breadcrumbs')
    {!! Breadcrumbs::render('home') !!}
@stop

@section('content')
    <ul class="newsbh">
    @unless ( $posts->isEmpty() )
    @foreach ( $posts as $post )
        <li class="newsbh-item">
            <div class="newsb-thumbnail">
                <a rel="bookmark" href="/read/{{ $post->slug }}">
                    @unless ( $post->images->isEmpty() )
                        @foreach ( $post->images as $image )
                            <a href="/{{$image->image_path}}" target="_blank"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}"></a>
                        @endforeach
                    @else 
                        <a href="/read/{{ $post->slug }}"><img src="https://source.unsplash.com/category/nature/weekly" alt="" title=""></a>
                    @endunless
                    <span class="overlay-link"></span>
                </a>
            </div>
            <h4 class="newsb-title"><a rel="bookmark" href="/read/{{ $post->slug }}">{{ $post->title }}</a></h4>
            <p class="post-meta"><i class="icon-calendar"></i> {{ $post->created_at->diffForHumans() }} - <i class="icon-comment"></i> {{ $post->comments->count() }} {{ str_plural('comment', $post->comments->count()) }}</p>
        </li>
    @endforeach
    @endunless
    </ul>
    <div class="clear"></div>

@endsection
