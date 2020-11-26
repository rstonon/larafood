@extends('adminlte::page')

@section('title', "Detalhe do Plano - {$detail->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}">Detalhes</a></li>
    </ol>

    <h1>Detalhe</h1>
@stop

@section('content')
    <div class="card-header">

    </div>
    <div class="card-body">
        <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" class="form" method="POST">
            @csrf
            @method('DELETE')

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control" value="{{ $detail->name }}" disabled>
            </div>

            <div class="form-group">
                <button type="submit" class="btn bg-gradient-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
            </div>
        </form>
    </div>

@stop
