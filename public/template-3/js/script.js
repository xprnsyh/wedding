$(document).ready(function () {
    $(window).on('scroll', function (event) {
        var scroll = $(window).scrollTop();
        if (scroll > 0) {
            $('nav').addClass('nav--yellow');
        } else {
            $('nav').removeClass('nav--yellow');
        }
    }).trigger('scroll');
});