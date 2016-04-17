@extends('layouts.app')

@section('breadcrumbs')
{!! Breadcrumbs::render('forum') !!}
@stop

@section('content')
<div class="forum-block">
	{{--  Forum Notice Could Go Here.. --}}
		<div class="content-padding">
			<div class="forum-description">
{{-- 				<p>Lorem ipsum dolor sit amet, qui ne stet modus, vim novum voluptatum an. Mea dicant diceret ex, alienum nominati quaestio te ius. At aeque dolorem comprehensam per. Possim similique posidonium mel ex, est ei adhuc vocibus concludaturque, vix mazim eirmod constituam an. Ea eam iusto euismod admodum, ea pri sint utamur graecis, eum ad modus nostro.</p>
 --}}				<a href="#comingsoon" class="defbutton"><i class="fa fa-comment-o"></i>Newest forum threads</a>
				<a href="#comingsoon" class="defbutton"><i class="fa fa-fire"></i>Popular forum threads</a>
			</div>
		</div>
	{{-- /Forum Notice --}}

	<!-- BEGIN .forum-group -->
	<div class="forum-group">
		@unless ( $forums->isEmpty() )
		@foreach ( $forums as $forum )
		@if ( $forum->parent == '0')
			<h2><span>{{ $forum->name }}</span></h2>
		@else
		<!-- BEGIN .forum-link -->
		<div class="forum-link">
			<a href="/forums/{{$forum->slug }}">
				<i class="forum-icon new">
					<span>new</span>
					<i class="fa fa-comments-o"></i>
				</i>
				<strong>{{ $forum->name }}</strong>
				<span>{{ $forum->description }}</span>
			</a>
			<div class="right">
				<div class="forum-numbers">
					<span>{{ $forum->threads->count() }} {{ str_plural('Thread', $forum->threads->count() ) }}</span>
					<span>{{ $forum->threads->last()->posts->count() }} {{ str_plural('Reply', $forum->threads->last()->posts->count() ) }}</span>
				</div>
				<div class="forum-recent">
					<a href="/forums/{{$forum->slug }}" class="avatar online user-tooltip">
						<span class="wrapimg"><img src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( $forum->threads->last()->user->email ) ) ) }}?s=39" class="setborder" title="" alt=""></span>
					</a>
					<span>
						<a href="/forums/{{ $forum->slug }}/{{ $forum->threads->last()->slug }}">{{ $forum->threads->last()->title }}.</a>
						<span class="f-date">{{ $forum->updated_at->diffForHumans() }}</span>
						<span class="f-user-link"><a href="user-single.html"><strong>{{ $forum->threads->last()->user->name }}</strong></a></span>
					</span>
				</div>
			</div>
			<!-- END .forum-link -->
		</div>
		@endif
		@endforeach
		@endunless
		<!-- END .forum-group -->
	</div>
</div>

@stop
