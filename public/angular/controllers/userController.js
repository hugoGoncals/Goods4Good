app.controller('userController', function($scope, $http, API_URL) {
    //retrieve employees listing from API

    var vm = this;
    
    var id = document.getElementById("id").innerHTML;

   
    $http.get(API_URL + "donation/sumDonations/"+id)
    .success(function(response) {
    	$scope.don = response;
    });

$scope.toogle = function(){ 
    $('#ModalEditUser').modal('show');
    } 


$scope.editar = function(){ 
    var gender = $scope.gender;
    var age = $scope.age;
    var userlocation = $scope.userlocation;
    var url = API_URL + "user/editar";
 


    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
        }
    });
    var obj = {
        gender: $scope.gender,
        age: $scope.age,
        location: $scope.location,
        id: id
    }
 
        $http({
            method: 'POST',
            url: url,
            data: $.param(obj),
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function (response) {

           // alert("success");
            location.reload();

        }).error(function (response) {
            console.log(response);
          //  alert('This is embarassing. An error has occured.');
        });
    
}
    
});

