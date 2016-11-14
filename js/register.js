$(document).ready(function () {
    $('select').material_select();
    $('.datepicker').pickadate({
        close: 'Done',
        format: 'dd/mm/yyyy',
        max: true,
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 96 // Creates a dropdown of 15 years to control year
    });

    $("#submit-mentee").click(function () {
        var str = getFormData("#mentee-form");
        if(str == null){
            Materialize.toast('Please enter all details!', 3000, 'rounded blue lighten-1');
            return;
        }

        str['dob'] = str['dob'].split("/").reverse().join("-");

        str['type'] = "Mentee";

        $.ajax({
           type: 'POST',
            url : 'http://localhost/mh/php/register.php',
            data: str,
            success: function (result) {
                var s = result.toString();
                alert(s);
            }
        });
    });

    function getFormData(formID) {
        var str = $(formID).serialize();
        var arr = str.split("&");
        var arr_name = [];
        var arr_val = [];
        var data = {};

        var name, val;

        for(var i = 0; i < arr.length; i++){
            name = arr[i].split("=")[0];
            val = arr[i].split("=")[1];

            if(val == "") return null;

            if(arr_name.indexOf(name) < 0){
                arr_name.push(name);
                arr_val.push(decodeURIComponent(val));
            }
            else{
                var pos = arr_name.indexOf(name);
                arr_val[pos] = arr_val[pos] + "," + decodeURIComponent(val);
            }
        }
        for(var j = 0; j < arr_name.length; j++){
            data[arr_name[j].toString()] = arr_val[j].replace(/\+/g, " ");
        }
        return data;
    }
});