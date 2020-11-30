@extends('adminlte::page')

@section('title', "Editar Módulo - {$module->name}")

@section('content_header')

<h1>Editar Módulo - <b>{{ $module->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('modules.update', $module->id) }}" class="form" method="POST">
            @method('PUT')

            @include('admin.pages.modules._partials.form')
        </form>
    </div>
    @include('sweetalert::alert')
@stop
