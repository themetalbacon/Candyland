(function($) {
// Sticky Header

var $navbar = $("#ygsnav"),
y_pos = $navbar.offset().top;

$(window).scroll(function() {

    if ($(window).scrollTop() > y_pos) {
        $navbar.addClass('navbar-fixed-top')
    } else {
        $navbar.removeClass('navbar-fixed-top');
    }
});

// Mobile Navigation
$('.navbar-toggle').click(function() {
    if ($navbar.hasClass('open-nav')) {
        $navbar.removeClass('open-nav');
    } else {
        $navbar.addClass('open-nav');
    }
});


})(jQuery, undefined);
