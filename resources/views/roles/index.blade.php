@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Papeis</div>
        <div class="card-body">
            @can('create-role')
                <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Novo Papel</a>
            @endcan
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col" style="width: 250px;">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($roles as $role)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $role->name }}</td>
                        <td>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-outline-dark btn-sm">
                                    <i class="bi bi-eye"></i> Ver
                                </a>

                                @if ($role->name!='Super Admin')
                                    @can('edit-role')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-dark btn-sm">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                    @endcan

                                    @can('delete-role')
                                        @if ($role->name!=Auth::user()->hasRole($role->name))
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">
                                                <i class="bi bi-trash"></i> Excluir
                                            </button>
                                        @endif
                                    @endcan
                                @endif

                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="3">
                        <span class="text-danger">
                            <strong>Nenhum papel encontrado</strong>
                        </span>
                    </td>
                @endforelse
                </tbody>
            </table>

            {{ $roles->links() }}

        </div>
    </div>
@endsection
