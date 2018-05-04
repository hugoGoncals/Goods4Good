app.controller('urgentNeedsController', function($scope, $http, API_URL, $filter) {
    
    $http.get(API_URL + "urgentNeeds")
    .success(function(response) {
        $scope.productos = response;
   });
    
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

        $('#myModal').modal('show');
    }
    
         
    
     
    
    
       
    
         
    
         
    
    
    
       });          