@extends('layouts.app')

@section('content')
<div class="container" ng-app="categories" ng-controller="categoriesController">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">%% app %%</h4>
                </div>

                <div class="card-body">
                    <div class="">
                    <p ng-bind="Teste"></p>
                        <h5>Cadastrar Categoria</h5>
                        <form class="">
                            <input class="col-md-8 col-sm-12 " type="hidden" ng-model="category.id" value="" name="" id="" placeholder="id">
                            <input class="col-md-3 col-sm-12 " type="text" ng-model="category.name" name="" id="" placeholder="Nome">
                            <input class="col-md-8 col-sm-12 " type="text" ng-model="category.description" name="" id="" placeholder="Descrição">
                            <button class="btn btn-primary my-2 d-block" ng-model="addBtn" ng-click="addCategory(category)" ng-show="edit" ng-disabled="!category.name || !category.description">Adicionar Categoria</button>
                            <button class="btn btn-primary my-2 d-block" ng-model="editBtn" ng-click="editCategory(category)" ng-show="!edit" ng-disabled="!category.name || !category.description">Editar Categoria</button>
                        </form>
                    </div>
                    <div class="border-top-1 border-info mt-3">
                        <h5>Lista de Categorias</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>EDITAR</th>
                                    <th>EXCLUIR</th>
                                </tr>
                            </thead>
                            <tr ng-repeat="category in categories">
                                <td>%% category.id %%</td>
                                <td>%% category.name %%</td>
                                <td>%% category.description %%</td>
                                <td><button class="btn btn-success" ng-click="editFields(category.id)">editar</button></td>
                                <td><button class="btn btn-danger" ng-click="delCategory(category)">excluir</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection