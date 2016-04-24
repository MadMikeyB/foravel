@extends('layouts.app')

@section('content')
<div class="content-padding full-reply">
	<div class="reply-box">
		<div class="reply-textarea">
			<form action="/forums/{{ $forum->slug }}/{{ $thread->slug }}/replies/{{ $forumpost->id }}" method="POST" role="form">
				{{ csrf_field() }}											
				<div class="respond-textarea">
					<div class="textarea-wrapper">
						<textarea name="content" id="input" class="form-control" rows="10" cols="100" required="required" placeholder="See, the thing is..">
							{!! $forumpost->content !!}
						</textarea>
					</div>
				</div>
				<div class="respond-submit">
					<input type="submit" name="submit" value="Edit Post">
				</div>
			</form>
		</div>
	</div>
</div>
@stop