@inject('stats', 'App\Services\Stats')
@inject('threads', 'App\Thread')
@inject('posts', 'App\ForumPost')
@inject('pages', 'App\Page')
@inject('users', 'App\User')

@extends('layouts.app')

@section('title')
          <h1>{{ Setting::get('site_title', 'MPress 2.0')}} &mdash; What's going on?
            <small>At a Glance</small>
          </h1>
@stop

@section('content')
<div class="row">
	
	<div class="col-sm-4 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-comment"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Threads</span>
				<span class="info-box-number">{{ $stats->countFrom('App\Thread') }}</span>
			</div>
		</div>
	</div>

	<div class="col-sm-4 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-blue"><i class="fa fa-comments-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Posts</span>
				<span class="info-box-number">{{ $stats->countFrom('App\ForumPost') }}</span>
			</div>
		</div>
	</div>

	<div class="col-sm-4 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Users</span>
				<span class="info-box-number">{{ $stats->countFrom('App\User') }}</span>
			</div>
		</div>
	</div>

</div>

<div class="row">
	@unless ( $posts->all()->isEmpty() )
	<div class="col-sm-6">
		<div class="info-box">
			<span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Most Active Poster</span>
				<span><a href="&#64;{{ $stats->most( 'App\ForumPost', 'user_id' )->user->slug }}">{{ $stats->most( 'App\ForumPost', 'user_id' )->user->name }}</a></span>
				<span class="info-box-number">{{ $stats->most( 'App\ForumPost', 'user_id' )->count }} posts</span>
			</div>
		</div>
	</div>
	@endunless

	@unless ( $pages->all()->isEmpty() )
	<div class="col-sm-6">
		<div class="info-box">
			<span class="info-box-icon bg-maroon"><i class="fa fa-file"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Most Viewed Page</span>
				<span><a href="{{ url('/' . $stats->most( 'App\Page', 'views' )->slug) }}">{{ $stats->most( 'App\Page', 'views' )->title }}</a></span>
				<span class="info-box-number">{{ $stats->most( 'App\Page', 'views' )->views }} views</span>
			</div>
		</div>
	</div>
	@endunless
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Latest Threads</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<ul class="products-list product-list-in-box">
					@unless ( $threads->all()->isEmpty() )
					@foreach ( $threads->paginate(15) as $thread )
					<li class="item">
						<div class="product-img">
							<img src="https://www.gravatar.com/avatar/{{ md5(strtolower( $thread->user->email ))}}?s=50" alt="{{ $thread->user->id }}">
						</div>
						<div class="product-info">
							<a href="">{{ $thread->title }}</a>
							<span class="product-description">
								posted in {{ $thread->forum->name }} {{ $thread->created_at->diffForHumans() }}
							</span>
						</div>
					</li>
					@endforeach
					@endunless
				</ul>		
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Latest Registrations</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<ul class="products-list product-list-in-box">
					@unless ( $users->all()->isEmpty() )
					@foreach ( $users->paginate(15) as $user )
					<li class="item">
						<div class="product-img">
							<img src="https://www.gravatar.com/avatar/{{ md5(strtolower( $user->email ))}}?s=50" alt="{{ $user->id }}">
						</div>
						<div class="product-info">
							<a href="">{{ $user->name }} <span class="label label-default pull-right">{{ $user->usergroup->group_name }}</span></a>
							<span class="product-description">
								Registered {{ $user->created_at->diffForHumans() }} ( {{ $user->created_at }} )
							</span>
						</div>
					</li>
					@endforeach
					@endunless
				</ul>
			</div>
		</div>
	</div>
</div>
@stop