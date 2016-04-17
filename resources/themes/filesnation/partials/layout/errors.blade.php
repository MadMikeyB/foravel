@if (count($errors) > 0)
@foreach ($errors->all() as $error)
<div class="info-message" style="background-color: #a24026;">
	<a href="#" class="close-info"><i class="fa fa-times"></i></a>
	<p>{{ $error }}</p>
</div>
@endforeach
@endif