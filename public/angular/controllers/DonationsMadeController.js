app.controller('DonationsMadeController', function($scope, $http, API_URL, $filter) {

    $http.get(API_URL + "donation/listDonationsMade/1")
            .success(function(response) {
                $scope.donations = response;
            });

       $http.get(API_URL + "productsbasket/listbasket/1")
        .success(function(response) {
            $scope.productsbaskets = response;
            $scope.listBk = [];
            

            var ant = 0;
            var ab =0;
            
            angular.forEach($scope.productsbaskets, function(basket, key) {

                if(basket.id != ant){
                    $scope.listBk.push({id : basket.id, name : basket.name, price: basket.price, prods:[]});
                    ant = basket.id;
                }
                
            });

            console.log($scope.listBk);     

            angular.forEach($scope.listBk, function(basket, key) {

                angular.forEach($scope.productsbaskets, function(prod, key) {

                    if(basket.id == prod.id){
                        basket.prods.push({description : prod.description, price : prod.price});
                        
                    }
                    
                });
                
            });


        });

        $scope.teste = function (id){ 

            $http.get(API_URL + "productsbasket/prods/"+id)
            .success(function(response) {
                $scope.prods = response;
            });

        }

});