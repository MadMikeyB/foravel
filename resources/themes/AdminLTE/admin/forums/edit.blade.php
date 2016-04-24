@extends('layouts.app')

@section('title')
          <h1>{{ Setting::get('site_title', 'MPress 2.0')}}
            <small>Forum Manager</small>
            <small>&gt; Edit Forum</small>
            <small>&gt; {{ $forum->name }}</small>
          </h1>
@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<i class="fa fa-th pull-right"></i>
				<h3 class="box-title">Forum Manager</h3>
			</div>

			<div class="box-body">
				<form action="/admin/forums/edit/{{ $forum->id }}" method="POST" role="form">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="form-group">
						<label for="name" class="control-label">Name</label>
						<input type="text" class="form-control input-lg" id="name" name="name" placeholder="Forum Name" value="{{ $forum->name }}">
					</div>

					<div class="form-group">
						<label for="description" class="control-label">Description</label>
						<input type="text" class="form-control input-lg" id="description" name="description" placeholder="Forum Description" value="{{ $forum->description }}">
					</div>

					<div class="form-group">
						<label for="position" class="control-label">Position</label>
						<input type="number" class="form-control input-lg" id="position" name="position" placeholder="Forum Position" value="{{ $forum->position }}">
					</div>

					<button type="submit" class="btn btn-primary btn-block">Add Menu Item</button>
				</form>	
			</div>
		</div>
	</div>
</div>

@stop