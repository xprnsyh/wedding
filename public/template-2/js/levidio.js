$(document).ready(function () {
    var scroll = $(window).scrollTop();
    slideNav(scroll, 250);

    resetPadding();
    $(window).on('resize', function() {
        resetPadding();
    });
    
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        slideNav(scroll, 250);
    });
})

function slideNav(scroll, scrollHeight){
    if (scroll > scrollHeight) {
        $('#top-nav').css('top', 0);
    } else {
        $('#top-nav').css('top', -100);
    }
}

function resetPadding(){
    if($(window).width() < 575){
        $('.xs--reset--padding').removeClass(function (index, className) {
            return (className.match(/\bpr-\S+/g) || []).join(' ');
        });
        $('.xs--reset--padding').removeClass(function (index, className) {
            return (className.match(/\bpl-\S+/g) || []).join(' ');
        });
    }
}

$('.share').click(function(){
    $('.separator').toggleClass('toggled');
    $('.share-social').fadeToggle(500);
});