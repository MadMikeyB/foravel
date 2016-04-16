@extends('layouts.app')

@section('title', $forum->name . ' -')

@section('content')
{!! Breadcrumbs::render('show_forum', $forum) !!}

<div class="page-header">
  <h1>{{ $forum->name }}
  <small>{{ $forum->description }}</small></h1>
</div>

<div class="row">
	<div class="col-md-12">
			<a href="/forums/{{ $forum->slug }}/create" class="btn btn-primary btn-block">New Thread</a>
	</div>
</div>
<br>

@unless( $forum->threads->isEmpty() )

<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-8 col-sm-10 col-xs-12">
			<h1 class="panel-title">Thread Title</h1>
		</div>
		<div class="col-md-4 col-sm-2 col-xs-12">
			<h1 class="panel-title">Last Post</h1>
		</div>
	</div>
	@foreach ( $forum->threads as $thread )
	<div class="panel-body">
		<div class="col-md-8 col-sm-10 col-xs-12">
			<a href="/forums/{{ $forum->slug }}/{{ $thread->slug }}">{{ $thread->title }}</a>
		</div>
		<div class="col-md-4 col-sm-2 col-xs-12">
			<p>{{ $thread->posts->count() }} {{ str_plural('post', $thread->posts->count() ) }}</p>
			<p class="text-muted">Last posted in {{ $thread->updated_at->diffForHumans() }}</p>
		</div>
	</div>
	@endforeach
</div>

@else
<div class="panel panel-default">
	<div class="panel-body">
		<div class="col-md-8 col-sm-10 col-xs-12">
			<h1 class="panel-title">Thread Title</h1>
		</div>
		<div class="col-md-4 col-sm-2 col-xs-12">
			<h1 class="panel-title">Last Post</h1>
		</div>
	</div>
	<div class="panel-body">
		<div class="col-md-8 col-sm-10 col-xs-12">
			<p>No threads have been created yet. :(</p>
		</div>
		<div class="col-md-4 col-sm-2 col-xs-12">
			<a href="/threads/create" class="btn btn-primary btn-block">Be the First!</a>
		</div>
	</div>	
</div>


@endunless
@stop