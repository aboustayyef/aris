<?php
use Aris\Node;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="alternate" type="application/rss+xml" title="ARIS News Feed" href="{{getenv('WEB_ROOT')}}rss" />
	<link rel="stylesheet" href="{{asset('/css/aris_home.css?v=1.31')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	@yield('facebookMeta')
</head>
<body>
	@if (Auth::Check())
	<div class="topStrip adminStrip">
		<p>You are signed in as {{Auth::user()->email}}. <a href="/logout">logout</a></p>
	</div>
	@endif

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

		@include('partials.navigation')

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
