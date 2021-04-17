@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-blue">
                    <i class="fas fa-users"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Usuários</span>
                    <span class="info-box-number">{{ $totalUsers }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-green">
                    <i class="fas fa-tablet-alt"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Mesas</span>
                    <span class="info-box-number">{{ $totalTables }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-info">
                    <i class="fas fa-layer-group"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Categorias</span>
                    <span class="info-box-number">{{ $totalCategories }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-navy">
                    <i class="fas fa-hamburger"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Produtos</span>
                    <span class="info-box-number">{{ $totalProducts }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-indigo">
                    <i class="fas fa-building"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Empresas</span>
                    <span class="info-box-number">{{ $totalCompanies }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin

        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-lightblue">
                    <i class="fas fa-th-list"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Planos</span>
                    <span class="info-box-number">{{ $totalPlans }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin

        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-olive">
                    <i class="fas fa-address-card"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Cargos</span>
                    <span class="info-box-number">{{ $totalRoles }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin

        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-secondary">
                    <i class="fas fa-id-badge"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Módulos</span>
                    <span class="info-box-number">{{ $totalModules }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin

        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gradient-teal">
                    <i class="fas fa-key"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Permissões</span>
                    <span class="info-box-number">{{ $totalPermissions }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin

    </div>

    @include('sweetalert::alert')
@stop
