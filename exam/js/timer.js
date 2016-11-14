var h=0,m=0,s=0;
var timer = false;
var dtime = 0;
$(document).ready(function () {
    (function () {
        var duration = $("#timer").data("duration");
        dtime = duration;
        print_time(duration);
    })();
});

var start_timer = function () {
    timer = true;
    setInterval(function(){
        var d = ((h*3600)+(m*60)+(s)) - 1;
        if(d < 0){
            final_submit();
            return;
        }
        print_time(d);
    }, 1000);
};

function print_time(duration){
    h = parseInt(duration / 3600);
    m = parseInt((duration%3600) / 60);
    s = parseInt((duration%3600)%60);
    $("#timer").text(zero(h)+":"+zero(m)+":"+zero(s));
}

function zero(val) {
    if(val < 10) return "0"+val;
    else return val;
}