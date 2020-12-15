@extends('adminlte::page')

@section('title', "Categorias do Produto - {$product->title}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.categories', $product->id) }}">Categorias</a></li>
    </ol>

<h1>Categorias do Produto - <b>{{ $product->title }}</b></h1><br>
    <a href="{{ route('products.categories.available', $product->id) }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Nova Categoria</a>

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
                    <th width="50">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('products.category.detach', [$product->id, $category->id])}}" class="btn bg-gradient-danger" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash"></i></a>
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
