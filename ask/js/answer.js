$(document).ready(function () {
    $("#submit-answer").click(function () {
        var qid = $("#qid").val();
        var name = $("#mname").val();
        var email = $("#memail").val();
        var ans = tinymce.get('answer-text').getContent();
        if(qid == "" || name == "" || email == "" || ans == ""){
            Materialize.toast('Incomplete field(s).', 3000, 'yellow darken-4');
            return;
        }
        var d = new Date();
        var date = (d.getYear()+1900) +"-"+ zero(d.getMonth() + 1) +"-"+ zero(d.getDate()) +" "+ zero(d.getHours()) +":"+ zero(d.getMinutes()) +":"+ zero(d.getSeconds());

        $("#submit-answer").text("Submitting...");

        $.ajax({
            type: 'POST',
            url: 'http://localhost/mh/ask/php/add_answer.php',
            data: {
                qid: qid,
                name: name,
                email: email,
                ans: ans,
                a_timestamp: date
            },
            success: function (result) {
                $("#submit-answer").text("Submit answer");
                var s = result.toString();
                if(s == 1){
                    tinymce.get('answer-text').setContent("");
                    Materialize.toast('Successfully submitted your answer.', 3000, 'green darken-1');
                }
                else{
                    Materialize.toast('There has been some error. Please try again!', 3000, 'red darken-1');
                }
            }
        })
    });
});
function zero(val) {
    if(val < 10) return "0" + val;
    else return val;
}