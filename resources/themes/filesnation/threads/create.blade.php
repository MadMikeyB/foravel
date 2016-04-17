@extends('layouts.app')

@section('breadcrumbs')
{!! Breadcrumbs::render('create_thread', $forum) !!}
@stop

@section('content')
<div class="content-padding full-reply">
	<div class="reply-box">
		<div class="reply-textarea">
			<form action="/forums/{{ $forum->slug }}" method="POST" role="form">
				{{ csrf_field() }}											
				<div class="respond-input">
					<input type="text" name="title" id="title" placeholder="I want to talk about...">
				</div>
				<div class="respond-textarea">
					<div class="textarea-wrapper">
						<textarea name="content" id="input" class="form-control" rows="10" required="required" placeholder="See, the thing is.."></textarea>
					</div>
				</div>
				<div class="respond-submit">
					<input type="submit" name="submit" value="Create Thread">
				</div>
			</form>
		</div>
	</div>
</div>
@stop