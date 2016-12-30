@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="panel-title">Hello, &#64;{{ $user->name }}</h2>
		</div>
		<div class="panel-body">
			<form action="/&#64;{{$user->slug}}" method="POST" role="form">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}

				<div class="form-group">
					<input type="text" class="form-control" id="nickname" name="nickname" placeholder="Your Nickname" value="{{ $user->nickname }}">
				</div>

				<div class="form-group">
					<input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address" value="{{ $user->email }}">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Your Current Password">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Your New Password">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm Password">
				</div>


				<div class="form-group">
					<input type="submit" class="btn btn-primary btn-block" value="Update Profile">
				</div>
			</form>
		</div>
	</div>
@stop