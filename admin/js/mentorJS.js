var app = angular.module('app', []);

app.controller('deleteCtrl', function ($scope, $http) {
    $scope.mlist = [];
    var get_mentee = function () {
        $http({
            method: 'POST',
            url: 'http://localhost/mh/admin/php/get_mentor.php',
            data: {},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function(response){
                $scope.mlist.splice(0, $scope.mlist.length);
                angular.forEach(response.data.children, function(i){
                    $scope.mlist.push(i.data);
                });

            })
            .error(function(){
                Materialize.toast('Server error. Please reload page!', 3000, 'red darken-1');
            });
    };
    setInterval(function () {
        get_mentee()
    }, 1500);


    $scope.confirm = function(email){
        document.getElementById("confirm-yes").dataset.email = email;
        document.getElementsByClassName('confirm-box-wrapper')[0].style.display = 'block';
    };
});