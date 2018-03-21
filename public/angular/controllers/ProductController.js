app.controller('ProductController', function($scope, $http, API_URL, $filter) {


    $scope.listProds = [];


    $http.get(API_URL + "categorie")
        .success(function(response) {
            $scope.categories = response;
        });

    $scope.listarProd = function(id) {

        console.log(id);
       
                $http.get(API_URL + 'product/listProductByCategory/' + id)
                        .success(function(response) {
                            $scope.products = response;
                        });
            
        }


        if($scope.id != 0){
            $scope.listarProd($scope.id);
        }


    $scope.addProvider = function(product){

        console.log(product);
        
        var l = $filter('filter')($scope.listProds, {id: product.id});   
        if(!l.length){
            $scope.listProds.push(angular.copy(product));
        }else{
            alert("O produto ja esta no carrinho");
        }
    }

    $scope.removeProvider = function(index){
        $scope.listProds.splice(index,1);
    };

     $scope.SaveProds = function (){

        angular.forEach($scope.listProds, function(prod, putaquepariu) {

             var url = API_URL + "product/" +prod.id;


                var obj = {

                    idprovider : 1,
                    price : prod.price,
                }

                console.log(obj);
                    
                $http({
                    method: 'POST',
                    url: url,
                    data: $.param(obj),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function(response) {
                   
                        if((putaquepariu + 1) == $scope.listProds.length){

                            alert("produto guardado com sucesso")

                        }

                }).error(function(response) {
                    console.log(response);
                    alert('This is embarassing. An error has occured. Please check the log for details');
                }); 

        });

    }

            $scope.open = function() {
                $scope.showModal = true;
            };



   });          