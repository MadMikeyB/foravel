@extends('layouts.app_profile')

@section('hero')
{{-- 
				<section id="banner">
					<h2>{{$user->name}}</h2>
					<p>Member since @datetime($user->created_at)</p>
					@if ( Auth::user() )
					<ul class="actions">
						<li><a href="#" class="button small special">Follow</a></li>
						<li><a href="#" class="button small ">Message</a></li>
						@can('edit-user', $user)
						<li><a href="&#64;{{ $user->slug }}/edit" class="button small special">Edit Profile</a></li>
						@endcan
					</ul>
					@endif
				</section> --}}
@stop

@section('content')
<div class="game-info-left">
	<img itemprop="image" src="http://www.gravatar.com/avatar/{{md5(strtolower(trim($user->email)))}}?s=220" class="game-poster" alt="" />
	<div class="game-info-details">
		<div class="game-info-buttons">
			<a href="#" class="defbutton green"><i class="fa fa-plus"></i>Follow {{ $user->name }}</a>
			<a href="#" class="defbutton"><i class="fa fa-envelope"></i>Message {{ $user->name }}</a>
		</div>
		<div class="game-info-graph">
			<div>
				<span>Join Date</span>
				<strong itemprop="datePublished" content="{{ $user->created_at }}">{{ $user->created_at->diffForHumans() }}</strong>
			</div>
			<div>
				<span>Article Count</span>
				<strong>{{ $user->posts->count() }}</strong>
			</div>
			<div>
				<span>Forum Post Count</span>
				<strong>{{ $user->forumposts->count() }}</strong>
			</div>
			<div>
				<span>Comment Count</span>
				<strong>{{ $user->comments->count() }}</strong>
			</div>
		</div>
		{{-- Use this for followers --}}
		{{-- <div class="pegi">
			<img src="images/pegi/pegi-18.gif" class="pegi-age left strike-tooltip" title="Recomended 18+" alt="" />
			<div class="pegi-desc">
				<img src="images/pegi/bad-language.gif" class="pegi-tool strike-tooltip" title="Bad language" alt="" />
				<img src="images/pegi/discrimination.gif" class="pegi-tool pegi-disabled" alt="" />
				<img src="images/pegi/drugs.gif" class="pegi-tool pegi-disabled" alt="" />
				<img src="images/pegi/fear.gif" class="pegi-tool pegi-disabled" alt="" />
				<img src="images/pegi/gambling.gif" class="pegi-tool pegi-disabled" alt="" />
				<img src="images/pegi/online.gif" class="pegi-tool strike-tooltip" title="Multiplater" alt="" />
				<img src="images/pegi/sex.gif" class="pegi-tool pegi-disabled" alt="" />
				<img src="images/pegi/violence.gif" class="pegi-tool strike-tooltip" title="Violence" alt="" />
			</div>
			<div class="clear-float"></div>
		</div> --}}
	</div>
</div>
{{--  End left Sidebar --}}

<div class="game-info-right">
	<div class="game-menu" style="border-bottom: 5px solid #921913;">
		<div class="game-overlay-info">
			<h1>{{ $user->name }}</h1>
			<span>Last Active {{ $user->updated_at->diffForHumans() }}</span>
		</div>
		{{-- Tabs --}}
		<ul>
			<li class="active" style="background-color: #921913;"><a href="#"><i class="fa fa-file"></i> Wall</a></li>
			<li><a href="#"><i class="fa fa-user"></i> About Me</a></li>
			<li><a href="#"><i class="fa fa-star"></i> Recent Activity</a></li>
			<li><a href="#"><i class="fa fa-comments"></i> Articles</a></li>
			<li><a href="#"><i class="fa fa-trophy"></i> Achievements</a></li>
		</ul>
		{{-- / Tabs --}}
	</div>
	<h2><span>Comments (1)</span></h2>
	<!-- BEGIN .content-padding -->
	<div class="content-padding">
		<div class="comment-part">
			<!-- BEGIN #comments -->
			<ol id="comments">
				<li>
					<div class="comment-inner">
						<div class="comment-avatar">
							<img src="http://www.gravatar.com/avatar/{{md5(strtolower(trim($user->email)))}}?s=73" alt="{{ $user->name }}">
						</div>
						<div class="comment-content">
							<div class="comment-header">
								<h3><a href="/&#64;{{ $user->slug }}">{{ $user->name }}</a></h3>
							</div>
							<p>I like this profile.</p>
							<a class="comment-reply-link post-a" href="#"><i class="fa fa-comment"></i><strong>Reply</strong></a>
							<span class="post-a"><i class="fa fa-calendar-o"></i> {{ $user->created_at->diffForHumans() }}</span>
						</div>
					</div>
					<!-- #comment-## -->
				</ol>
			@can('create-comment', $user)
			<div class="comment-form">
				<a href="#" id="reply" name="reply"></a>
				<div class="comment-respond" id="respond">
					<form action="/&#64;{{$user->slug}}/comments" class=
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
		</div>
		<!-- END .content-padding -->
	</div>
</div>
<div class="clear-float"></div>
@stop
