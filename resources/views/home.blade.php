@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1><span class="glyphicon glyphicon-dashboard"></span> Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Total de Consultas Hoje</h3>
                </div>
                <div class="panel-body">
                    @foreach($consultas_hoje as $consulta)
                    <div>{{ $consulta['nome_medico'] }} - <span class="label label-info">{{ $consulta['total_consultas'] }}</span></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Pacientes Cadastrados</h3>
                </div>
                <div class="panel-body">
                    <h1>{{$total_pacientes}}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Médicos Cadastrados</h3>
                </div>
                <div class="panel-body">
                    <h1>{{$total_medicos}}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
