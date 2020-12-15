@extends('adminlte::page')

@section('title', "Categorias Disponíveis para o Produto - {$product->title}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index')}}">Produtos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.modules', $product->id ) }}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.modules.available', $product->id ) }}" class="active">Disponíveis</a></li>
    </ol>

<h1>Categorias Disponíveis para o Produto - <b>{{ $product->title }}</b></h1><br>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('products.categories.available', $product->id) }}" method="POST" class="form form-inline">
            @csrf
    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button style="margin-left: 10px" type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-codensed">
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
            <form action="{{ route('products.categories.attach', $product->id) }}" method="post">
                    @csrf
                    @foreach ($categories as $category)
                    <tr>
                        <td><input type="checkbox" name="categories[]" value="{{ $category->id }}"></td>
                        <td>{{ $category->name }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
                        </td>
                    </tr>
                </form>
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
