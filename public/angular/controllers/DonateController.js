app.controller('DonateController', function($scope, $http, API_URL,$filter) {
    //retrieve employees listing from API
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

    var vm = this;
    var vals = [];
    vm.listProdsCar = [];

    vm.car = {
        total: 0
    }

    function activate(){

            //retrieve employees listing from API
            $http.get(API_URL + "productsbasket")
            .success(function(response) {
                vm.listProduts = response;
                console.log(vm.listProduts.id);
            });
    
    }

    vm.addCar = function(product){
        console.log(product);
        vm.car.idbasket=product.id;
        var l = $filter('filter')(vm.listProdsCar, {id: product.id});   
        if(!l.length){
            vm.listProdsCar.push(angular.copy(product));
            console.log(vm.listProdsCar);

        }else{
            alert("O produto ja esta no carrinho");
        }
    }

    vm.removeFromCar = function(index){
        vm.listProdsCar.splice(index,1);
    };

    vm.abc = function(index){
        vm.car.iduser=index;
        console.log(vm.car.iduser);

    };


    vm.getTotalCar = function(){
        var total = 0;

        if(vm.listProdsCar.length){
            
            angular.forEach(vm.listProdsCar, function(prod, abc) {
                total += 1 * prod.price;
            });

        }

        vm.car.price = total;
        console.log(vm.car.idbasket);

        return total;

    }

    vm.saveCar = function(){

        var date = new Date();

        var url = API_URL + "donation";
        vm.car.data = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);;
        console.log(vm.car.iduser);
        console.log(vm.car.idbasket);
        for (var i = 0; i < vm.listProdsCar.length; i++) {
        var aa = vm.listProdsCar.length;
        var a = vm.listProdsCar;
        var b = a.id;
        var bb = aa+i;

        var obj = {
            id : bb,
            iduser : vm.car.iduser,
            idbasket : vm.car.idbasket,
            data : vm.car.data,
            viewed : '0',
            delivered : '0'
        }
        console.log(obj);

            $http({
                method: 'POST',
                url: url,
                data: $.param(obj),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response) {
               
                alert("Doação feita com sucesso!");

            }).error(function(response) {
                console.log(response);
                alert('This shit is going down');
            }); 
         }
    }

    /*function SaveProdsCar(){

        var url = API_URL + "donation";

        angular.forEach(vm.listProdsCar, function(prod, abc) {

                
                var obj = {
                    iduser : vm.dada.iduser,
                    idbasket : vm.dada.idbasket,
                    data : data,
                    viewed : '0',
                    delivered : '0',
                }
                
                console.log(obj);

                $http({
                    method: 'POST',
                    url: url,
                    data: $.param(obj),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).success(function(response) {
                   
                        if((abc + 1) == vm.listProdsCar.length){

                            alert("carrinho guardado com sucesso")

                        }

                }).error(function(response) {
                    console.log(response);
                    alert('This is embarassing. An error has occured. Please check the log for details');
                }); 

        });

    }
*/
    activate();

});