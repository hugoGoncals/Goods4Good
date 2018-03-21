app.controller('ProductbasketController', function($scope,$window, $http, API_URL,$filter) {

    var vm = this;
    var utilizador;
    var vals = []; 
    vm.listProdsCar = []; 
    vm.listProdsCarAut = [];
    vm.listaProviders = [];
    vm.listaCategorias = [];
    var totalCabaz = 0;

    if(sessionStorage.getItem('prods')){
       var json = sessionStorage.getItem('prods')
       vm.listProdsCar = angular.fromJson(json);
    }
    
    //console.log(vm.listProdsCar);
    var qtt=0;
    vm.car = {
        total: 0,
        idbasket: 0,
        quantity: 0
    }

    function activate(){
        
                $http.get(API_URL + "productsbasket/listbasket/1")
                .success(function(response) {
                    vm.productsbaskets = response;
                    vm.listBk = [];
                    
        
                    var ant = 0;
                    var ab =0;
                    
                    angular.forEach(vm.productsbaskets, function(basket, key) {
        
                        if(basket.id != ant){
                            vm.listBk.push({id : basket.id, name : basket.name, price: basket.price, prods:[]});
                            ant = basket.id;
                        }
                        
                    });
        
                    console.log(vm.listBk);     
        
                    angular.forEach(vm.listBk, function(basket, key) {
        
                        angular.forEach(vm.productsbaskets, function(prod, key) {
        
                            if(basket.id == prod.id){
                               // alert("ASASD "+prod.quantity);
                                basket.prods.push({description : prod.description, quantity:prod.quantity, price : prod.price});
                                
                            }
                            
                        });
                        
                    });
        
        
                });
                
            }

            vm.inicio = function(id){
                //alert("ID "+id.id);
                utilizador=id.id;
            }

    vm.addCar = function(product){
       // console.log(product);
        qtt++;
        var ant = 0;
        vm.car.idbasket=product.id;
        vm.listProdsCar.push(angular.copy(product));
        vm.car.quantity = qtt;                
        vm.setSessionStorage();
        //console.log(vm.car);
        //console.log(vm.listProdsCar);
    }

    vm.removeFromCar = function(index){
        vm.listProdsCar.splice(index,1); 
        vm.setSessionStorage();
        console.log(vm.listProdsCar);
    };

    vm.abc = function(index){
        vm.car.iduser=index;
       // console.log(vm.car.iduser);
    };

    vm.getTotalCar = function(){
        var total = 0;
        if(vm.listProdsCar.length){
            
            angular.forEach(vm.listProdsCar, function(prod, key) {
                total += 1 * prod.price;
            });

        }
        vm.car.price = total;
        //console.log(vm.car.idbasket);

        return total;
    }

    vm.saveCar = function(){
        var date = new Date();

        var url = API_URL + "donation";
        vm.car.data = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
        //console.log(vm.car.iduser);
        //console.log(vm.car.idbasket);
            var aa = vm.listProdsCar.length;
            var a = vm.listProdsCar;
            var b = a.id;

            var obj = {
                iduser : 19,
                idstatus : 6,
                data : vm.car.data,
                totaldone : vm.getTotalCar()
            }            

            //console.log(obj);

            $http({
                method: 'POST',
                url: url,
                data: $.param(obj),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response) { 
                //console.log(response);
                SaveCenas(response);
                //alert("Doação feita com sucesso!");
            }).error(function(response) {
                //console.log(response);
                //alert('This shit is going down');
            });
                    
        vm.setSessionStorage();
    }

    function SaveCenas(iddone){
        var urlcar = API_URL + "linedonation";
        //console.log(vm.car.idbasket);
        angular.forEach(vm.listProdsCar, function(basket,key) {
            //console.log(basket);
            var obj = {
                iddonation : iddone,
                quantity : 2,
                idbasket : basket.id,
                value : basket.price
            }

        $http({
            method: 'POST',
            url: urlcar,
            data: $.param(obj),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response) {
                console.log(response);           
                //alert("Doação feita com sucesso linhaaaaa!");
            }).error(function(response) {
                console.log(response);
                //alert('This shit is going down lineeeee');
            });
        });
    }
    activate();

    vm.setSessionStorage = function(){
        sessionStorage.setItem('prods', angular.toJson(vm.listProdsCar));
    }

vm.limpa = function(){
    sessionStorage.clear();
};
 vm.saveCar = function(){
        var date = new Date();

        var url = API_URL + "donation";
        vm.car.data = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2);
        //console.log(vm.car.iduser);
        //console.log(vm.car.idbasket);
            var aa = vm.listProdsCar.length;
            var a = vm.listProdsCar;
            var b = a.id;

            var obj = {
                iduser : 1,
                idstatus : 6,
                data : vm.car.data,
                totaldone : vm.getTotalCar()
            }            

            //console.log(obj);

            $http({
                method: 'POST',
                url: url,
                data: $.param(obj),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response) { 
                //console.log(response);
                //alert(response);
                SaveCenas(response);
                //alert("Doação feita com sucesso!");
            }).error(function(response) {
                //console.log(response);
                //alert('This shit is going down');
            });
                    
        vm.setSessionStorage();
    }

    function SaveCenas(iddone){
        var urlcar = API_URL + "linedonation";
        //console.log(vm.car.idbasket);
        angular.forEach(vm.listProdsCar, function(basket,key) {
            //console.log(basket);
            var obj = {
                iddonation : iddone,
                quantity : 2,
                idbasket : basket.id,
                value : basket.price
            }

        $http({
            method: 'POST',
            url: urlcar,
            data: $.param(obj),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).success(function(response) {
                console.log(response);   
                $window.location.href = '/';        
                //alert("Doação feita com sucesso linhaaaaa!");
            }).error(function(response) {
                console.log(response);
                //alert('This shit is going down lineeeee');
            });
        });
    }
});