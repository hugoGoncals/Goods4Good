app.controller('providerMyProdsController', function($scope, $http, API_URL) {

  var idProvider;

    $scope.init = function(id)
    {
        $http.get(API_URL + "product/listProductByProvider/"+id.id)
        .success(function(response) {
            $scope.products = response;
        }); 
    
       /* $http.get(API_URL + "product/listProductstatus/"+id.id)
        .success(function(response) {
            $scope.produtos = response;
            idProvider = response[0].idProvider;  
        }); */

        $http.get(API_URL + "provider/getProv/"+id.id)
        .success(function(response) {

            //alert("ID "+response[0].id_user);
            $scope.produtos = response;
            idProvider = response[0].id;  
        }); 

        $http.get(API_URL + "categorie")
        .success(function(response) {
            $scope.categories = response;
        });
    };


    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Suggest new product";
                break;
            default:
                break;
        }

        console.log(id);

        $('#SuggestProduct').modal('show');
    }

    $scope.teste = function(user) {
       // alert("User: "+ user.id);
    }

    $scope.save = function(request) {
        var url = API_URL + "product";
        request.idprovider=idProvider;
        //request.quantity=0;

        //append employee id to the URL if the form is in edit mode
        $http({
            method: 'POST',
            url: API_URL + "product/",
            data: $.param(request),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details.');
        });
    }

    
});