@extends('layouts.app')
@section('title', 'Médicos')
@section('body_class', 'medicos')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Médicos</div>
    </div>
    <div class="btn-group" role="group" aria-label="...">
        <a href="{{ url('/medicos/cadastrar') }}" type="button" class="btn btn-raised btn-success"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
    </div>
    <br><br>
    <table id="medico-table" class="table table-striped table-bordered datatable">
        <thead>
        <tr>
            <th>Cod.</th>
            <th>Nome</th>
            <th>Especialidade</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($medicos as $medico)
            <tr>
                <td>{{$medico->id}}</td>
                <td>{{$medico->nome}}</td>
                <td>{{$especialidades::find($medico->especialidade)['especialidade']}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Ações
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="{{url("medicos/editar/$medico->id")}}">Editar</a></li>
                            <li class="bg-danger"><a class="delete-link" href="#" data-href="{{url("medicos/excluir/$medico->id")}}" data-toggle="modal" data-target="#confirm-delete">Deletar</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection