@extends('layouts.app')

@section('title', 'Create Thread in '. $forum->name .' -')


@section('content')
{!! Breadcrumbs::render('edit_post', $thread) !!}

<div class="page-header">
  <h1>Edit Post in
  	<small>{{ $thread->title }}</small>
  </h1>
</div>

<form action="/forums/{{ $forum->slug }}/{{ $thread->slug }}/replies/{{ $forumpost->id }}" method="POST" role="form">
	{{ csrf_field() }}
	
	<div class="form-group">
		<label for="content"></label>
		<textarea name="content" id="input" class="form-control mp-editor" cols="3" required="required">
			{!! $forumpost->content !!}
		</textarea>
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop