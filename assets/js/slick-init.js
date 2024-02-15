jQuery(document).ready(function($) {
	
	$('.slick-slide').removeAttr('tabindex');
	
	$(window).on('load',function() {
		$('.slick-slide').removeAttr('tabindex');
	});
	
	$(window).on('resize',function() {
		if ($(window).width() > 720) {
			$('.slick-slide').removeAttr('tabindex');
		}
	});	
	
});