@extends('adminlte::page')

@section('title', "Editar Empresa - {$tenant->name}")

@section('content_header')

<h1>Editar Empresa - <b>{{ $tenant->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('tenants.update', $tenant->id) }}" class="form" method="POST" enctype="multipart/form-data">
            @method('PUT')

            @include('admin.pages.tenants._partials.form')
        </form>
    </div>
    @include('sweetalert::alert')
@stop
