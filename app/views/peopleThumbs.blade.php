<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Who's Who?</title>
	<style type="text/css">
		body{
			padding:10px;
			max-width:1300px;
			margin:0 auto;
		}
		.thumb{
			width:300px;
			height:300px;
			float:left;
			margin:auto;
			border:1px solid #999;
			text-align: center;
			position:relative;
			margin-right:10px;
			margin-bottom:10px;
		}
		.thumb img{
			position: absolute;
			top: 50%;
			left:50%;
			transform: translate(-50%, -50%);
		}
		.number {
		float: left;
		padding: 10px;
		background: #444;
		color: white;
		font-family: sans-serif;
		}
	</style>
</head>
<body>
	<h1>Who's who?</h1>
	<p>Please send me a list of names with each person's name next to his or her number.</p>
	<div id="thumbs">
		<?php 
			$counter = 1;
			while ( $counter <= 70) {
				echo '<div class="thumb">';
				echo '<div class="number">'.$counter.'</div>';
				echo '<img src="/img/people-thumbs/people-'.sprintf('%03d',$counter).'.jpg">';
				echo '</div>';
				$counter++;
			}	
		?>
	</div>
</body>
</html>