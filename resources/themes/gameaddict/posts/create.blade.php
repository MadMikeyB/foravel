@extends('layouts.app')


@section('breadcrumbs')
{!! Breadcrumbs::render('create_post') !!}
@stop

@section('content')
<div class="content-padding full-reply">
	<div class="reply-box">
		<div class="reply-textarea">
			<form action="/posts" method="post" role="form" enctype="multipart/form-data">
				{{ csrf_field() }}											
				<div class="respond-input">
					<input type="text" name="title" id="title" placeholder="I want to talk about...">
				</div>
				<div class="respond-textarea">
					<div class="textarea-wrapper">
						<textarea name="content" id="input" class="form-control" rows="12" required="required" placeholder="See, the thing is.."></textarea>
					</div>
				</div>
				<div class="respond-submit">
					<input type="submit" name="publish" value="Publish">
					<input type="submit" name="draft" value="Save Draft">
				</div>
			</form>
		</div>
	</div>
</div>

@stop
