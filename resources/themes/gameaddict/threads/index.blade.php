@extends('layouts.app')
@section('content')

@unless( $forum->threads->isEmpty() )

	@foreach ( $forum->threads as $thread )

	@endforeach

@endunless

@stop