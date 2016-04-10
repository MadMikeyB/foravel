@extends('layouts.app')
@section('content')
{!! Breadcrumbs::render('show_thread', $thread) !!}

<div class="page-header">
  <h1>{{ $thread->title }}
  <small>{{ $thread->created_at->diffForHumans() }}</small></h1>
</div>

@unless( $thread->posts->isEmpty() )

	@foreach ( $thread->posts as $post )
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-2 col-sm-2 col-xs-12">
				<h2>{{ $post->user->name }}</h2>
				<a href="/users/{{ $post->user->name }}" class="thumbnail">
					<img src="http://placehold.it/300x300">
				</a>
			</div>
			<div class="col-md-10 col-sm-10 col-xs-12">
				{!! $post->content !!}
			</div>
		</div>
	</div>
	@endforeach

	<form action="/forums/{{ $thread->forum->slug }}/{{ $thread->slug }}" method="POST" role="form">
		{{ csrf_field() }}
		<legend>Reply</legend>
	
		<div class="form-group">
			<label for="content">Reply</label>
			<textarea name="content" id="input" class="form-control" rows="3" required="required"></textarea>
		</div>
	
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

@endunless

@stop