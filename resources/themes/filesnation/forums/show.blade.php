@extends('layouts.app_alt')

@section('title', $forum->name . ' -')

@section('breadcrumbs')
{!! Breadcrumbs::render('show_forum', $forum) !!}
@stop

@section('content')
<div class="content-padding">
	<div class="forum-block">
		<div class="content-padding">
			<div class="forum-description">
				<small>{!! $forum->description !!}</small>
				<a href="/forums/{{ $forum->slug }}/create" class="defbutton big right"><i class="fa fa-plus"></i>Create New Thread</a>
			</div>
		</div>
		<div class="forum-threads-head">
			<strong class="thread-subject"><span>Thread</span></strong>
			<strong class="thread-author">Author</strong>
			<strong class="thread-replies">Replies</strong>
			<strong class="thread-views">Views</strong>
			<strong class="thread-last">Latest Reply</strong>
		</div>
		<!-- BEGIN .forum-threads -->
		<div class="forum-threads">
			@unless( $forum->threads->isEmpty() )
			@foreach ( $forum->threads as $thread )

			<!-- BEGIN .thread-link -->
			<div class="thread-link">
				<a href="/forums/{{ $forum->slug }}/{{ $thread->slug }}">
					<i class="forum-icon">
						<i class="fa fa-comments"></i>
					</i>
					<span>{{ $thread->title }}</span>
				</a>
				<div class="thread-author">
					<span class="f-user-link"><a href="/&#64;{{ $thread->user->slug }}"><strong>{{ $thread->user->name }}</strong></a></span>
				</div>
				<div class="thread-replies">
					<span>{{ $thread->posts->count() }}</span>
				</div>
				<div class="thread-views">
					<span>xxx</span>
				</div>
				<div class="thread-last">
					<span class="f-user-link"><a href="/&#64;{{ $thread->posts->last()->user->slug }}"><strong>{{ $thread->posts->last()->user->name }}</strong></a></span>
					<span class="t-date">{{ $thread->updated_at->diffForHumans() }}</span>
				</div>
				<!-- END .thread-link -->
			</div>
			@endforeach
			@endunless
			<!-- END .forum-threads -->
		</div>
		<div class="content-padding">
			<div class="forum-description">
				<div class="pagination right">
					<span class="page-num current">1</span>
					<a href="#" class="page-num">2</a>
					<a href="#" class="page-num">3</a>
					<a href="#" class="page-num">4</a>
					<span class="page-num page-hidden">...</span>
					<a href="#" class="page-num">42</a>
				</div>

				<a href="/forums/{{ $forum->slug }}/create" class="defbutton big"><i class="fa fa-plus"></i>Create New Thread</a>
			</div>
		</div>

	</div>
</div>

@stop