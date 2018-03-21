app.controller('productsBasket', function($scope, $http, API_URL,$filter) {
    //retrieve employees listing from API
    
    $http.get(API_URL + "productsbasket/listbasket/1")
            .success(function(response) {
                $scope.productsbaskets = response;
                });


});