<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<title>Artfox</title>

		<link href="{{ url('img/content/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">

        <link href="{{ url('resources/css/reset.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ url('resources/css/main.css') }}" rel="stylesheet" type="text/css">

        <!--[if lt IE 9]>
        <script src="{{ url('resources/dist/html5shiv.js') }}"></script>
        <![endif]-->

        <script src="{{ url('resources/js/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ url('resources/js/tap.js') }}" type="text/javascript"></script>
        <script src="{{ url('resources/js/script.js') }}" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<div id="headerLogo">
				<a href="{{ url('/') }}">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><defs></defs><g><path fill="#FFFFFF" d="M40,32.5c0,4.1-3.4,7.5-7.5,7.5h-25C3.4,40,0,36.6,0,32.5v-25C0,3.4,3.4,0,7.5,0h25C36.6,0,40,3.4,40,7.5V32.5z"/><g><polygon fill="#634B3C" points="10.3,17 10.3,4.5 18.3,17 "/><polygon fill="#634B3C" points="30.3,17 30.3,4.5 22.3,17 "/><polygon fill="#CC7C50" points="30.3,17 30.3,29 20.3,35.5 10.3,29 10.3,17 "/><polygon fill="#634B3C" points="22.3,34.2 20.3,35.5 18.3,34.2 18.3,31.5 22.3,31.5 "/><rect x="18.3" y="23" fill="#F9ECE4" width="4" height="8.5"/><polygon fill="#6D547C" points="14.8,23 18.3,23 18.3,26.5 "/><polygon fill="#6D547C" points="25.8,23 22.3,23 22.3,26.5 "/></g></g></svg>
				</a>
			</div>
			@if (Auth::guest())
				<a href="{{ url('/auth/login') }}">
	                <div class="loginButton">Login</div>
	            </a>
            @else
            <div id="menuButton">
				<div class="menuInner">
					<div class="menuStripe" id="topStripe"></div>
					<div class="menuStripe" id="middleStripe"></div>
					<div class="menuStripe" id="bottomStripe"></div>
				</div>
			</div>
                <ul id="menu">
					<a href="{{ url('/product/admin') }}">
						<li class="hide shade20">Edit products</li>
					</a>
				@if (Auth::user()->super_user == '1')
					<a href="{{ url('/category') }}">
						<li class="hide shade30">Edit categories</li>
					</a>
					<a href="{{ url('/admin') }}">
						<li class="hide shade40">Edit admins</li>
					</a>
					<a href="{{ url('/auth/logout') }}">
						<li class="hide shade50">Logout</li>
					</a>
				@else
					<a href="{{ url('/auth/logout') }}">
						<li class="hide shade30">Logout</li>
					</a>
				@endif
					
                @endif
			</ul>
		</header>
		
		<div class="container">
			<nav>
				@yield('contentNav')
			</nav>
			@yield('homeFilter')
			<div class="wrapper @if (isset($active) && $active) {{ 'move' }} @endif" id="mainContent">
				@yield('body')
			</div>
		</div>
	</body>
</html>
