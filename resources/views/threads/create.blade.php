@extends('layouts.app')

@section('content')

<div class="page-header">
  <h1>New thread
  	<small>{{ $forum->name }}</small>
  </h1>
</div>

<form action="/forums/{{ $forum->slug }}" method="POST" role="form">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" class="form-control" id="title" placeholder="I want to talk about...">
	</div>

	
	<div class="form-group">
		<label for="content">Content</label>
		<textarea name="content" id="input" class="form-control" rows="10" required="required" placeholder="See, the thing is.."></textarea>
	</div>

	

	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop