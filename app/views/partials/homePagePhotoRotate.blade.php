<?php

// pick random photo to show

	//settings

	$photosAvailable = 5;
	$candidate = mt_rand(1, $photosAvailable);
	$photolocation = 'img/featured/welcome' . $candidate . '.jpg';
?>

<img src="{{asset($photolocation)}}" width="100%" alt="">
