//Definindo o controller do angular 
angular.module("categories").controller("categoriesController", function ($scope, $http) {

    $scope.app = "Categorias";
    $scope.categories = [];
    $scope.category = [];
    $scope.edit = true;

    //função que prepara os campos para realizar alteração das categorias
    $scope.editFields = function (id) {
        var find = $scope.categories.find(e => e.id === id);
        console.log($scope.category)
        $scope.category.id = find.id;
        $scope.category.name = find.name;
        $scope.category.description = find.description;
        disableBtnAdd();
    };

    //um "interruptor que alterna os botões de cadastro e edição da categoria"
    var disableBtnAdd = function () {
        $scope.edit === true ? $scope.edit = false : $scope.edit = true;
    }

    //função de limpeza de campos
    var clearFields = function () {
        $scope.category.name = "";
        $scope.category.description = "";
    }

    //Função que faz a busca das categorias do backend
    var loadCategories = function () {

        $http({
            method: 'GET',
            url: "http://localhost:8000/categories"
        }).then(function (response) {
            $scope.categories = response.data;
            console.log($scope.categories);

        }, function (error) {
            console.log(error);
        });

    };

    //Função que adiciona uma categoria enviando a requisição para o backend
    $scope.addCategory = function (category) {
        $http({
            method: 'POST',
            url: 'http://localhost:8000/categories',
            data: {
                name: category.name,
                description: category.description
            }
        }).then(function (response) {
            // console.log(response.data);
            loadCategories();
            clearFields();
        }, function (error) {
            console.log(error);
        });
    };

    //Realiza a persistençia das modifições da categoria
    $scope.editCategory = function (category) {
        $http({
            method: 'PUT',
            url: 'http://localhost:8000/categories/' + category.id,
            data: {
                name: category.name,
                description: category.description
            }
        }).then(function (response) {
            // console.log(response.data);
            loadCategories();
            clearFields();
            disableBtnAdd();
        }, function (error) {
            console.log(error);
        });
    };

    //remove uma categoria do banco de dados
    $scope.delCategory = function (category) {
        $http({
            method: 'DELETE',
            url: 'http://localhost:8000/categories/' + category.id,
        }).then(function (response) {
            // console.log(response.data);
            category.name = "", category.description = "";
            loadCategories();

        }, function (error) {
            console.log(error);
        });
    };

    //Realiza uma busca inicial de categorias
    loadCategories();

});