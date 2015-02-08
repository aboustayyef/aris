<?php 

// pick random slides to show
	
	//settings
	
	$slidesAvailable = 7;
	$slidesToShow = 4;
	$slideSet = [];

	// Create random set;

	while (count($slideSet) < $slidesToShow) {
		$candidate = mt_rand(1, $slidesAvailable);
		if (!in_array($candidate, $slideSet)) {
			$slideSet[] = $candidate;
		}
	}

?>

	<div class="flexslider">
			<div class="gateway">
				<div class="inner">
					The Gateway to Knowledge
				</div>
			</div>
	   <ul class="slides">

	   	@foreach ($slideSet as $key => $slideNumber)
			
			<li>
				<img src="{{asset('img/slides/slide' . $slideNumber . '.jpg')}}" alt="">
			</li>

	   	@endforeach

	  </ul>
	</div>
