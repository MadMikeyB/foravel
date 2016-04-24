@extends('layouts.app_alt')

@section('title', $thread->title .' - '. $thread->forum->name .' -')

@section('breadcrumbs')
{!! Breadcrumbs::render('show_thread', $thread) !!}
@stop

@section('content')
<div class="content-padding">
	<div class="forum-block">
		<div class="content-padding">
			<div class="forum-description">
				<span><a href="#quick-reply" class="newdefbutton"><i class="fa fa-comment-o"></i>Post Reply</a></span>
				<div class="topic-right right">
					<span>{{ $thread->posts->count() }} {{ str_plural('reply', $thread->posts->count() ) }}</span>
				</div>
			</div>
		</div>

	<!-- BEGIN .forum-thread -->
	<div class="forum-thread">
	@unless( $thread->posts->isEmpty() )
		@foreach ( $thread->posts as $post )
	<!-- BEGIN .forum-post -->
		<div class="forum-post" id="post-{{ $post->id }}">
			<div class="user-block">
				<a href="/&#64;{{ $post->user->slug }}" class="avatar @if ( $post->user->isOnline() ) online @else offline @endif">
					<img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( $post->user->email ) ) ) }}?s=75" class="setborder" title="" alt="" />
				</a>
				<div class="user-account">
					<div>
						<a href="/&#64;{{ $post->user->slug }}" class="forum-user"><b>{{ $post->user->name }}</b></a>
					</div>
					<div>
						<span>XP: <strong class="rating-good">+{{ $post->user->xp->points }}</strong></span>
					</div>
					<div>
						<span><strong>{{ $post->user->forumposts->count() }}</strong> posts</span>
					</div>
				</div>
				<div class="clear-float"></div>
			</div>
			<div class="post-text-block">
				{!! $post->content !!}
				<div class="post-signature">
					<p>Sigs coming soon.{{-- $post->user->fields->signature --}}</p>
				</div>
			</div>
			<div class="post-meta-block">
				<div>
					<a href="#post-{{ $post->id }}">#{{ $post->id }}</a>
				</div>
				<div>
					<span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
				</div>
				<div>
					<a href="#" class="strike-tooltip" title="Positive"><i class="fa fa-thumbs-up rating-good"></i></a>
					<span class="the-rate rating-good">{{ $post->user->xp->points }}</span>
					<a href="#" class="strike-tooltip" title="Negative"><i class="fa fa-thumbs-down rating-bad"></i></a>
				</div>
				<div class="bottom">
					<a href="#" class="defbutton admin-color"><i class="fa fa-trash-o"></i></a>
					<a href="/forums/{{ $post->thread->forum->slug }}/{{ $post->thread->slug }}/replies/{{ $post->id }}/edit" class="defbutton admin-color"><i class="fa fa-pencil"></i></a>
					<a href="#quick-reply" class="defbutton scroll"><i class="fa fa-comment-o"></i>Reply</a>
				</div>
			</div>
			<!-- END .forum-post -->
		</div>
		@endforeach
		@endunless
	</div>
	@if ( Auth::user() )
	<div class="content-padding quick-reply" id="quick-reply">
		<div class="forum-description">
			<a href="#quick-reply" class="newdefbutton"><i class="fa fa-comment-o"></i>Quick reply</a>
		</div>
		<div class="reply-box">
			<div class="comment-avatar left">
				<a href="/&#64;{{ Auth::user()->slug }}" class="avatar big">
					<span class="wrapimg"><img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( Auth::user()->email ) ) ) }}?s=39" class="setborder" title="" alt=""></span>
				</a>
			</div>
			<div class="reply-textarea">
				<form action="/forums/{{ $thread->forum->slug }}/{{ $thread->slug }}" method="POST" role="form">
					{{ csrf_field() }}
					<div class="respond-textarea">
						<div class="textarea-arrow"></div>
						<div class="textarea-wrapper strike-wysiwyg-enable" rel="wys-current">
							<div class="bbcodes">
								<a href="#strike-bb" class="strike-bold"><i class="fa fa-bold strike-tooltip" title="Bold"></i></a>
								<a href="#strike-bb" class="strike-italic"><i class="fa fa-italic strike-tooltip" title="Italic"></i></a>
								<a href="#strike-bb" class="strike-strike"><i class="fa fa-strikethrough strike-tooltip" title="Strike"></i></a>
								<a href="#strike-bb" class="strike-underline"><i class="fa fa-underline strike-tooltip" title="Underline"></i></a>
								<a href="#strike-bb" class="strike-link"><i class="fa fa-chain strike-tooltip" title="Hyperlink"></i></a>
								<a href="#strike-bb" class="strike-photo"><i class="fa fa-picture-o strike-tooltip" title="Photo"></i></a>
								<a href="#strike-bb" class="strike-quote"><i class="fa fa-comment strike-tooltip" title="Quote"></i></a>
								<a href="#strike-bb" class="strike-yt"><i class="fa fa-youtube strike-tooltip" title="Youtube video"></i></a>
								<a href="#strike-bb" class="strike-code"><i class="fa fa-code strike-tooltip" title="Code"></i></a>
								<a href="#strike-bb-switch" class="right"><i class="fa fa-css3 strike-tooltip" title="Revelio WYSIWYG"></i></a>
							</div>
							<textarea name="content" id="content" rows="3" required="required"></textarea>
						</div>
					</div>
					<div class="respond-submit">
						<input type="submit" name="submit" value="Post Reply">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endif
@stop