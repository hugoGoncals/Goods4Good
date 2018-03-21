app.controller('productDelivedController', function($scope, $http, API_URL) {
 
    $http.get(API_URL + "donation/listDonations/1")
        .success(function(response) {
            $scope.donations = response;
       });
   
            $scope.toggle = function(id) {       
                $scope.form_title = "Order details";
                
                $http.get(API_URL + 'donation/listLines/' + id)
                    .success(function(response) {
                        $scope.products = response;
                    });
        
                //updateVisualization(id);       
        
                $('#myModal').modal('show');
             
            }
});