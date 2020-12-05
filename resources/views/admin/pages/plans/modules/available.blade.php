@extends('adminlte::page')

@section('title', "Módulos Disponíveis para o Plano - {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.modules', $plan->id ) }}">Módulos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.modules.available', $plan->id ) }}" class="active">Disponíveis</a></li>
    </ol>

<h1>Módulos Disponíveis para o Plano - <b>{{ $plan->name }}</b></h1><br>

@stop

@section('content')
    <div class="card-header">
    <form action="{{ route('plans.modules.available', $plan->id) }}" method="POST" class="form form-inline">
            @csrf
    <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button style="margin-left: 10px" type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i> Pesquisar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-codensed">
            <thead>
                <tr>
                    <th width="50px">#</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
            <form action="{{ route('plans.modules.attach', $plan->id) }}" method="post">
                    @csrf
                    @foreach ($modules as $module)
                    <tr>
                        <td><input type="checkbox" name="modules[]" value="{{ $module->id }}"></td>
                        <td>{{ $module->name }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Salvar</button>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{ $modules->appends($filters)->links() }}
        @else
            {{ $modules->links() }}
        @endif

    </div>
    @include('sweetalert::alert')
@stop
