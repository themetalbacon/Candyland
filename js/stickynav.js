(function($) {
// Sticky Header

var $header = $(".header-container"),
$navbar = $("#ygsnav"),
y_top = $header.height();

$(window).resize(function() {
  y_top = $header.height();
})

$(window).scroll(function() {
    if ($(window).scrollTop() > y_top) {
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
