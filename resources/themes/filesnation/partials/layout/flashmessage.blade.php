@if ( session()->has('flash_message') )
<div class="info-message" style="background-color:#75a226;">
	<a href="#" class="close-info"><i class="fa fa-times"></i></a>
	<p>{{ session()->get('flash_message') }}</p>
</div>
@endif