@extends('layouts.app')

@section('content')
{{-- <h2><span>{{ $page->title }}</span></h2> --}}
	<div class="content-padding">
		<div class="article-full">
			{!! $page->content !!}
		
			<div class="pull-right actions small">
			@can( 'edit-page', $page)
				<p><a href="/{{ $page->slug }}/edit" class="button fit small">Edit</a></p>
			@endcan

			@can('delete-page', $page)
				<form action="/{{ $page->slug }}/delete" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<p><input type="submit" class="button special fit small" value="Delete"></p>
				</form>
			@endcan
			</div>
	</div>
</div>
@stop