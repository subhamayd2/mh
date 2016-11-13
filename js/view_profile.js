$(document).ready(function () {
    var nav_height = $(".page-navbar").height();
    var win_height = $(window).height();
    $(".banner").css({height: (win_height-nav_height) + "px"});
    setTimeout(function () {
        $("div.invisible").removeClass("invisible").addClass("enter");
        setTimeout(function () {
            $("img.invisible").removeClass("invisible").addClass("zoom-in");
        },1000);
    }, 100);
});