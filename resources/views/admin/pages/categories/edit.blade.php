@extends('adminlte::page')

@section('title', "Editar Categoria - {$category->name}")

@section('content_header')

<h1>Editar Categoria - <b>{{ $category->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
            @method('PUT')

            @include('admin.pages.categories._partials.form')
        </form>
    </div>
    @include('sweetalert::alert')
@stop
