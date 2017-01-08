@extends('layouts.app')

@section('content')
<div class="jumbotron">
	<h2>{{$user->name}}</h2>
	<p>Member since @datetime($user->created_at)</p>
	@if ( Auth::user() )
	@can('follow-user', $user)
	<a href="#" class="btn btn-default" onclick="alert('coming soon')">Follow</a>
	@endcan
	@can('message-user', $user)
	<a href="#" class="btn btn-default" onclick="alert('coming soon')">Message</a>
	@endcan
	@can('edit-user', $user)
		<a href="&#64;{{ $user->slug }}/edit" class="btn btn-primary">Edit Profile</a>
	@endcan
	@endif
</div>

<div class="box">
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<h3>{{ $user->name }}'s Activity</h3>
			@foreach ( $user->forumposts()->paginate(10) as $post )
				<div class="list-group">
				  <a href="{{ url('/forums/' . $post->thread->forum->slug . '/' . $post->thread->slug . '/#post-' . $post->id ) }}" class="list-group-item">
				    <h4 class="list-group-item-heading">{{ $post->user->name }} posted in {{ $post->thread->title }}</h4>
				    <p class="list-group-item-text">{!! $post->content !!}</p>
				  </a>
				</div>
			@endforeach
		</div>
		<div class="col-md-6 col-xs-12">
			<h3>{{ $user->name }}'s Threads</h3>
			<ul>
			@foreach ( $user->threads as $thread )
				<li><a href="{{ url('/forums/' . $thread->forum->slug .'/'.$thread->slug) }}">{{ $thread->title }}</a></li>
			@endforeach
			</ul>
		</div>
	</div>
</div>
@stop
