app.controller('adminProviderProductsController', function($scope, $http, API_URL) {

        $http.get(API_URL + "product/productList/1")
            .success(function(response) {
                $scope.products = response;
           });
            
            });
