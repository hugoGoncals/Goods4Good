app.controller('InboxController', function($scope, $http, API_URL) {
    	
    //retrieve employees listing from API
    $http.get(API_URL + "notification/showMenssagesReceived/1")
            .success(function(response) {
                $scope.msg = response;
            });
    $http.get(API_URL + "notification/showMenssagesReceivedReaded/1")
            .success(function(response) {
                $scope.msgreaded = response;
            });
    $http.get(API_URL + "listUsers/")
            .success(function(response) {
                $scope.utiTo = response;
            });
    $http.get(API_URL + "notification/showMenssagesSent/1")
            .success(function(response) {
                $scope.msgsent = response;
            });
    $http.get(API_URL + "notification/countMessagesUnreaded/1")
            .success(function(response) {
                $scope.msgcount = response;
            });

    $scope.toggle = function(id) {
        
        $http.get(API_URL + 'notification/menssageList/' + id)
            .success(function(response) {
            	$scope.showmsg = response;
            });
		$('#myModal').modal('show');
             
    } 

    $scope.toggleStatus = function(id) {
        
        $http.post(API_URL + "notification/" + id)
            .success(function(response) {
                $scope.makereaded = response;
            });
        $('#myModal').modal('hide');
        location.reload();
    } 

    $scope.toggleNewOpen = function() {
        $('#myModalNewMessage').modal('show');
    } 

    $scope.toggleNew = function(request) {
        $http({
            method: 'POST',
            url: API_URL + "notification/",
            data: $.param(request),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {});
        $('#myModalNewMessage').modal('hide');
        location.reload();
    }  

    $scope.toggleDeleteMsg = function(id) {
        
        $http.delete(API_URL + "notification/" + id)
            .success(function(response) {
                $scope.makereaded = response;
            });
        location.reload();
    } 

      //filtros
});