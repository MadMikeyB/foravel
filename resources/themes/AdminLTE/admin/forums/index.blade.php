@extends('layouts.app')

@section('title')
	<div class="pull-right">
		<a type="button" class="btn btn-primary" href="/forums/create"><i class="fa fa-plus-circle"></i> Create Forum</a>
	</div>
	<h1>{{ Setting::get('site_title', 'MPress 2.0')}}
		<small>Forum Manager</small>
	</h1>
@stop


@section('content')
<div class="row">
<div class="col-md-12">
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">All Forums</h3>
			<i class="fa fa-comments-o pull-right"></i>
		</div><!-- /.box-header -->
		<div class="box-body no-padding">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th>Position</th>
						<th>Name</th>
						<th>Description</th>
						<th>Parent</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					@unless ( $forums->isEmpty() )
					@foreach ($forums as $forum)
						<tr>
							<td>{{ $forum->position }}</td>
							<td>{{ $forum->name }}</td>
							<td>{!! Markdown::convertToHtml(str_limit($forum->description, 140)) !!}</td>
							<td>{{ $forum->parent }}</td>
							<td><a href="/forums/{{ $forum->slug }}" class="btn btn-success"><i class="fa fa-eye"></i></td>
							<td><a href="/admin/forums/edit/{{ $forum->id }}" class="btn btn-info"><i class="fa fa-pencil"></i></td>
							<td><a href="/admin/forums/delete/{{ $forum->id }}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$forum->id}}"><i class="fa fa-trash"></i></td>
						</tr>
					@endforeach
					@endunless
				</tbody>
			</table>
		</div><!-- /.box-body -->
		<div class="box-footer clearfix">
			<div class="pagination pagination-sm no-margin pull-right">
				{!! $forums->links() !!}
			</div>
		</div>
	</div><!-- /.box -->
</div>
</div>

@unless( $forums->isEmpty() )
@foreach ( $forums as $forum )
<!-- Modal -->
<div class="modal fade" id="deleteModal{{$forum->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal{{$forum->id}}Label">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="deleteModal{{$forum->id}}Label">Are you sure?</h4>
			</div>
			<div class="modal-body">
				<form action="/admin/forums/delete/{{ $forum->id }}" method="post" role="form">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<p>Please confirm you are deleting: {{ $forum->name }}?</p>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger btn-block">Yes, Delete!</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach
@endunless

@stop