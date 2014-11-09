<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="{{asset('/css/aris_home.css')}}">
	<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
</head>
<body>
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