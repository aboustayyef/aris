<?php 

// pick random slides to show
	
	//settings
	
	$slidesAvailable = 17;
	$slidesToSkip = [1,3,9,12];
	$slidesToShow = 6;
	$slideSet = [];

	// Create random set;

	while (count($slideSet) < $slidesToShow) {
		$candidate = mt_rand(1, $slidesAvailable);
		if (!in_array($candidate, $slideSet) && !in_array($candidate, $slidesToSkip)) {
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
				<img src="{{asset('img/slides/slide' . $slideNumber . '.jpg?v=2')}}" alt="">
			</li>

	   	@endforeach

	  </ul>
	</div>
