$(document).ready(function () {
	$(window).on('scroll', function (event) {
		var scroll = $(window).scrollTop();
		if (scroll > 0) {
			$('nav').addClass('nav--peach');
		} else {
			$('nav').removeClass('nav--peach');
		}
	}).trigger('scroll');

	$('.image-card').on('click', function() {
		var img = $(this).find('img').attr('src');
		$('#moments-preview').attr('src', img);
		$('#moments-modal').modal('show');
	});
});