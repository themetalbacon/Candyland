(function($) {
// Sticky Header

var $header = $(".header-image"),
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


// Nav hover
  $('#it-text').hover( function() {
    $('#it-text').toggleClass('it-animate');
  },
  function() {
    $('#it-text').toggleClass('it-animate');
  })





})(jQuery, undefined);
