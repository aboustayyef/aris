$(document).ready(function(){

// When mouse hovers over section, it becomes active
$('.megaMenu>li').hoverIntent({
	// mouse enter
	over:function(){
		$('.megaMenu li.active').removeClass('active');
		$(this).addClass('active');
	}, 
	// do nothing on mouse leave
	out:function(){
		console.log('left');
	},
	interval:60
});

$('.megaMenu__left_panel>ul>li').hoverIntent({
	// mouse enter
	over:function(){
		$('.megaMenu__left_panel>ul>li.active').removeClass('active');
		$(this).addClass('active');
	}, 
	// mouse leave
	out:function(){
		//do nothing
	},
	interval:20
});

// ways to make sure navigation is turned off if mouse goes far

//1- if it leaves the big ul.subsections window
$('.megaMenu__wrapper').hover(
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
		$('.megaMenu li.active').removeClass('active');
	}, 
	// on mouse leave
	function(){
		//do nothing;
});
});