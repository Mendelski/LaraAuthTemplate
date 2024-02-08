@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Produtos</div>
        <div class="card-body">
            @can('create-product')
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Novo Produto</a>
            @endcan
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-outline-dark btn-sm"><i class="bi bi-eye"></i> Ver</a>

                                @can('edit-product')
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-dark btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                @endcan

                                @can('delete-product')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="bi bi-trash"></i> Deletar</button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Product Found!</strong>
                        </span>
                    </td>
                @endforelse
                </tbody>
            </table>

            {{ $products->links() }}

        </div>
    </div>
@endsection
