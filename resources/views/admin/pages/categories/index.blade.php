@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}">Categorias</a></li>
    </ol>

    <h1>Categorias</h1><br>
    <a href="{{ route('categories.create') }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Nova Categoria</a>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('categories.search') }}" method="POST" class="form form-inline">
            @csrf
    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button style="margin-left: 10px" type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-codensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th width="250">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id)}}" class="btn bg-gradient-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('categories.edit', $category->id)}}" class="btn bg-gradient-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{ $categories->appends($filters)->links() }}
        @else
            {{ $categories->links() }}
        @endif

    </div>
    @include('sweetalert::alert')
@stop
