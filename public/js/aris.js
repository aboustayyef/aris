$('h4.folding').on('click', function(){
	var tg = $(this).data('target');
	$(".foldable[data-target=" + tg + "]").toggleClass('open');
});
$('.flexslider').flexslider();
$(document).ready(function(){

// When mouse hovers over section, it becomes active
$('.sections>li').hoverIntent({
	// mouse enter
	over:function(){
		$('.sections li.active').removeClass('active');
		$(this).addClass('active');
	}, 
	// do nothing on mouse leave
	out:function(){
		console.log('left');
	},
	interval:60
});

$('.section_nav_list>ul>li').hoverIntent({
	// mouse enter
	over:function(){
		$('.section_nav_list>ul>li.active').removeClass('active');
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
$(document).ready(function(){
	// toggle mobile menu
	$('#mobileMenu h3').on('click', function(){
		$('#mobileMenu').toggleClass('active');
	});

	// toggle mobile sections
	$('#mobileMenu > ul > li').on('click', function(){
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			return;
		};
		// first, deactivate all others
		$('#mobileMenu > ul > li').each(function(){
			$(this).removeClass('active');
		});
		// then activate the one that is clicked
		$(this).toggleClass('active');	
	});
});
$(document).ready(function(){

	// check if page has tabs
	if ($('.tab_sections').length > 0) {

		// check if the url has a #hash
		if (window.location.hash)  {
			var $activate = window.location.hash.substring(1);
			// if there's a tab with that section name, activate it
			if ($('.tab[data-section="' + $activate + '"]').length > 0) {
				$('.tab.active').removeClass('active');
				$('.tab_section.active').removeClass('active');
				$('.tab[data-section="' + $activate + '"]').addClass('active');
				$('.tab_section[data-section="' + $activate + '"]').addClass('active');
			};
			
		};

		// now do the normal business
		// stretch the wrapper to fit the content
		$('.tab_sections').css('min-height', $('.tab_section.active').height());
		
		// when a tab is clicked
		$('.tab').on('click', function(){
			// only act when non active tab is clicked
			if (! $(this).hasClass('active')) {
				$('.tab.active').removeClass('active');
				$(this).addClass('active');

				// toggle visibility of sections
				$section = $(this).data('section');
				$('.tab_section.active').removeClass('active');

				$('.tab_section[data-section="' + $section + '"]').addClass('active');

				// stretch the wrapper to fit the content
				$('.tab_sections').css('min-height', $('.tab_section.active').height());
			};
		});
	}
});