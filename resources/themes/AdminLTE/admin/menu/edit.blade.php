@extends('layouts.app')

@section('title')
          <h1>{{ Setting::get('site_title', 'MPress 2.0')}}
            <small>Menu Manager</small>
            <small>&gt; Edit Menu Item</small>
            <small>&gt; {{ $menu->title }}</small>
          </h1>
@stop

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-solid">
			<div class="box-header with-border">
				<i class="fa fa-th pull-right"></i>
				<h3 class="box-title">Menu Manager</h3>
			</div>

			<div class="box-body">
				<form action="/admin/menus/edit/{{ $menu->id }}" method="POST" role="form">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="form-group">
						<label for="title" class="control-label">Title</label>
						<input type="text" class="form-control input-lg" id="title" name="title" placeholder="Menu Title" value="{{ $menu->title }}">
					</div>

					<div class="form-group">
						<label for="url" class="control-label">URL</label>
						<input type="url" class="form-control input-lg" id="url" name="url" placeholder="Menu URL" value="{{ $menu->url }}">
					</div>

					<div class="form-group">
						<label for="icon" class="control-label">URL</label>
						<input type="icon" class="form-control input-lg" id="icon" name="icon" placeholder="Font Awesome Icon (eg, fa-home)" value="{{ $menu->icon }}">
					</div>

					<div class="form-group">
						<label for="position" class="control-label">Position</label>
						<input type="number" class="form-control input-lg" id="position" name="position" placeholder="Menu Position" value="{{ $menu->position }}">
					</div>

					<div class="form-group">
						<label>Who can see this?</label>
						<select name="group" class="form-control input-lg">
							<option value="1" @if ( $menu->group == '1') selected @endif>Admin Only</option>
							<option value="2" @if ( $menu->group == '2') selected @endif>Admin &amp; Editor</option>
							<option value="3" @if ( $menu->group == '3') selected @endif>Everyone</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Add Menu Item</button>
				</form>	
			</div>
		</div>
	</div>
</div>

@stop