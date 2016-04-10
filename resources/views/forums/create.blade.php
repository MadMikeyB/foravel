@extends('layouts.app')

@section('content')

<form action="/forums" method="POST" role="form">
	{!! csrf_field() !!}
	<legend>Create a Forum</legend>

	<div class="form-group">
		<label for="name">Forum Name</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="Forum Name">
	</div>

	<div class="form-group">
		<label for="description">Forum Description</label>
		<textarea name="description" id="description" class="form-control" rows="3" required="required"></textarea>
	</div>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop