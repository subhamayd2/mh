$(document).ready(function () {

    var settings = null;

    $(".exam-selector").on('click', 'a', function () {
        var testid = $(this).data("testid");
        var subid = $(this).data("subid");
        settings = getSettings(testid, subid);
        if(settings != null){
            $('#rules .modal-content h4').text($(this).text());
            $('#rules .modal-content p').html(settings.rules.replace(/\*\*/g, '<br>'));
            $('#rules').openModal();
        }
        else {
            Materialize.toast('An error occurred. Please try again.', 3000, 'rounded red darken-1');
        }
    });
    
    $('.start-test').click(function () {
        var params = settings;
        settings = null;
        post('./exam.php', params);
    });

});

function getSettings(testid, subid){
    var data = {};
    var avail = false;
    for(var i = 0; i < test.length; i++){
        if(testid == test[i].test_id && subid == test[i].sub_test_id){
            avail = true;
            data['test_id'] = testid;
            data['sub_test_id'] = subid;
            data['test_name'] = test[i].sub_test_name;
            data['duration'] = test[i].duration;
            data['no_of_ques'] = test[i].no_of_ques;
            data['negative'] = test[i].negative;
            data['positive'] = test[i].positive;
            data['no_answer'] = test[i].no_answer;
            data['rules'] = test[i].rules;
            if(test[i].double_type == true){
                data['double_type'] = true;
                data['d_no_of_ques'] = test[i].d_no_of_ques;
                data['d_n_marks'] = test[i].d_n_marks;
                data['d_p_marks'] = test[i].d_p_marks;
                data['d_no_marks'] = test[i].d_no_marks;
            }
        }
    }
    if(avail){
        return data;
    }
    else {
        return null;
    }
}

function post(path, params, method) {
    method = method || "post";

    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}