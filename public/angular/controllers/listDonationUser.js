app.controller('listDonationUser', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    var id = document.getElementById("id").innerHTML;

   
    $http.get(API_URL + "donation/listDonationsMadeByUser/listagem/"+id)
            .success(function(response) {
                $scope.donations = response;
    });






    $scope.toggle = function(idProduto) {
    	
        $http.get(API_URL + 'donation/listLines/' + idProduto)
        .success(function(response) {
            $scope.linedonations = response;
        });
        $('#myModal').modal('show');
    }

     $scope.init = function(id) {
        
    }



});