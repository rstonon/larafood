@extends('adminlte::page')

@section('title', "Editar Produto - {$product->name}")

@section('content_header')

<h1>Editar Produto - <b>{{ $product->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" class="form" method="POST" enctype="multipart/form-data">
            @method('PUT')

            @include('admin.pages.products._partials.form')
        </form>
    </div>
    @include('sweetalert::alert')
@stop
