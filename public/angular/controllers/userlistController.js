app.controller('userlistController', function($scope, $http, API_URL) {
    

    //retrieve employees listing from API
    $http.get(API_URL + "user")
            .success(function(response) {
                $scope.categories = response;
            });
    
   
});