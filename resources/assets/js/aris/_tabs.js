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