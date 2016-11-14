var qid = $("#qid").val().split(",");
var aid = [];

(function(){
    for(var idx = 0; idx < qid.length; idx ++){
        aid[idx] = "x";
    }
})();

$(document).ready(function () {
    var curr_ques = 1;
    var mode = null;
    $(document).on ('mozfullscreenchange webkitfullscreenchange fullscreenchange',function(){
        if(mode == null){
            mode = true;
        }
        else if(mode == true){
            final_submit();
        }
    });

    $('.nav-wrapper').on('click', '.chip', function () {
        fullscreen();
        var q_no = $(this).text();
        change_ques(q_no);
        curr_ques = q_no;
    });

    $('.questions-wrapper').on('click', "input[type='radio']", function(){
        var q_no = this.id.toString().split("_")[1];
        $('#nav_' + q_no).addClass('answered');
        aid[q_no-1] = this.id.toString().split("_")[2];
        fullscreen();
    });

    $("#prev").click(function () {
        fullscreen();
        if(curr_ques == 1) return;
        curr_ques --;
        change_ques(curr_ques);
    });
    $("#next").click(function () {
        fullscreen();
        var limit = $("#limit").val();
        if(curr_ques == limit) return;
        curr_ques ++;
        change_ques(curr_ques);
    });
    $("#final_submit").click(function () {
        final_submit();
    });

    function change_ques(index) {
        $(".question").removeClass('ontop');
        $(".question#q_" + index).addClass('ontop');
        $('.nav-wrapper .chip').removeClass('active');
        $('#nav_' + index).addClass('active').addClass('visited');
    }
    
});
function final_submit(){
    var d = new Date();
    var timestamp = (d.getYear() + 1900) + "-" + (zero(d.getMonth() + 1)) + "-" + zero(d.getDate());
    timestamp = timestamp + " " + zero(d.getHours()) + ":" + zero(d.getMinutes()) + ":" + zero(d.getSeconds());

    var form = document.createElement('form');
    form.setAttribute("method", 'post');
    form.setAttribute("action", './result.php');

    form.appendChild(addFormElem("hidden", "qid", qid.join(",")));
    form.appendChild(addFormElem("hidden", "aid", aid.join(",")));
    form.appendChild(addFormElem("hidden", "test_id", $("#testid").val()));
    form.appendChild(addFormElem("hidden", "sub_id", $("#subid").val()));
    form.appendChild(addFormElem("hidden", "dtime", dtime));
    form.appendChild(addFormElem("hidden", "time", (dtime - (((h*3600)+(m*60)+(s)))).toString()));
    form.appendChild(addFormElem("hidden", "single", $("#single").val()));
    form.appendChild(addFormElem("hidden", "double", $("#double").val()));
    form.appendChild(addFormElem("hidden", "dl", $("#dl").val()));
    form.appendChild(addFormElem("hidden", "r_timestamp", timestamp));

    document.body.appendChild(form);
    form.submit();
}

function addFormElem(type, name, value) {
    var elem = document.createElement("input");
    elem.setAttribute("type", type);
    elem.setAttribute("name", name);
    elem.setAttribute("value", value);
    return elem;
}

function fullscreen(){
    if(!timer) start_timer();
    var el = document.documentElement
        , rfs = // for newer Webkit and Firefox
            el.requestFullScreen
            || el.webkitRequestFullScreen
            || el.mozRequestFullScreen
            || el.msRequestFullScreen
        ;
    if(typeof rfs!="undefined" && rfs){
        rfs.call(el);
    } else if(typeof window.ActiveXObject!="undefined"){
        // for Internet Explorer
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript!=null) {
            wscript.SendKeys("{F11}");
        }
    }
}