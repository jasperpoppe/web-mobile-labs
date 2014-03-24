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
    $objs = [];
    
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
            $objs = data;
            $objs.sort(SortByPriority);
            $scope.todos = $objs;
        })
        .error(function(data, status) {
            alert("Error");
        });

        //This will sort the todos
        function SortByPriority(a, b){
          var aName = a.priority.toLowerCase();
          var bName = b.priority.toLowerCase();
          //return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
          return ((aName == 'low') ? 1 : ((aName == 'high') ? -1 : ((aName == 'normal' && bName == 'high') ? 1 : -1)));
        }
    };

    $scope.saveNewTodo = function(){

        $http({
            url: "http://localhost:8888/web-mobile-labs/Lab5/todolist-api/web/todos/",
            data: {
                what: $scope.newtodo.what,
                priority: $scope.newtodo.priority
            },
            method: 'POST'
        }).success(function(data){
            window.location.href = '#';
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
            method: 'POST'
        }).success(function(data){
            console.log("OK", data);
            window.location.href = '#';
        }).error(function(err){
            console.log("ERR", err);
        });
    }
}]);