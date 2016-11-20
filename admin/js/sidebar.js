$(document).ready(function () {
    $(window).load(function () {
        if($(window).width() > 992)
            $(".main-content-wrapper").css({width: ($(window).width() - 250)+"px"});
    });
    $(".toggle-menu").click(function () {
        $(".sidebar-wrapper").toggleClass('open');
        $(".sidebar-backdrop").toggleClass('active');
    });
    $(".sidebar-backdrop").click(function () {
        $(".sidebar-wrapper").toggleClass('open');
        $(".sidebar-backdrop").toggleClass('active');
    });
});