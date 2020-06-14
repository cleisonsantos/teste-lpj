@extends('layouts.app')

@section('content')
<div class="container" ng-app="dashboard" ng-controller="dashboardController">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Dashboard</h4>
                </div>

                <div class="card-body d-flex justify-content-md-around">

                    <div class="card text-white bg-success mb-3" style="max-width: 15rem;">
                        <div class="card-header">
                        <a class="text-light" href="{{ url('/categorias') }}"><h5>Categorias</h5></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">%% categories.length %%</h3>
                        </div>
                    </div>

                    <div class="card text-white bg-primary mb-3" style="max-width: 15rem;">
                        <div class="card-header">
                            <a class="text-light" href="{{ url('/produtos') }}"><h5>Produtos</h5></a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">%% products.length %%</h3>
                        </div>
                    </div>

                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! -->
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="{{ asset('js/dashboard.js') }}"></script>

@endsection