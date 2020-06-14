//Configuração da interpolação do angular conflitante com o blade do laravel.
angular.module('categories', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});










//Configuração da interpolação do angular conflitante com o blade do laravel.
angular.module('products', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('%%');
    $interpolateProvider.endSymbol('%%');
});
