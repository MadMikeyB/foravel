@extends('layouts.app')

@section('content')
{!! Breadcrumbs::render('forum') !!}

<div class="page-header">
  <h1>Foravel
  <small></small></h1>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-8 col-sm-10 col-xs-12">
			<h1 class="panel-title">Forum Name</h1>
		</div>
		<div class="col-md-4 col-sm-2 col-xs-12">
			<h1 class="panel-title">Last Post</h1>
		</div>
	</div>

	@foreach ( $forums as $forum )
		@if ( $forum->parent == '0')
		<div class="panel-heading">
			<h3 class="panel-title">{{ $forum->name }}</h3>
		</div>
		@else
		<div class="panel-body">
			<div class="col-md-8 col-sm-10 col-xs-12">
				<h2 class="panel-title"><a href="/forums/{{$forum->slug }}">{{ $forum->name }}</a></h2><p class="text-muted">{{ $forum->description }}</p>
			</div>
			<div class="col-md-4 col-sm-2 col-xs-12">
				<p>{{ $forum->threads->count() }} {{ str_plural('thread', $forum->threads->count() ) }}</p>
				<p class="text-muted">Last posted in {{ $forum->updated_at->diffForHumans() }}</p>
			</div>
		</div>
		@endif
	@endforeach
</div>
@stop
