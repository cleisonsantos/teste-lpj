angular.module('categories',[],function($interpolateProvider){
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
    });

angular.module("categories").controller("categoriesController", function ($scope) {
    $scope.app = "Categorias";
    $scope.categories = [
        {name: "Periféricos", description: "Acessórios para o computador"},
        {name: "Hardware", description: "Componentes de computador"}
    ];
    $scope.addCategory = function (category) {
        $scope.categories.push(category);
        delete $scope.category;
        
    };
});