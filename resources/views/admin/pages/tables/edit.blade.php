@extends('adminlte::page')

@section('title', "Editar Mesa - {$table->name}")

@section('content_header')

<h1>Editar Mesa - <b>{{ $table->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('tables.update', $table->id) }}" class="form" method="POST">
            @method('PUT')

            @include('admin.pages.tables._partials.form')
        </form>
    </div>
    @include('sweetalert::alert')
@stop
