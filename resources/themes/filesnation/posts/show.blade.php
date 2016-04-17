@extends('layouts.app') @section('content')
	<h2><span>{{ $post->title }}</span></h2>
	<div class="article-full">
		<div class="article-main-photo">
			@if ( $post->image ) <img alt=
			"{{ $post->title }} &mdash; {{ Setting::get('site_title', 'MPress') }}"
			src="{{$post->image}}"> @endif
		</div>
		<div class="article-icons">
			<a class="user-tooltip" href=
			"/&#64;{{$post->user->slug}}"><i class="fa fa-fire"></i>{{
			$post->user->name }}</a> <a href="#"><i class="fa fa-calendar"></i> {{
			$post->created_at->diffForHumans() }}</a> <a class="show-likes" href=
			"#"><i class="fa fa-heart"></i>20 likes</a>
		</div>
		<div class="clear-float do-the-split"></div>
		<div class="article-content">
			{!! $post->content !!}
		</div>
	</div>
	<h2><span>Comments ({{ $post->comments->count() }})</span></h2>
	<!-- BEGIN .content-padding -->
	<div class="content-padding">
		<div class="comment-part">
			<!-- BEGIN #comments -->
			<ol id="comments">
				@unless ( $post->comments->isEmpty() )
				@foreach ( $post->comments as $comment )
				<li>
					<div class="comment-inner">
						<div class="comment-avatar"><img alt="{{ $comment->user->name }}"
						src=
						"http://www.gravatar.com/avatar/{{md5(strtolower(trim($comment->user->email)))}}"></div>
						<div class="comment-content">
							<div class="comment-header">
								<h3><a href="/&#64;{{$comment->user->slug}}">{{
								$comment->user->name }}</a></h3>
							</div>
							<p>{!! $comment->body !!}</p>@can( 'create-comment', $comment)
							<a class="comment-reply-link post-a" href="#reply"><i class=
							"fa fa-comment"></i><strong>Reply</strong></a> @endcan <span class=
							"post-a"><i class="fa fa-calendar-o"></i> {{
							$comment->created_at->diffForHumans() }}</span>
						</div>
					</div>
					@endforeach 
					@endunless 
					<!-- #comment-## -->
				</li>
			</ol>
			<div class="comments-pager">
				{{-- $post->comments->links() --}}
			</div>
			@can('create-comment', $post)
			<div class="comment-form">
				<a href="#" id="reply" name="reply"></a>
				<div class="comment-respond" id="respond">
					<form action="/posts/{{$post->slug}}/comments" class=
					"comment-form" id="commentform" method="post" name="commentform" role=
					"form">
						{{ csrf_field() }}
						<p class="form-comment"><label for="comment">Comment:<span class=
						"required">*</span></label> 
						<textarea aria-required="true" id="body" name="body" placeholder=
						"Comment Text" type="text"></textarea></p>
						<p class="form-submit"><input class="button" id="submit" name="submit"
						type="submit" value="Post Comment"></p>
					</form>
				</div><!-- #respond -->
			</div>
			@endcan
		</div><!-- END .content-padding -->
	</div>
@stop 

@section('scripts')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" property="stylesheet" rel="stylesheet" type="text/css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js" type="text/javascript"></script> 
@stop
