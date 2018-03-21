app.controller('badgetController', function($scope, $http, API_URL) {

    $http.get(API_URL + "badget")
    .success(function(response) {
    	$scope.badgets = response;
    });

    
});