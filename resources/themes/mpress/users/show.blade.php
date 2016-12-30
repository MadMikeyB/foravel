@extends('layouts.app')

@section('content')
<div class="jumbotron">
	<h2>{{$user->name}}</h2>
	<p>Member since @datetime($user->created_at)</p>
			@if ( Auth::user() )
			<a href="#" class="btn btn-default">Follow</a>
			<a href="#" class="btn btn-default">Message</a>
			@can('edit-user', $user)
				<a href="&#64;{{ $user->slug }}/edit" class="btn btn-primary">Edit Profile</a>
			@endcan
			@endif
</div>

<div class="box">
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<h3>{{ $user->name }}'s Posts</h3>
			<ul>
			@foreach ( $user->posts as $post )
				<li><a href="{{ url('read', $post->slug) }}">{{ $post->title }}</a></li>
			@endforeach
			</ul>
		</div>
		<div class="col-md-6 col-xs-12">
			<h3>{{ $user->name }}'s Comments</h3>
			@foreach ( $user->comments as $comment )
				<cite><a href="{{ url('read', $comment->post->slug) }}">{{ $comment->post->title }}</a></cite>
				<blockquote>{!! Markdown::convertToHtml(str_limit($comment->body, 80)) !!}</blockquote>
			@endforeach
		</div>
	</div>
</div>
@stop
