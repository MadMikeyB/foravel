@extends('layouts.app')

@section('title', $forum->name . ' -')

@section('content')
{!! Breadcrumbs::render('show_forum', $forum) !!}

<div class="page-header">
  <h1>{{ $forum->name }}
  <small>{{ $forum->description }}</small></h1>
</div>

<div class="row">
	<div class="col-md-12">
			<a href="/forums/{{ $forum->slug }}/create" class="btn btn-primary btn-block">New Thread</a>
	</div>
</div>
<br>

@unless( $forum->threads->isEmpty() )

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<h1 class="panel-title">Title</h1>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<h1 class="panel-title">Author</h1>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<h1 class="panel-title">Replies</h1>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<h1 class="panel-title">Latest Reply</h1>
		</div>
	</div>
	@foreach ( $forum->threads as $thread )
	<div class="panel-body @if ( $thread->status == 'pinned')thread-unread thread-sticky @endif 
			@if ( $thread->status == 'locked')thread-locked @endif"">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<a href="/forums/{{ $forum->slug }}/{{ $thread->slug }}"><strong>{{ $thread->title }}</strong></a>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<a href="/&#64;{{ $thread->user->slug }}">{{ $thread->user->name }}</a>
			
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<span class="text-muted">{{ $thread->posts->count() }} {{ str_plural('reply', $thread->posts->count() ) }}</span>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="media">
				  <div class="media-right">
				   <a href="/forums/{{ $forum->slug }}/{{ $thread->slug }}/#post-{{ $thread->posts->last()->id }}">
				      <img class="media-object wrapimg" src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( $thread->posts->last()->user->email ) ) ) }}?s=45" alt="{{ $thread->title }} - last post by {{ $thread->posts->last()->user->name }}">
				    </a>
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading">
				    	<a href="/forums/{{ $forum->slug }}/{{ $thread->slug }}/#post-{{ $thread->posts->last()->id }}">
				    		{{ $thread->updated_at->diffForHumans() }}
				    	</a>
				    </h4>
					<small class="text-muted">
						<a href="/&#64;{{ $thread->posts->last()->user->slug }}">
							<strong>by {{ $thread->posts->last()->user->name }}</strong>
						</a>
					</small>
				  </div>
				</div>

		</div>
	</div>
	@endforeach
</div>

@else
<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-8 col-sm-10 col-xs-12">
			<h1 class="panel-title">Thread Title</h1>
		</div>
		<div class="col-md-4 col-sm-2 col-xs-12">
			<h1 class="panel-title">Last Post</h1>
		</div>
	</div>
	<div class="panel-body">
		<div class="col-md-8 col-sm-10 col-xs-12">
			<p>No threads have been created yet. :(</p>
		</div>
		<div class="col-md-4 col-sm-2 col-xs-12">
			<a href="/forums/{{ $forum->slug }}/create" class="btn btn-primary btn-block">Be the First!</a>
		</div>
	</div>	
</div>


@endunless
@stop