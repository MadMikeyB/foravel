@inject('comments', 'App\Comment')
@inject('posts', 'App\Post')
@inject('forumposts', 'App\ForumPost')

<!doctype html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		{!! SEO::generate() !!}

		<link rel="shortcut icon" href="{{ Theme::asset('img/favicon.png', null, true) }}">
		<!-- CSS -->
		<link rel="stylesheet" href="{{ Theme::asset('style.css', null, true) }}">
		<link rel="stylesheet" href="{{ Theme::asset('css/layerslider.css', null, true) }}">
		<link rel="stylesheet" id="custom-style-css"  href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,700,800,800italic" type="text/css" media="all" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	</head>

	<body>
		<div id="main_wrapper">
		<div class="container logo">
			<!-- Logo -->
			<a class="brand" href="/">
				<img src="{{ Theme::asset('img/logo.png', null, true) }}" alt="logo"  />
			</a>
			<!-- End Logo -->
			<!-- Social logos -->
			<div class="social">
				<a data-original-title="Facebook" data-toggle="tooltip" class="facebook" target="_blank" href=""><i class="fa fa-facebook"></i></a>
				<a data-original-title="Twitter" data-toggle="tooltip" class="twitter" target="_blank" href=""><i class="fa fa-twitter"></i></a>
				<a data-original-title="Youtube" data-toggle="tooltip" class="youtube" target="_blank" href=""><i class="fa fa-youtube"></i> </a>
				<a data-original-title="Twitch" data-toggle="tooltip" class="twitch" target="_blank" href=""><i class="fa fa-gamepad"></i></a>
			</div>
			<!-- End Social logos -->
			<div class="clear"></div>
		</div>

		<div class="navbar navbar-inverse container">
			<div class="navbar-inner">
					<button type="button" class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<div class="nav-collapse collapse" style="height: 0px;">
						<div class="menu-main-container">
							<ul class="nav">
								@include('vendor.laravel-menu.bootstrap-navbar-items', array('items' => $MainNavigation->roots()))
							</ul>
						</div>
						<a href="/login" role="button" data-toggle="modal" class="account"><i class="fa fa-user"></i></a>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="title_wrapper">
						<div class="span6">
							<h1>{{ SEO::getTitle() }}</h1>
						</div>
						<div class="breadcrumbs">
							@yield('breadcrumbs')
						</div>
					</div>
				</div>
			</div>

		<div class="page normal-page container">
			<div class="row template-wrapper">

				<div class="span8">

			    
					<!-- Latest news -->
					<div class="block span8 first cf">
						@include('partials.layout.flashmessage')
			    		@include('partials.layout.errors')
						<div class="title-wrapper">
							<h3 class="widget-title">@yield('title', Setting::get('site_title'))</h3>
							<div class="clear"></div>
						</div>
						<div class="wcontainer block">
			    			@yield('content')
							<div class="clear"></div>
						</div>
					</div>
					<!-- End Latest News -->
				</div>
			    @include('partials.layout.sidebar')
			</div>
		</div>

		<footer class="container">
			<div class="span12">
				@unless ( $posts->all()->isEmpty() )
				<div class="footer_widget span4">
					<div class="title-wrapper">
						<h3 class="widget-title"> Latest posts</h3>
						<div class="clear"></div>
					</div>
					<ul class="review">
						@foreach ( $posts->orderBy('id', 'DESC')->where('status', 'publish')->paginate('5') as $post )
						<li>
							<div class="img">
								<a rel="bookmark" href="#">
								@unless ( $post->images->isEmpty() )
			                        @foreach ( $post->images as $image )
			                            <a href="/read/{{ $post->slug }}" target="_blank"><img src="/{{ $image->image_path }}" alt="Featured Image for {{ $post->title }}" title="{{ $post->title }}" style="width:57px;"></a>
			                        @endforeach
			                    @else 
			                        <a href="/read/{{ $post->slug }}"><img src="https://source.unsplash.com/category/nature/weekly" alt="" title="" style="width:57px;"></a>
			                    @endunless
									<span class="overlay-link"></span>
								</a>
							</div>
							<div class="info">
								<a href="/read/{{ $post->slug }}">{{ $post->title }}</a><br>
								<small><i class="icon-calendar"></i> {{ $post->created_at->diffForHumans() }} - <i class="icon-comment"></i> {{ $post->comments->count() }} {{ str_plural('Comment', $post->comments->count()) }}</small><br>
							</div>
							<div class="clear"></div>
						</li>
						@endforeach
					</ul>
				</div>
				@endunless
				@unless ( $forumposts->all()->isEmpty() )
				<div class="footer_widget span4">
					<div class="title-wrapper">
						<h3 class="widget-title">From the forum</h3>
						<div class="clear"></div>
					</div>
					<ul>
						@foreach ( $forumposts->orderBy('id', 'DESC')->paginate('5') as $fpost )
						<li><a class="bbp-forum-title" href="#"><i class="icon-comment"></i><a href="/&64;{{ $fpost->user->slug }}">{{ $fpost->user->name }}</a> on <a href="/forums/{{ $fpost->thread->forum->slug }}/{{ $fpost->thread->slug }}">{{ $fpost->thread->title }}</a></li>
						@endforeach
					</ul>
				</div>
				@endunless
				@unless ( $comments->all()->isEmpty() )
				<div class="footer_widget span4">
					<div class="title-wrapper">
						<h3 class="widget-title"> Latest Comments</h3>
						<div class="clear"></div>
					</div>
					<ul>
						@foreach ( $comments->orderBy('id', 'DESC')->paginate('5') as $comment )
						@if ( $comment->post->status == 'publish')
							<li><a href="&#64;{{ $comment->user->slug }}">&#64;{{ $comment->user->name }}</a> on <a class="bbp-forum-title" href="/read/{{ $comment->post->slug }}"><i class="icon-comment"></i>{{ $comment->post->title }}</a> {{ $comment->created_at->diffForHumans() }}</li>
						@endif
						@endforeach
					</ul>
				</div>
				@endunless
			</div>
			<div class="copyright span12">
				<p>&copy; {{ date('Y') }} {{ Setting::get('site_title', 'MPress 2.0') }}. All rights reserved. &middot; Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a> &middot; Theme by Sky Warrior Themes</p>
				<div class="social">
					<a data-original-title="Facebook" data-toggle="tooltip" class="facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a>
					<a data-original-title="Twitter" data-toggle="tooltip" class="twitter" target="_blank" href="#"><i class="fa fa-twitter"></i></a>
					<a data-original-title="Youtube" data-toggle="tooltip" class="youtube" target="_blank" href=""><i class="fa fa-youtube"></i> </a>
					<a data-original-title="Twitch" data-toggle="tooltip" class="twitch" target="_blank" href=""><i class="fa fa-gamepad"></i></a>
				</div>
			</div>
		</footer>
		<!-- JavaScript -->
		<script type="text/javascript" src="{{ Theme::asset('js/jquery.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/jquery.cookie.pack.js', null, true) }}"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/jquery-migrate.min.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/jquery.fancybox.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/jquery.elastic.source.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/jquery.carouFredSel-6.2.1-packed.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/jquery-ui-1.10.3.custom.min.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/jquery.ui.totop.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/jquery.validate.min.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/login-with-ajax.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/bootstrap-button.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/bootstrap-carousel.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/bootstrap-collapse.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/bootstrap-modal.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/bootstrap-tab.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/bootstrap-tooltip.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/bootstrap-transition.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/bootstrap-popover.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/easing.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/global.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/imagescale.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/main.js', null, true) }}"></script>
	 	<script type="text/javascript" src="{{ Theme::asset('js/theme.min.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/tinymce.min.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/transit.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/admin.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/greensock.js', null, true) }}"></script>
		<script type="text/javascript" src="{{ Theme::asset('js/tabs.js', null, true) }}"></script>
        <script type="text/javascript" src="{{ Theme::asset('js/jquery.tabSlideOut.v1.3.js', null, true) }}"></script>
        <script type="text/javascript" src="{{ Theme::asset('js/styleswitchcustom.js', null, true) }}"></script>
        <!-- End JavaScript -->

	</body>
</html>