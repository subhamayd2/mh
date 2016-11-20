var app = angular.module('app', []);

app.controller('callsCtrl', function ($scope, $http) {
    $scope.no_of_calls = 0;
    var isAlertShown = false;
    var isFirst = 0;
    $scope.clist = [];
    $scope.tmp_list = [];
    var ring = new Audio("media/new_call.wav");
    setInterval(function () {
        $http({
            method: 'POST',
            url: 'http://localhost/mh/admin/php/get_calls.php',
            data: {},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function(response){
                $scope.tmp_list.splice(0, $scope.tmp_list.length);
                angular.forEach(response.data.children, function(i){
                    $scope.tmp_list.push(i.data);
                });
                if(isFirst < 2) isFirst ++;
                if($scope.tmp_list.length > $scope.no_of_calls){
                    $scope.clist.splice(0, $scope.clist.length);
                    $scope.clist = angular.copy($scope.tmp_list);

                    notify(($scope.clist.length - $scope.no_of_calls));
                    $scope.no_of_calls = $scope.clist.length;
                }
            })
            .error(function(){
                Materialize.toast('Server error. Please reload page!', 3000, 'red darken-1');
            });
    }, 1500);
    var notify = function (c) {
        //alert(c);
        if(isFirst < 2){
            return;
        }
        //alert(c);
        if(isAlertShown){
            document.getElementById("alert_text").innerHTML = parseInt(document.getElementById("alert_text").innerHTML) + c;
        }
        else{
            document.getElementById("alert_text").innerHTML = c;
            document.getElementById("call_alert").style.display = "block";
            isAlertShown = true;
        }
        ring.play();
    };
    $scope.close_alert = function () {
        document.getElementById("call_alert").style.display = "none";
        isAlertShown = false;
    };
    $scope.done = function (id) {
        var status_btn = document.getElementById("status_"+id);
        status_btn.innerHTML = "Wait";
        $http({
            method: 'POST',
            url: 'http://localhost/mh/admin/php/call_done.php',
            data: {
                id: id
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function(response){
                var s = response.toString();
                if(s == 1){
                    status_btn.innerHTML = "done";
                    status_btn.className += "status_done";
                }
            });
    };
});