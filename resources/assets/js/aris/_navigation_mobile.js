
$(document).ready(function(){
	// toggle mobile menu
	$('.mobileMenuButton').on('click', function(){
		$('.mobileMenuButton').toggleClass('active');
	});

	// toggle mobile sections
	$('.megaMenu__section').on('click', function(){
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			return;
		};
		// first, deactivate all others
		$('.megaMenu__section').each(function(){
			$(this).removeClass('active');
		});
		// then activate the one that is clicked
		$(this).toggleClass('active');	
	});
});