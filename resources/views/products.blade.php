@extends('layouts.app')

@section('content')
<div class="container" ng-app="products" ng-controller="productsController">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">%% app %%</h4>
                </div>

                <div class="card-body">
                    <div class="">
                        <p ng-bind="Teste"></p>
                        <h5>Cadastrar Produtos</h5>
                        
                        <form class="">
                            <div class="d-flex align-items-md-start justify-content-md-around justify-content-sm-between flex-sm-wrap">
                                <input type="hidden" ng-model="product.user" ng-init="product.user = {{ $user->id }}" name="" id="">
                                <input type="hidden" ng-model="product.id" value="%% product.id %%" name="" id="">
                                <input class="col-md col-sm-12 m-1" type="text" ng-model="product.name" name="" id="" placeholder="Nome">
                                <input class="col-md-2 col-sm-12 m-1" type="number" name="" id="" ng-model="product.amount" placeholder="Quantidade">
                                <input class="col-md-2 col-sm-12 m-1" type="number" name="" id="" ng-model="product.price" placeholder="Preço">
                                <textarea class="col-md col-sm-12 m-1" type="text" ng-model="product.description" name="" id="" placeholder="Descrição" cols="15" rows="3"></textarea>
                                <!-- <select class="col-md col-sm-12 m-1" type="text" ng-model="product.category" ng-options="category.id as category.name for category in categories track by category.id" name="" id="" > -->
                                <select class="col-md col-sm-12 m-1" ng-model="product.category" name="" id="" >
                                <option value="">Selecione uma categoria</option>
                                
                                <option ng-repeat="category in categories track by category.id" ng-selected="category.id == product.category" value="%%category.id%%">%% category.name %%</option>
                                
                                </select>
                            </div>
                            <button class="btn btn-primary my-2 " ng-model="addBtn" ng-click="addProduct(product)" ng-show="edit" ng-disabled="!product.name || !product.amount || !product.price || !product.description || !product.category">Adicionar
                                Produto</button>
                            <button class="btn btn-primary my-2 " ng-model="editBtn" ng-click="editProduct(product)" ng-show="!edit" ng-disabled="!product.name || !product.description">Editar
                                Produto</button>
                        </form>
                    </div>
                    <div class="border-top-1 border-info mt-3">
                        <h5>Lista de Produtos</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>Descrição</th>
                                    <th>Categoria</th>
                                    <th>EDITAR</th>
                                    <th>EXCLUIR</th>
                                </tr>
                            </thead>
                            <tr ng-repeat="product in products">
                                <td>%% product.id %%</td>
                                <td>%% product.name %%</td>
                                <td>%% product.amount %%</td>
                                <td>R$ %% product.price %%</td>
                                <td>%% product.description %%</td>
                                <td>%% showCategory(product.category); %%</td>
                                <td><button class="btn btn-success" ng-click="editFieldsProducts(product.id)">editar</button></td>
                                <td><button class="btn btn-danger" ng-click="delProduct(product)">excluir</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection