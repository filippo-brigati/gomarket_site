$(function () {
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 10) {
            $(".navbar").addClass("shadow");
        } else {
            $(".navbar").removeClass("shadow");
        }
    });
});