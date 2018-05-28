
//Angular controler file

var app = angular.module('myApp', []);
app.controller('appCtrl', function($scope) {
    $scope.count = 0;
    $scope.inc = function() {
        $scope.count++;
        //alert('yahoo');
    }
});

app.controller('customersCtrl', function($scope, $http) {
     //var x=angular.copy($scope.master);
	 var d={
		operation:"select",
		table:"client_verify",
		login: "fahed.abdellaoui2@gmail.com",
		password:"test0000"
		}
   $http.post("api.php",d)
   .then(function (response) {
    console.log(response.data);
	//var json=response.data.records
    //$scope.names = response.data.records;
   });
});