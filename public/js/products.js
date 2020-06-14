

angular.module("products").controller("productsController", function ($scope, $http) {

    $scope.app = "Produtos";
    $scope.categories = [];
    $scope.category = [];
    $scope.products = [];
    $scope.product = [];
    $scope.edit = true;

    //função que prepara os campos para realizar alteração das categorias
    $scope.editFieldsProducts = function (id) {
        console.log($scope.products);
        var found = $scope.products.find(e => e.id === id);
        console.log(found);
        $scope.product.id = found.id;
        $scope.product.name = found.name;
        $scope.product.description = found.description;
        $scope.product.amount = found.amount;
        $scope.product.price =  parseFloat(found.price);
        $scope.product.category = found.category;
        //console.log($scope.product.category)
        disableBtnAdd();
    };

    //um "interruptor que alterna os botões de cadastro e edição da categoria"
    var disableBtnAdd = function () {
        $scope.edit === true ? $scope.edit = false : $scope.edit = true;
    }

    //função de limpeza de campos
    var clearFields = function () {
        $scope.product.name = "";
        $scope.product.description = "";
        $scope.product.amount = "";
        $scope.product.price = "";
        $scope.product.category = "";
    }
    $scope.showCategory = function(id){
        var found = $scope.categories.find(e => e.id === id);
        return found.name;
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
    //Função que faz a busca dos produtos do backend
    var loadProducts = function () {

        $http({
            method: 'GET',
            url: "http://localhost:8000/products"
        }).then(function (response) {
            $scope.products = response.data;
            console.log($scope.products);

        }, function (error) {
            console.log(error);
        });

    };

    //Função que adiciona uma categoria enviando a requisição para o backend
    $scope.addProduct = function (product) {
        console.log(product);
        $http({
            method: 'POST',
            url: 'http://localhost:8000/products',
            data: {
                user: product.user,
                name: product.name,
                amount: product.amount,
                price: product.price,
                description: product.description,
                category: product.category,
            }
        }).then(function (response) {
            // console.log(response.data);
            loadCategories();
            loadProducts();
            clearFields();
        }, function (error) {
            console.log(error);
        });
    };

    //Realiza a persistençia das modifições da categoria
    $scope.editProduct = function (product) {
        $http({
            method: 'PUT',
            url: 'http://localhost:8000/products/' + product.id,
            data: {
                user: product.user,
                name: product.name,
                amount: product.amount,
                price: product.price,
                description: product.description,
                category: product.category,
            }
        }).then(function (response) {
            // console.log(response.data);
            loadProducts();
            clearFields();
            disableBtnAdd();
        }, function (error) {
            console.log(error);
        });
    };

    //remove uma categoria do banco de dados
    $scope.delProduct = function (product) {
        $http({
            method: 'DELETE',
            url: 'http://localhost:8000/products/' + product.id,
        }).then(function (response) {
            // console.log(response.data);
            product.name = "", product.description = "";
            loadProducts();

        }, function (error) {
            console.log(error);
        });
    };

    //Realiza uma busca inicial de categorias
    loadCategories();
    //Carrega os produtos na tela ao entrar
    loadProducts();
    
});