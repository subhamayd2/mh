$(document).ready(function(){
    var nav_height = $(".page-navbar").height();
    var win_height = $(window).height();
    $('.slider').slider({full_width: true, indicators: false, height: (win_height - nav_height)});
    $(".modal-trigger").leanModal();
    $('ul.tabs').tabs();
    

    $('.carousel-slider').carousel({full_width: true});

    $(".take-test").click(function (e) {
        e.preventDefault();
        if($(".user-name").text() == "Sign in"){
            show_login_box();
        }
        else {
            alert("sad");
        }
    });
    /*$("#close-login-box").click(function () {
        hide_login_box();
    });

    function show_login_box(){
        $(".login-box").css({display: 'block'});
        $('body,html').css({overflow: 'hidden'});
        setTimeout(function () {
            $(".login-box").css({opacity: '1'});
        }, 100)
    }
    function hide_login_box(){
        $(".login-box").css({opacity: '0'});
        $('body,html').css({overflow: 'scroll'});
        setTimeout(function () {
            $(".login-box").css({display: 'none'});
        }, 350)
    }*/

});