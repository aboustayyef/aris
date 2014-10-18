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
			<div id="logo">ARIS International School</div>
			<div id="quickInfo"></div>
		</header>
		<nav>
			<?php 
				$navigation = new Aris\Navigation;
				$navigation->displayHTML();
			?>
		</nav>
		<div id="content">
			@yield('content')
		</div>	<!-- /content -->
		<footer>
			Footer
			<!-- Don't forget analytics -->
		</footer>
	</div>	<!-- /siteWrapper -->
</body>
</html>