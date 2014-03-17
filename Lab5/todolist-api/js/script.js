var uid = 1;

function TodoController($scope) {
	  
	$scope.todos = [
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
	];
	   
	$scope.saveTodo = function() {
	       
	  if($scope.newtodo.id == null) {
	    //if this is new contact, add it in contacts array
	    $scope.newtodo.id = uid++;
	    $scope.todos.push($scope.newtodo);
	  } else {
	    //for existing contact, find this contact using id
	    //and update it.
	    for(i in $scope.todos) {
	      if($scope.todos[i].id == $scope.newtodo.id) {
	        $scope.todos[i] = $scope.newtodo;
	      }
	    }
	  } 
	  //clear the add contact form
	  $scope.newtodo = {};
	}

	$scope.done = function(id) {
	       
	  //search contact with given id and delete it
	  for(i in $scope.todos) {
	    if($scope.todos[i].id == id) {
	      $scope.todos.splice(i,1);
	      $scope.newtodo = {};
	    }
	  }
	}
	   
	$scope.edit = function(id) {
	  //search contact with given id and update it
	  for(i in $scope.todos) {
	    if($scope.todos[i].id == id) {
	      //we use angular.copy() method to create 
	      //copy of original object
	      $scope.newtodo = angular.copy($scope.todos[i]);
	    }
	  }
	}
}