$('h4.folding').on('click', function(){
	var tg = $(this).data('target');
	$(".foldable[data-target=" + tg + "]").toggleClass('open');
});