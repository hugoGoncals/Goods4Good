app.controller('initPageProviderController', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    $http.get(API_URL + "donation/listBasket/1")
        .success(function(response) {
            $scope.donations = response;
        });

    $http.get(API_URL + "donation/listDonationsDetails/1")
        .success(function(response) {
            $scope.listdonations = response;
        });

    $http.get(API_URL + "product/listProductByProvider/1")
        .success(function(response) {
            $scope.products = response;
        });


$scope.init = function(id) {         
    $http.get(API_URL + "product/listProductByProvider/1")
    .success(function(response) {
        $scope.products = response;
    });
   // alert("ID "+id.id);
     
    }


     //show modal form
    $scope.toggle = function(id) {       
        $scope.form_title = "Order details";
        
        $http.get(API_URL + 'donation/listLines/' + id)
            .success(function(response) {
                $scope.orders = response;
            });

        //updateVisualization(id);       

        $('#myModal').modal('show');
     
    }

    $scope.updateDelivered = function(id) {
        $('#myModal').modal('show');
        console.log(id);

        var url = API_URL + "donation/" +id;

            var obj = {
                idstatus : 7
            };
        console.log(obj);

        $http({
            method: 'POST',
            url: url,
            data: $.param(obj.idstatus),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
          
            setTimeout("location.reload(true);", 1);
                

        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        }); 


    }
});