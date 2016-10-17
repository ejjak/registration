var fetch = angular.module('fetch', []);

        fetch.controller('dbCtrl', ['$scope', '$http', function ($scope, $http) {
            $http.get("ajax.php")
                .success(function(data){
                    $scope.data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
        }]);
