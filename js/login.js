$(document).ready(function () {
    var chkmail = false;

    $('select').material_select();
    $(window).load(function () {
        $(".loading").fadeOut(2000);
    });

    $("#show-reg").click(function () {
        $(".login-wrapper").css({right: "100%"});
        $(".reg-wrapper").css({left: "0"});
    });
    $("#show-login").click(function () {
        $(".login-wrapper").css({right: "0"});
        $(".reg-wrapper").css({left: "100%"});
    });



    $("#signup").click(function () {
        var type = $("#type").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var pass = $("#pass").val();
        var mobile = $("#mobile").val();

        var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        var mobile_reg = /^(\+\d{1,3}[- ]?)?\d{10}$/;

        if(fname == "" || lname == "" || email == "" || pass == "" || mobile == ""){
            Materialize.toast('Please enter all details!', 3000, 'blue lighten-1');
            return;
        }
        if(!reg.test(email)){
            Materialize.toast('Please check your email.', 3000, 'yellow darken-4');
            return;
        }
        if(!mobile_reg.test(mobile)){
            Materialize.toast('Please check your mobile number.', 3000, 'yellow darken-4');
            return;
        }
        if(!chkmail) return;
        if($("#signup").text().toLowerCase() != 'sign up') return;
        $("#signup").text('Signing up...');
        $.ajax({
            type: 'POST',
            url: 'http://localhost/mh/php/register.php',
            data: {
                fname: fname,
                lname: lname,
                email: email,
                mobile: mobile,
                pass: pass,
                type: type,
                func: 'setUser'
            },
            success: function (result) {
                $("#signup").text('Sign up');
                var s = result.toString();
                alert(s);
                if(s == 1){
                    Materialize.toast('Successfully registered. PLease check your mail!', 3000, 'green darken-1');
                    window.localStorage.setItem("__id", "one-time");
                }
                else {
                    Materialize.toast('There has been some error. Please try again!', 3000, 'red darken-1');
                }
            }
        });

    });

    $("#email").on('change', function () {
        if($("#email").val() == "") return;
        $(".loading .loading-wrapper p").text("Checking email...");
        $(".loading").fadeIn(500);
        $.ajax({
            type: 'POST',
            url: 'http://localhost/mh/php/register.php',
            data: {
                email: $("#email").val(),
                func: 'checkEmail'
            },
            success: function (result) {
                var s = result.toString();
                $(".loading").fadeOut(500);
                if(s == 1){
                    Materialize.toast('The email already exists!', 3000, 'red darken-1');
                    chkmail = false;
                }
                else if(s == 0){
                    chkmail = true;
                }
                else {
                    Materialize.toast('There was some error', 3000, 'red darken-1');
                    chkmail = false
                }
            }
        })
    });
});

function login(){
    var uid = $("#uid").val();
    var pass = $("#upass").val();
    var rem = document.getElementById('rem_me').checked;
    var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

    if(uid == "" || pass == ""){
        Materialize.toast('Please enter all details!', 3000, 'blue lighten-1');
        return;
    }
    if(!reg.test(uid)){
        Materialize.toast('Please check your email.', 3000, 'yellow darken-4');
        return;
    }
    $("#login").text("Logging in...");

    $.ajax({
        type: 'POST',
        url: 'http://localhost/mh/php/login.php',
        data: {
            uid: uid,
            pass: pass
        },
        success: function (result) {
            $("#login").text("Log in");
            var s = result.toString();
            if(s == 1){
                if(rem){
                    localStorage.setItem("api_app_key", uid);
                }
                $("#login").text("Logged in");
                window.localStorage.setItem("__id", "one-time");
            }
            else {
                Materialize.toast('Invalid ID/Password', 3000, 'red darken-1');
            }
        }
    })

}