
var app = angular.module('myApp', ["angucomplete-alt"]);

app.filter('getById', function() {
  return function(input, id) {
    var i=0, len=input.length;
    for (; i<len; i++) {
      if (+input[i].id == +id) {
        return i;
      }
    }
    return -1;
  }
});

app.controller('ArrayController', function ($scope,$filter, $http, $location) {
 var tmpDate = new Date();

 $scope.newField = {};
 $scope.editing = false;
 $scope.spinclass="";
 $scope.appkeys = [];
 $scope.total=0;
 $scope.message="";




 $scope.newField =function(){

  var id=$scope.selectedItem.originalObject.id;
  var code=$scope.selectedItem.originalObject.item_code;
  var name=$scope.selectedItem.originalObject.name;
  var unit=$scope.selectedItem.originalObject.unit;
if(id!=""){

    var newField={
      "id" : id,
      "code" : code,
      "name" : name, 
      "quantity" : $scope.inputQuantity,
      "unit" : unit,
   
   
    };
       
    $scope.appkeys.push(newField);
}
  $scope.$broadcast('angucomplete-alt:clearInput');
   
    $scope.inputQuantity="";
   $scope.message="";

  

}

$scope.editAppKey = function(field) {
  $scope.editing = $scope.appkeys.indexOf(field);
  $scope.spinclass="spinner";
  $scope.newField = angular.copy(field);

}

$scope.saveField = function(index) {
  if ($scope.editing !== false) {
    $scope.appkeys[$scope.editing] = $scope.newField;
    $scope.editing = false;
    $scope.spinclass="";
  }       
};

$scope.cancel = function(index) {
  if ($scope.editing !== false) {
    $scope.appkeys[$scope.editing] = $scope.newField;
    $scope.editing = false;
    $scope.spinclass="";
  }       
};

$scope.deleteItem = function(index) {

 $scope.appkeys.splice(index,1);

};




 $scope.remoteUrlRequestFn = function(str) {
      return {term: str,location:$scope.getlocation};
    };
})


angular.element(document).ready(function() {
  angular.bootstrap(document, ["formDemo"]);
});

