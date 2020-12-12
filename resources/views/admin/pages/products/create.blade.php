@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Cadastrar Novo Produto</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" class="form" method="POST" enctype="multipart/form-data">

            @include('admin.pages.products._partials.form')

        </form>
    </div>
    @include('sweetalert::alert')
@stop
