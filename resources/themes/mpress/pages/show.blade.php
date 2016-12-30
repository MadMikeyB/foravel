@extends('layouts.app')

@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">{{ $page->title }}</h2>
	</div>
	<div class="panel-body">
		{!! $page->content !!}
	</div>
	<div class="panel-footer">
		<ul class="pull-right ">
			@can( 'edit-page', $page)
				<li><a href="/{{ $page->slug }}/edit" class="btn btn-primary">Edit</a></li>
			@endcan

			@can('delete-page', $page)
				<form action="/{{ $page->slug }}/delete" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<li><input type="submit" class="btn btn-danger" value="Delete"></li>
				</form>
			@endcan
		</ul>
	</div>
</div>
@stop