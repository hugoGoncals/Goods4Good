app.controller('checkout', function($scope, $http, API_URL,$filter) {

    var vm = this;

    vm.car = {
    total: 0
    
    }

    vm.listProdsCar = [];
    if(sessionStorage.getItem('prods')){
       var json = sessionStorage.getItem('prods')
       
       vm.listProdsCar = angular.fromJson(json);
    }

    vm.removeFromCar = function(index){
        vm.listProdsCar.splice(index,1);
    };

    console.log(vm.listProdsCar);


    vm.setSessionStorage = function(){
        sessionStorage.setItem('prods', angular.toJson(vm.listProdsCar));
    }

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
    vm.limpa = function(){
        sessionStorage.clear();
    };
});


