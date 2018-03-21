app.controller('MenuSideBarController', function($scope, $http, API_URL) {
    

    //retrieve employees listing from API
    $http.get(API_URL + "categorie")
            .success(function(response) {
                $scope.categories = response;
            });
    
   
});