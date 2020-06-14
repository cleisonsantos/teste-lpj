angular.module("dashboard").controller("dashboardController", function ($scope, $http) {

    $scope.app = "Dashboard";
    $scope.categories = [];
    $scope.products = [];

    //Função que faz a busca das categorias do backend
    var loadCategories = function () {

        $http({
            method: 'GET',
            url: "http://localhost:8000/categories"
        }).then(function (response) {
            $scope.categories = response.data;
            

        }, function (error) {
            console.log(error);
        });

    };

    //Função que faz a busca dos produtos do backend
    var loadProducts = function () {

        $http({
            method: 'GET',
            url: "http://localhost:8000/products"
        }).then(function (response) {
            $scope.products = response.data;
            

        }, function (error) {
            console.log(error);
        });

    };

    loadCategories();
    loadProducts();

});