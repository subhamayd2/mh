$(document).ready(function () {
    print_time(parseInt($("#time").text()));
});

function print_time(duration){
    var h = parseInt(duration / 3600);
    var m = parseInt((duration%3600) / 60);
    var s = parseInt((duration%3600)%60);
    $("#time").text(zero(h)+"h"+zero(m)+"m"+zero(s)+"s");
}

function zero(val) {
    if(val < 10) return "0"+val;
    else return val;
}