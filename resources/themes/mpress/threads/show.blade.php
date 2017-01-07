@extends('layouts.app')
@section('title', $thread->title .' - '. $thread->forum->name .' -')

@section('content')
{!! Breadcrumbs::render('show_thread', $thread) !!}


<div class="page-header">
	<div class="pull-right">{{ $posts->links() }}</div>
	<h1>{{ $thread->title }}
	<small>{{ $thread->created_at->diffForHumans() }}</small></h1>
</div>

@unless( $thread->posts->isEmpty() )

	@foreach ( $posts as $post )
	<a id="post-{{$post->id}}"></a>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-3 col-xs-12">

			<div class="media">
			  <div class="media-left">
			    <a href="/&#64;{{ strtolower($post->user->name) }}">
			      <img class="media-object wrapimg" src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( $post->user->email ) ) ) }}?s=100" alt="Go to {{ $post->user->name }}'s profile">
			    </a>
			  </div>
			  <div class="media-body">
			    <h4 class="media-heading"><strong>{{ $post->user->name }}</strong>
				@if ( $post->user->isOnline() )
					<small><span class="user-online">Online</span></small>
				@else
					<small><span class="user-offline">Offline</span></small>
				@endif
				</h4>
				<p><strong>XP</strong>: +{{ $post->user->xp->points }}</p>
				<p><strong>Joined</strong>: {{ $post->user->created_at->format('d/m/Y') }}</p>
				<p><strong>Posts</strong>: {{ $post->user->forumposts->count() }} {{ str_plural('post', $post->user->forumposts->count()) }}</p>
			  </div>
			</div>

				{{-- <h3 style="margin-top: 0;">{{ $post->user->name }}</h3>
				<a href="/users/{{ $post->user->name }}" class="thumbnail">
					<img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( $post->user->email ) ) ) }}?s=150">
				</a>
				@if ( $post->user->isOnline() )
					<p><span class="user-online">Online</span></p>
				@else
					<p><span class="user-offline">Offline</span></p>
				@endif
				<p><strong>XP</strong>: +{{ $post->user->xp->points }}</p>
				<p><strong>Joined</strong>: {{ $post->user->created_at->format('d/m/Y') }}</p>
				<p><strong>Posts</strong>: {{ $post->user->forumposts->count() }} {{ str_plural('post', $post->user->forumposts->count()) }}</p> --}}


			</div>
			<div class="col-md-7 col-xs-12">
				{!! $post->content !!}
			</div>
		</div>
		<div class="panel-footer">
			<a href="" class="btn btn-default btn-xs" data-tooltip="Quote Post">
				<i class="fa fa-comment-o"></i>
			</a>
			<a href="/forums/{{ $post->thread->forum->slug }}/{{ $post->thread->slug }}/replies/{{ $post->id }}/edit" class="btn btn-default btn-xs" data-tooltip="Edit Post">
				<i class="fa fa-pencil"></i>
			</a>
			<a href="" class="btn btn-default btn-xs" data-tooltip="Report Post">
				<i class="fa fa-warning"></i>
			</a>
			<a href="" class="btn btn-default btn-xs" data-tooltip="Delete Post">
				<i class="fa fa-trash"></i>
			</a>

			<div class="pull-right">
				<span class="text-muted" data-tooltip="{{ $post->created_at }}">Posted {{ $post->created_at->diffForHumans() }}</span>
			</div>
		</div>
	</div>
	@endforeach

	{{ $posts->links() }}

	<a id="reply"></a>
	@if ( Auth::check() )
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-2 col-sm-2 col-xs-12">
				<a href="/users/{{ Auth::user()->name }}" class="thumbnail">
					<img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( Auth::user()->email ) ) ) }}?s=150">
				</a>

			</div>
			<div class="col-md-10 col-sm-10 col-xs-12">
				<form action="/forums/{{ $thread->forum->slug }}/{{ $thread->slug }}" method="POST" role="form">
					{{ csrf_field() }}
				
					<div class="form-group">
						<textarea name="content" id="input" class="form-control mp-editor" cols="3" required="required"></textarea>
					</div>
				
					<button type="submit" class="btn btn-primary">Add Reply</button>
				</form>
			</div>
		</div>
	</div>
	@endif



@endunless

@stop