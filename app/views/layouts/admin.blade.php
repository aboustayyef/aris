<!DOCTYPE html>
<?php
use Aris\Node;
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@yield('title')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('/css/aris_admin.css')}}">
</head>

<body>
	<div class="adminarea">
		Admin Area - (<a href="/logout">logout</a>)
	</div>
	<div class="container">
		<p><a href="/{{Input::get('from')}}">&larr; Cancel and go Back</a></p>
		<header class="clearfix">
			<div id="logo">ARIS International School</div>
		</header>
		<content>
			<div class="row">
				@include('partials.formerrors')
				<div class="col-md-9 col-sm-12">

					@yield('content')
				</div>
			</div>
		</content>
		<footer>

		</footer>
	</div>
</body>
</html>