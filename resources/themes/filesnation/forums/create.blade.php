@extends('layouts.app')
@section('title', 'New Forum -')

@section('content')
<div class="content-padding full-reply">
	<div class="reply-box">
		<div class="reply-textarea">
			<form action="/forums" method="POST" role="form">
				{!! csrf_field() !!}

				<div class="respond-input">
					<input type="text" class="form-control" id="name" name="name" placeholder="Forum Name">
				</div>

				<div class="respond-textarea">
					<div class="textarea-wrapper">
						<textarea name="description" id="description" class="form-control" rows="3" cols="3" required="required"></textarea>
					</div>
				</div>

				<div class="respond-input">
					<input type="number" class="form-control" id="parent" name="parent" placeholder="Forum Parent (Enter 0 for Category)">
				</div>

				<div class="respond-input">
					<input type="number" class="form-control" id="position" name="position" placeholder="Forum Position">
				</div>

				<div class="respond-submit">
					<input type="submit" name="submit" value="Create Forum">
				</div>
			</form>
		</div>
	</div>
</div>
@stop