var isClicked = false;
$(".content").on('click', '.register-call', function () {
    var name = $(this).data('name');
    var mobile = $(this).data('mobile');

    if(isClicked) return;
    isClicked = true;
    $('.' + this.classList[0] + "[data-name='"+name+"'] i").removeClass('ion-ios-telephone');
    $('.' + this.classList[0] + "[data-name='"+name+"'] i").addClass('ion-load-c spin');

    $.ajax({
        type: 'POST',
        url: 'http://localhost/mh/php/register_call.php',
        data: {
            name: name,
            mobile: mobile
        },
        success: function (result) {
            $('.register-call i').addClass('ion-ios-telephone');
            $('.register-call i').removeClass('ion-load-c spin');
            isClicked = false;
            var s = result.toString();
            if(s == 1){
                Materialize.toast('Done. We\'ll soon get in touch with you.', 3000, 'green darken-1');
            }
            else if(s == 2){
                Materialize.toast('You need to be logged in to place a call.', 3000, 'yellow darken-4');
            }
            else{
                Materialize.toast('Server error. Please try again!', 3000, 'red darken-1');
            }
        }
    });
});