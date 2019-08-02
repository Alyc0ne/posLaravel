$(document).on("click", ".toggle-mobile-nav", function () {
    $(".nav-sidebar").addClass('navbar-open');
    $('.mobile-overlay').addClass('mobile-nav-open');
});

$(document).on("click", ".mobile-overlay", function () {
    $(".nav-sidebar").removeClass('navbar-open');
    $('.mobile-overlay').removeClass('mobile-nav-open');
});