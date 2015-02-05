$(document).ready(function(){

// When mouse hovers over section, it becomes active
$('.sections>li').hoverIntent(
	// mouse enter
	function(){
		$('.sections li.active').removeClass('active');
		$(this).addClass('active');
	}, 
	// do nothing on mouse leave
	function(){
		console.log('left');
});

$('.section_nav_list>ul>li').hoverIntent(
	// mouse enter
	function(){
		$('.section_nav_list>ul>li.active').removeClass('active');
		$(this).addClass('active');
	}, 
	// mouse leave
	function(){
		//do nothing
});

// ways to make sure navigation is turned off if mouse goes far

//1- if it leaves the big ul.subsections window
$('.navigation_wrapper').hover(
	// on mouse enter
	function(){
		//do nothing
	}, 
	// on mouse leave
	function(){
		$('li.active').removeClass('active');
});


//2- if it goes towards the header;
$('header').hover(
	// on mouse enter
	function(){
		$('.sections li.active').removeClass('active');
	}, 
	// on mouse leave
	function(){
		//do nothing;
});
});