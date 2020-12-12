@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Produtos</a></li>
    </ol>

    <h1>Produtos</h1><br>
    <a href="{{ route('products.create') }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Novo Produto</a>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
            @csrf
    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button style="margin-left: 10px" type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-codensed">
            <thead>
                <tr>
                    <th style="max-width:120px;">Imagem</th>
                    <th>Título</th>
                    <th width="250">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width:120px;">
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id)}}" class="btn bg-gradient-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('products.edit', $product->id)}}" class="btn bg-gradient-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{ $products->appends($filters)->links() }}
        @else
            {{ $products->links() }}
        @endif

    </div>
    @include('sweetalert::alert')
@stop
