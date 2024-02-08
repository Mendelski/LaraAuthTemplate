@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>Você está logado!</h3>

                        <p>Este é seu dashboard.</p>
                        @canany(['create-role', 'edit-role', 'delete-role'])
                            <a class="btn btn-outline-dark" href="{{ route('roles.index') }}">
                                <i class="bi bi-person-fill-gear"></i> Gerenciar papéis
                            </a>
                        @endcanany
                        @canany(['create-user', 'edit-user', 'delete-user'])
                            <a class="btn btn-outline-dark" href="{{ route('users.index') }}">
                                <i class="bi bi-people"></i> Gerenciar Usuários
                            </a>
                        @endcanany
                        @canany(['create-product', 'edit-product', 'delete-product'])
                            <a class="btn btn-outline-dark" href="{{ route('products.index') }}">
                                <i class="bi bi-bag"></i> Gerenciar Produtos
                            </a>
                        @endcanany
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
