@extends('adminlte::page')

@section('title', "Detalhes do Plano - {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
    </ol>

    <h1>Detalhes do Plano - <b>{{$plan->name}}</b></h1><br>
    <a href="{{ route('details.plan.create', $plan->url) }}" class="btn bg-gradient-primary"><i class="fas fa-plus-circle"></i> Adicionar Novo Detalhe</a>

@stop

@section('content')
    <div class="card-body">

        @include('admin.includes.alerts')

        <table class="table table-codensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="200">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail->name }}</td>
                        <td>
                            <a href="{{ route('details.plan.show', [$plan->url, $detail->id])}}" class="btn bg-gradient-warning"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('details.plan.edit', [$plan->url, $detail->id])}}" class="btn bg-gradient-info"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{ $details->appends($filters)->links() }}
        @else
            {{ $details->links() }}
        @endif

    </div>
    @include('sweetalert::alert')
@stop
