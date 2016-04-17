<!DOCTYPE HTML>
<html lang = "en">
	<head>
		{!! SEO::generate() !!}
		<meta charset="utf-8" />
		<link rel="shortcut icon" type="image/png" href="{{ Theme::asset('images/favicon.png', null, true) }}" />
		<link rel="stylesheet" type="text/css" href="{{ Theme::asset('css/reset.css', null, true) }}" media="screen" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="{{ Theme::asset('css/dat-menu.css', null, true) }}" media="screen" />
		<link rel="stylesheet" type="text/css" href="{{ Theme::asset('css/main-stylesheet.css', null, true) }}" media="screen" />
		<link rel="stylesheet" type="text/css" href="{{ Theme::asset('css/responsive.css', null, true) }}" media="screen" />
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Oswald:300,400,700|Source+Sans+Pro:300,400,600,700&amp;subset=latin,latin-ext" />
		<!--[if lt IE 9 ]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			/* Man content & sidebar top lne, default #256193 */
			#sidebar .panel,
			-box  {
				border-top: 5px solid #256193;
			}

			/* Slider colors, default #256193 */
			a.featured-select,
			#slider-info .padding-box ul li:before,
			.home-article.right ul li a:hover {
				background-color: #256193;
			}

			/* Button color, default #256193 */
			.panel-duel-voting .panel-duel-vote a {
				background-color: #256193;
			}

			/* Menu background color, default #000 */
			#menu-bottom.blurred #menu > .blur-before:after {
				background-color: #000;
			}

			/* Top menu background, default #0D0D0D */
			#header-top {
				background: #0D0D0D;
			}

			/* Sidebar panel titles color, default #333333 */
			#sidebar .panel > h2 {
				color: #333333;
			}

			/* Main titles color, default #353535 */
			 h2 span {
				color: #353535;
			}

			/* Selection color, default #256193 */
			::selection {
				background: #256193;
			}

			/* Links hover color, default #256193 */
			.article-icons a:hover,
			a:hover {
				color: #256193;
			}

			/* Image hover background, default #256193 */
			.article-image-out,
			.article-image {
				background: #256193;
			}

			/* Image hover icons color, default #256193 */
			span.article-image span .fa {
				color: #256193;
			}
		</style>
	</head>
	<body class="no-slider">
	<!-- <body class="has-top-menu"> -->
		<!-- BEGIN #slider-imgs -->
		<div id="slider-imgs">
			<div class="featured-img-box">
				<div id="featured-img-1" class="featured-img"></div>
				<div id="featured-img-2" class="featured-img invisible"></div>
				<div id="featured-img-3" class="featured-img invisible"></div>
				<div id="featured-img-4" class="featured-img invisible"></div>
			</div>
		<!-- END #slider-imgs -->
		</div>

		<!-- BEGIN #top-layer -->
		<div id="top-layer">
			<div id="header-top">
				<div class="wrapper">
					<ul class="right">
						<li><a href="https://www.facebook.com/{{ Setting::get('social_facebook') }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/{{ Setting::get('social_twitter') }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.youtube.com/user/{{ Setting::get('social_youtube') }}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
						<li><a href="https://www.twitch.tv/{{ Setting::get('social_twitch') }}" target="_blank"><i class="fa fa-twitch"></i></a></li>
						<li><a href="http://steamcommunity.com/groups/{{ Setting::get('social_steam') }}" target="_blank"><i class="fa fa-steam"></i></a></li>
					</ul>
					<ul class="load-responsive" rel="Top menu">
						@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $UserNavigation->roots()))
					</ul>
				</div>
			</div>
			<section id="content">
				<header id="header">
					<div id="menu-bottom">
						<!-- <nav id="menu" class="main-menu width-fluid"> -->
						<nav id="menu" class="main-menu">
							<div class="blur-before"></div>
							<a href="{{ route('home') }}" class="header-logo left"><img src="{{ Theme::asset('images/logo.png', null, true) }}" class="logo" alt="Revelio" title="" /></a>
							<a href="#dat-menu" class="datmenu-prompt"><i class="fa fa-bars"></i>Show menu</a>
							<ul class="load-responsive" rel="Main menu">
								@include('vendor.laravel-menu.filesnation-navbar-items', array('items' => $MainNavigation->roots()))
							</ul>
						</nav>
					</div>

					<div class="wrapper">
						<div class="header-breadcrumbs">
							<h2 class="right">{{ Setting::get('site_title', 'MPress 2.0') }}</h2>
							@yield('breadcrumbs')
						</div>
					</div>
					
				</header>

				<div id="main-box">
					<div id="main">
						
						<h2><span>{{ SEO::getTitle() }}</span></h2>

						<div class="content-padding">
									@include('partials.layout.flashmessage')
				    				@include('partials.layout.errors')
									@yield('content')
						</div>
						
					</div>
					@include('partials.layout.sidebar')


					<div class="clear-float"></div>
					
				</div>
		</div>
			
		<div class="clear-float"></div>
		
		<div class="wrapper">
			<!-- BEGIN .footer -->
			<div class="footer">
				<div class="footer-bottom">
					<div class="left">&copy; {{ Setting::get('site_title', 'MPress 2.0') }}. All rights reserved. {{-- Powered by <a href="http://mpresscms.com" title="MPress - The CMS for 2016">MPress</a> --}}</div>
					<div class="right">
						<ul>
							@include('vendor.laravel-menu.alpha-navbar-items', array('items' => $MainNavigation->roots()))
						</ul>
					</div>
					<div class="clear-float"></div>
				</div>
				
			<!-- END .footer -->
			</div>
		</div>
		<script type='text/javascript' src="{{ Theme::asset('jscript/jquery-1.11.2.min.js', null, true)  }}"></script>
		<script type='text/javascript' src="{{ Theme::asset('jscript/modernizr.custom.50878.js', null, true)  }}"></script>
		<script type='text/javascript' src="{{ Theme::asset('jscript/iscroll.js', null, true)  }}"></script>
		<script type='text/javascript' src="{{ Theme::asset('jscript/dat-menu.js', null, true)  }}"></script>
		<script type='text/javascript'>
			var strike_autostart = false;
		</script>
		<script type='text/javascript' src="{{ Theme::asset('jscript/theme-script.js', null, true) }}"></script>
	</body>
</html>