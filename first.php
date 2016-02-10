<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular.min.js"></script>
  <meta charset="utf-8">
  <title>JS Bin</title>
  <script type="text/javascript">
    var app = angular.module('test' , []);
	app.controller('Test' , function($scope,$http) {
		
		var albums_url = "http://localhost/mongodb_angularjs/select.php";		
		$http.get(albums_url).success(function(data){
			$scope.albums = data;
		});	
				
		$scope.edit = function (album) {
		   console.log("edit id: "+album.id.$id);
		   $scope.id = album.id.$id;
		   $scope.name = album.name;
		   $scope.profession = album.profession;
		   $scope.mobile = album.mobile;
		};
		
		$scope.saveItems = function () {
		   var id 		  = $scope.id;
		   var name 	  = $scope.name;
		   var profession = $scope.profession;
		   var mobile 	  = $scope.mobile;
		   
		   console.log("submit values:{"+ id+"="+name+"="+profession+"="+mobile+"}");
		};
		
		
		$scope.delete = function (album) {
			console.log("delete id: "+album.id.$id);
		};
	});
  </script>
</head>
<body ng-app='test' ng-controller="Test">



	<div class="container">
		<div class="row">		   
			<div class="md-col-12">
				<h2>MongoDB+AngularJS+PHP+Bootstrap Sample Application</h2>
				<hr/>
			</div>
		</div>	
		<div class="row">		   
			<div class="md-col-4">
				<form id="myFrm" class="vertical-form">
				<input type="hidden" ng-model="id" value=""/>
				<table>	      
					<tr><td><input type="text" class="form-control" ng-model="name" placeholder="Name"/></td></tr>
					<tr><td><input type="text" class="form-control" ng-model="profession" placeholder="Profession"/></td></tr>
					<tr><td><input type="text" class="form-control" ng-model="mobile" placeholder="Mobile"/></td></tr>
					<tr><td><input type="button" class="btn btn-primary" ng-click="saveItems()" value="Save"/></td></tr>
				</table>	
				</form>		   					   
		    </div>
			<div class="md-col-8">&nbsp;</div>		   		   
		</div>
		
		<div class="row">
			<div class="md-col-8">
				<table class="table">
				<tbody>
					<tr ng-repeat="album in albums">
						<td>{{ album.name }}</td>
						<td>{{ album.profession }}</td>
						<td>{{ album.mobile }}</td>
						<td><button class="btn btn-info" ng-click="edit(album)">Edit</button>
						<button class="btn btn-danger" ng-click="delete(album)">Delete</button></td>						
					</tr>
				</tbody>
				</table>		
			</div>
		</div>
	
		
	</div>



	

	
	
</body>
</html>