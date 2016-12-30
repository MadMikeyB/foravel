@extends('layouts.app')

@section('content')
{!! Breadcrumbs::render('forum') !!}

<div class="page-header">
  <h1>{{ Setting::get('site_title', 'Foravel') }}
  <small></small></h1>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-6 col-xs-12">
			<h1 class="panel-title">Forum Name</h1>
		</div>
		<div class="col-md-3 col-xs-12">
			<h1 class="panel-title"></h1>
		</div>
		<div class="col-md-3 col-xs-12">
			<h1 class="panel-title">Last Post</h1>
		</div>
	</div>

	@foreach ( $forums as $forum )
		@if ( $forum->parent == '0')
		<div class="panel-heading">
			<h3 class="panel-title">{{ $forum->name }}</h3>
		</div>
		@else
		<div class="panel-body">
			<div class="col-md-6 col-xs-12">
				<h2 class="panel-title"><a href="/forums/{{$forum->slug }}">{{ $forum->name }}</a></h2><p class="text-muted">{{ $forum->description }}</p>
			</div>
			<div class="col-md-3 col-xs-12">
				<span class="text-muted">{{ $forum->threads->count() }} {{ str_plural('Thread', $forum->threads->count() ) }}</span><br>
				@if ( $forum->threads->last() )
					<span class="text-muted">{{ $forum->threads->last()->posts->count() }} {{ str_plural('Reply', $forum->threads->last()->posts->count() ) }}</span>				
				@else
					<span class="text-muted">0 Replies</span>
				@endif
			</div>
			<div class="col-md-3 col-xs-12">
				@if ( $forum->threads->last() )
				<div class="media">
				  <div class="media-right">
				    <a href="/forums/{{ $forum->slug }}/{{ $forum->threads->last()->slug }}" class="avatar @if ( $forum->threads->last()->user->isOnline() ) online @else offline @endif">
				      <img class="media-object wrapimg" src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( $forum->threads->last()->user->email ) ) ) }}?s=50" alt="{{ $forum->threads->last()->title }} - last post by {{ $forum->threads->last()->user->name }}">
				    </a>
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading"><a href="/forums/{{ $forum->slug }}/{{ $forum->threads->last()->slug }}">{{ $forum->threads->last()->title }}</a></h4>
						<small class="text-muted">{{ $forum->updated_at->diffForHumans() }}</small>
						<small class="text-muted"><a href="/&#64;{{ $forum->threads->last()->user->slug }}"><strong>{{ $forum->threads->last()->user->name }}</strong></a></small>
				  </div>
				</div>
				@endif
			</div>
		</div>
		@endif
	@endforeach
</div>
@stop
