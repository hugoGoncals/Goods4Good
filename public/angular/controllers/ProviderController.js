app.controller('ProviderController', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    $http.get(API_URL + "provider/listagem")
            .success(function(response) {
                $scope.providers = response;
            });

     $scope.reset = function() {
        $scope = "";
      };


    $scope.reverse = true;

    $scope.sortBy = function(propertyName) {
        $http.get(API_URL + "provider")
            .success(function(response) {
                $scope.provider = response;
           });
        
        $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
        $scope.propertyName = propertyName;
    };

    $scope.randomPass = function() {
        $scope.provider = {
            pass : Math.random().toString(36).substring(7)
        }
    };

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add new provider";
                break;
            case 'edit':
                $scope.form_title = "Provider detail";
                $scope.id = id;
                $http.get(API_URL + 'provider/' + id)
                    .success(function(response) {
                        console.log(response);
                        $scope.provider = response;
                    });
                break;
            default:
                break;
        }

        $('#myModal').modal('show');
    }

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "provider";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.provider),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            sendEmail($scope.provider);
            console.log(response); 
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

     function sendEmail() {
        var url = API_URL + "email/registerEmail"; 
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.provider),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) { 
            console.log(response);
            alert("An email as been sent");
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'provider/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Unable to delete');
                    });
        } else {
            return false;
        }
    }
});