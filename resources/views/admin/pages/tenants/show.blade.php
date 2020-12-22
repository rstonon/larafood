@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>Empresa - <b>{{ $tenant->name }}</b></h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">


            <div class="form-group">
                <label>Imagem:</label><br/>
                {{-- <input type="text" name="name" class="form-control" value="{{ $tenant->name }}" disabled> --}}
                <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->title }}" style="max-width:200px;">
            </div>

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control" value="{{ $tenant->name }}" disabled>
            </div>
            <div class="form-group">
                <label>Plano:</label>
                <input type="text" name="plan" class="form-control" value="{{ $tenant->plan->name }}" disabled>
            </div>
            <div class="form-group">
                <label>URL:</label>
                <input type="text" name="url" class="form-control" value="{{ $tenant->url }}" disabled>
            </div>
            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" name="email" class="form-control" value="{{ $tenant->email }}" disabled>
            </div>
            <div class="form-group">
                <label>CNPJ:</label>
                <input type="text" name="cnpj" class="form-control" value="{{ $tenant->cnpj }}" disabled>
            </div>
            <div class="form-group">
                <label>Ativo:</label>
                <input type="text" name="active" class="form-control" value="{{ $tenant->active == 'Y' ? 'Sim' : 'Não' }}" disabled>
            </div>

            <hr>
            <h3>Assinatura</h3>

            <div class="form-group">
                <label>Data Assinatura:</label>
                <input type="text" name="subscription" class="form-control" value="{{ date('d/m/Y', strtotime($tenant->subscription)) }}" disabled>
            </div>
            <div class="form-group">
                <label>Data Expiração:</label>
                <input type="text" name="expires_at" class="form-control" value="{{ date('d/m/Y', strtotime($tenant->expires_at)) }}" disabled>
            </div>
            <div class="form-group">
                <label>Identificador:</label>
                <input type="text" name="subscription_id" class="form-control" value="{{ $tenant->subscription_id }}" disabled>
            </div>
            <div class="form-group">
                <label>Ativo?</label>
                <input type="text" name="subscription_active" class="form-control" value="{{ $tenant->subscription_active ? 'Sim' : 'Não' }}" disabled>
            </div>
            <div class="form-group">
                <label>Cancelou?</label>
                <input type="text" name="subscription_active" class="form-control" value="{{ $tenant->subscription_suspended ? 'Sim' : 'Não' }}" disabled>
            </div>


    </div>
    @include('sweetalert::alert')
@stop
