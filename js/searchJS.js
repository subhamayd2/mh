var app = angular.module('app', []);

app.controller('searchCtrl', function ($scope, $http) {
    $scope.err_msg = "Loading...";
    $scope.query = "";
    $scope.mlist = [];
    $http({
        method: 'POST',
        url: 'http://localhost/mh/php/get_mentors.php',
        data: {},
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    })
        .success(function(response){
            $scope.err_msg = "Sorry! Couldn't find anyone.";
            angular.forEach(response.data.children, function(i){
                $scope.mlist.push(i.data);
            });
        })
        .error(function(){
            Materialize.toast('Server error. Please reload page!', 3000, 'red darken-1');
        });
});
app.directive('hires', function($http) {
    return {
        restrict: 'A',
        scope: { hires: '@' },
        link: function(scope, element, attrs) {
            element.one('load', function() {
                $http({
                    method: 'HEAD',
                    url: scope.hires.toString(),
                    data: {}
                })
                    .success(function(){
                        if(scope.hires != "")
                            element.attr('src', scope.hires);
                    })
            });
        }
    };
});
app.filter('lang', function(){
    return function(input,val){
        var out = [];
        var flag = false;
        if(val == "" || val == null) return input;
        angular.forEach(input, function(language){
            var lang = val.toString().split(",");
            for(var j = 0; j < lang.length; j ++){
                if(language['u_lang'] != null && language['u_lang'].indexOf(lang[j].toString()) > -1){
                    flag = true;
                }
            }
            if(flag){
                out.push(language);
                flag = false;
            }
        });
        return out;
    }
});