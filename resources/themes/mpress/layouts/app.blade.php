<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        {!! SEO::generate() !!}

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}" type="text/css">
    <!-- wysihtml5 editor -->
    <link rel="stylesheet" href="{{ Theme::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css', null, true) }}">
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ Setting::get('site_title', 'MPress 2.0') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
    <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @include(config('laravel-menu.views.bootstrap-items'), array('items' => $MainNavigation->roots()))
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    @include(config('laravel-menu.views.bootstrap-items'), array('items' => $UserNavigation->roots()))
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    	@include('partials.layout.flashmessage')
    	@include('partials.layout.errors')
    
    	@yield('content')
	</div>
<!-- jQuery 2.1.4 -->
    <script src="{{ Theme::asset('plugins/jQuery/jQuery-2.1.4.min.js', null, true) }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ Theme::asset('bootstrap/js/bootstrap.min.js', null, true) }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ Theme::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js', null, true) }}"></script>
    <!-- Page Script -->
    <script>
      $(function () {
        //Add text editor
        $("textarea.mp-editor").wysihtml5();
      });
    </script>
    <script src="{{ Theme::asset('js/app.js', null, true) }}"></script>
    @yield('scripts')
</body>
</html>
