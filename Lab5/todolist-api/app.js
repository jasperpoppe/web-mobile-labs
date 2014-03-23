var todoApp = angular.module('todoApp', []);

todoApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl: 'templates/index.html',
            controller: 'TodoController'
        }).
        when('/EditTodo/:todoId', {
	       templateUrl: 'templates/edit_todo.html',
	       controller: 'EditTodoController'
        });
}]);
 

todoApp.controller('TodoController', function($scope, $http){

	$scope.todos = [];
    $scope.getItems = function() {

        $http({
        	method : 'GET',
        	url : 'http://localhost:8888/web-mobile-labs/Lab5/todolist-api/web/todos',
        	headers: {
        		'X-Parse-Application-Id':'XXX', 
        		'X-Parse-REST-API-Key':'YYY'
        	}
        })
        .success(function(data, status) {
            $scope.todos = data;
        })
        .error(function(data, status) {
            alert("Error");
        });
    };

    $scope.saveNewTodo = function(){

        $http({
            url: "http://localhost:8888/web-mobile-labs/Lab5/todolist-api/web/todos/",
            data: {
                what: $scope.newtodo.what,
                priority: $scope.newtodo.priority
            },
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'}
        }).success(function(data){
            console.log("OK", data);
        }).error(function(err){
            console.log("ERR", err);
        });
    }

    $scope.deleteTodo = function(todoId){
        $http({
            method : 'DELETE',
            url : 'http://localhost:8888/web-mobile-labs/Lab5/todolist-api/web/todos/' + todoId,
            headers: {
                'X-Parse-Application-Id':'XXX', 
                'X-Parse-REST-API-Key':'YYY'
            }
        })
        .success(function(data, status) {
            window.location.href = '#';
        })
        .error(function(data, status) {
            alert("Error");
        });
    }
});


todoApp.controller('EditTodoController', ['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {

    $scope.edittodo = [];
    $scope.getItem = function() {

        $http({
            method : 'GET',
            url : 'http://localhost:8888/web-mobile-labs/Lab5/todolist-api/web/todos/' + $routeParams.todoId,
            headers: {
                'X-Parse-Application-Id':'XXX', 
                'X-Parse-REST-API-Key':'YYY'
            }
        })
        .success(function(data, status) {
            $scope.edittodo = data;
        })
        .error(function(data, status) {
            alert("Error");
        });
    };

    $scope.save = function(todoId){
        $http({
            url: "http://localhost:8888/web-mobile-labs/Lab5/todolist-api/web/todos/" + todoId,
            data: {
                what: $scope.edittodo.what,
                priority: $scope.edittodo.priority
            },
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'}
        }).success(function(data){
            console.log("OK", data);
            window.location.href = '#';
        }).error(function(err){
            console.log("ERR", err);
        });
    }
}]);