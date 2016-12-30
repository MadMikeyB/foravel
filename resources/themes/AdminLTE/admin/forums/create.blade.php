@extends('layouts.app')

@section('content')
<div class="box box-solid">
<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<i class="fa fa-file pull-right"></i>
				<h3 class="box-title">Create Forum</h3>
			</div>

			<div class="box-body">
				<form action="/admin/forums" method="POST" role="form">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Forum Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Forum Name">
					</div>

					<div class="form-group">
						<label for="description">Forum Description</label>
						<textarea name="description" id="description" class="form-control" rows="3" required="required"></textarea>
					</div>

					<div class="form-group">
						<label for="name">Forum Parent</label>
						<input type="number" class="form-control" id="parent" name="parent" placeholder="Forum Parent">
						<p class="text-muted">Enter 0 for Category</p>
					</div>

					<div class="form-group">
						<label for="name">Forum Position</label>
						<input type="number" class="form-control" id="position" name="position" placeholder="Forum Position">
					</div>
					<button type="submit" class="btn btn-primary btn-block">Create Forum</button>
				</form>	
			</div>
		</div>
	</div>
</div>

@stop