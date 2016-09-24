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