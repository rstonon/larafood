@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
    <h1>Cadastrar Nova Empresa</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('tenants.store') }}" class="form" method="POST" enctype="multipart/form-data">

            @include('admin.pages.tenants._partials.form')

        </form>
    </div>
    @include('sweetalert::alert')
@stop
