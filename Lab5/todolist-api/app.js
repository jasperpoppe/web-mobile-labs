var todoApp = angular.module('todoApp', []);

todoApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/EditTodo/:todoId', {
	    templateUrl: 'templates/edit_todo.html',
	    controller: 'EditTodoController'
      });
}]);
 

todoApp.controller('TodoController', function($scope, $http){
	/*$scope.todos = [
	    { id: 1,
	      'what': 'A very urgent task', 
	      'priority':'high', 
	      'added_on': '2012-12-03 13:56:08'
	    },
	    { id: 2,
	      'what': 'A normal priority task', 
	      'priority':'normal', 
	      'added_on': '2012-12-03 13:56:08'
	    },
	    { id: 3,
	      'what': 'A low priority task', 
	      'priority':'low', 
	      'added_on': '2012-12-03 13:56:08'
	    }
	];*/

	$scope.items = [];
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
});


todoApp.controller('EditTodoController', function($scope, $routeParams) {

    $scope.todo_id = $routeParams.todoId;
    $scope.todo_what = $routeParams.todoId;
    $scope.todo_priority = $routeParams.todoId;
    $scope.todo_added_on = $routeParams.todoId;
 
});