<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		
		@yield('title')
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link rel="alternate" type="application/rss+xml" title="ARIS News Feed" href="{{getenv('WEB_ROOT')}}rss" />
		<link rel="stylesheet" href="{{mix('/css/aris_home.css')}}">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		@yield('facebookMeta')

	</head>
	<body>

		{{-- Strip that tells if Admin user is logged in  --}}
		@if (Auth::Check())
			<div class="topStrip adminStrip">
				<p>You are signed in as {{Auth::user()->email}}. <a href="/logout">logout</a></p>
			</div>
		@endif

		{{-- Strip that tells if Role user is logged in  --}}
		@if(Session::has('aris_role'))
			@if(is_object(Session::get('aris_role')))
				<div class="topStrip roleStrip">
					<p>You are signed in as {{Session::get('aris_role')->description}} <a href="/rolelogout">logout</a></p>
				</div>
			@endif
		@endif

		<div id="contactInfo">
			<ul class="contacts">
				<li>Al-Rayan International School, Ghana</li>
				<li class="contact"> +233 30 700 2467 (primary) </li>
				<li class="contact"> +233 30 254 4511 (secondary) </li>
			</ul>
		</div>

		<div id="siteWrapper">
			<header>
				@include('partials.header')
			</header>

			{{-- Virtual Learning Banner--}}
			@include('partials.virtual_learning_banner')

			{{-- Make sure the navigation menu is cached. If not, cache it --}}
			@if ( ! Cache::has('navigation_menu'))
				{{Cache::forever('navigation_menu', view('partials.navigation_generator')->render())}}
			@endif
			
			{{-- Show Cached navigation menu --}}
			{!!Cache::get('navigation_menu')!!}

			<div id="content">

				@if(Session::has('message'))
					@include('partials.message', ['message'=> Session::get('message')])
				@endif

				@yield('content')
			</div>	<!-- /content -->
		</div>	<!-- /siteWrapper -->
		<footer>
			@include('partials.footer')
		</footer>
	</body>
</html>