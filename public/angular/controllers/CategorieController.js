app.controller('CategorieController', function($scope, $http, API_URL) {
    //retrieve employees listing from API
    $http.get(API_URL + "categorie")
            .success(function(response) {
                $scope.categories = response;
            });
    
    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add new category";
                break;
            case 'edit':
                $scope.form_title = "Edit category";
                $scope.id = id;
                $http.get(API_URL + 'categorie/' + id)
                    .success(function(response) {
                        console.log(response);
                        $scope.categorie = response;
                    });
                break;
            default:
                break;
        }

        console.log(id);

        $('#myModal').modal('show');
    }

    $scope.reverse = true;

    $scope.sortBy = function(propertyName) {
        $http.get(API_URL + "categorie")
            .success(function(response) {
                $scope.categorie = response;
           });
        
        $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
        $scope.propertyName = propertyName;
    };

    
    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "categorie";
        
        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.categorie),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details.');
        });
    }

    //delete record
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'categorie/' + id
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