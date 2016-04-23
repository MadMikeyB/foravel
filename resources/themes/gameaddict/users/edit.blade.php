@extends('layouts.app')

@section('breadcrumbs')
{!! Breadcrumbs::render('edit_profile') !!}
@stop

@section('content')
	<div class="content-padding">
		<div class="the-form" style="margin-top:40px;">
				<form action="/&#64;{{$user->slug}}" method="POST" role="form">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}

					<p>
							<label for="nickname">Nickname</label>
							<input type="text" id="nickname" name="nickname" placeholder="Your Nickname" value="{{ $user->nickname }}">
							
					</p>

					<p>
							<label for="email">Email</label>
							<input type="text" id="email" name="email" placeholder="Your Email Address" value="{{ $user->email }}">
							
					</p>

					<p>
							<label for="old_password">Current Password</label>
							<input type="password" id="old_password" name="old_password" placeholder="Your Current Password">
							
					</p>

					<p>
							<label for="new_password">New Password</label>
							<input type="password" id="new_password" name="new_password" placeholder="Your New Password">
							
					</p>

					<p>
							<label for="new_password_confirmation">Confirm Password</label>
							<input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm Password">
							
					</p>


					<p class="form-footer">
							<input type="submit" class="button special fit" value="Update Profile">
					</p>
				</form>
			</div>
	</div>
@stop