<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{'title'}}</title>
	<link rel="stylesheet" href="{{asset('/css/aris.css')}}">
</head>
<body>
	<div id="siteWrapper">
		<header>
			@include('partials.header')
		</header>
		<nav>
			@include('partials.navigation')
		</nav>
		<div id="content">
				@yield('content')
		</div>	<!-- /content -->
		<footer>
			<div class="inner">
				Footer
			<!-- Don't forget analytics -->
			</div>
		</footer>
	</div>	<!-- /siteWrapper -->
</body>
</html>