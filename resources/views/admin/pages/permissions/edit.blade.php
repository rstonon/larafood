@extends('adminlte::page')

@section('title', "Editar Permissão - {$permission->name}")

@section('content_header')
    <h1>Editar Permissão - {{ $permission->name }}</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
            @method('PUT')

            @include('admin.pages.permissions._partials.form')
        </form>
    </div>
    @include('sweetalert::alert')
@stop
