<!DOCTYPE html>
<?php
use Aris\Node;
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="{{asset('/css/aris_home.css?v=1.03')}}">
	<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
</head>
<body>
	@if (Auth::Check())
	<div class="adminStrip">
		<p>You are signed in as {{Auth::user()->email}}. <a href="/logout">logout</a></p>
	</div>
	@endif
	<div id="contactInfo">
		<ul class="contacts">
			<li>Al-Rayan International School, Ghana</li>
			<li class="contact"> +233 54 189 7254 (primary) </li>
			<li class="contact"> +233 30 254 4511 (secondary) </li>
		</ul>
			
	</div>
	<div id="siteWrapper">
		<header>
			@include('partials.header')
		</header>

		@include('partials.navigation')

		<div id="content">
			@yield('content')
		</div>	<!-- /content -->
	</div>	<!-- /siteWrapper -->
<footer>
	@include('partials.footer')
</footer>
</body>
</html>