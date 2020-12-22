@extends('adminlte::page')

@section('title', "Editar Cargo - {$role->name}")

@section('content_header')

<h1>Editar Cargo - <b>{{ $role->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" class="form" method="POST">
            @method('PUT')

            @include('admin.pages.roles._partials.form')
        </form>
    </div>
    @include('sweetalert::alert')
@stop
