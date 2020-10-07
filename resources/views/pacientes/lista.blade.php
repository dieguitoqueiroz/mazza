<?php
/**
 * @var App\Helpers $helper;
 */
?>
@extends('layouts.app')
@section('title', 'Pacientes')
@section('body_class', 'pacientes')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Pacientes</div>
    </div>
    <div class="btn-group" role="group" aria-label="...">
        <a href="{{ url('/pacientes/cadastrar') }}" type="button" class="btn btn-raised btn-success"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
    </div>
    <br><br>
    <table id="pacientes-table" class="table table-striped table-bordered datatable">
        <thead>
        <tr>
            <th>Cod.</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Celular</th>
            <th>Data Nasc</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pacientes as $paciente)
            <tr>
                <td>{{$paciente->id}}</td>
                <td>{{$paciente->nome}}</td>
                <td>{{$paciente->cpf}}</td>
                <td>{{$paciente->celular}}</td>
                <td>{{$helper->formatDateToDisplay($paciente->data_nasc)}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Ações
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="{{url("pacientes/editar/$paciente->id")}}">Editar</a></li>
                            <li class="bg-danger"><a class="delete-link" href="#" data-href="{{url("pacientes/excluir/$paciente->id")}}" data-toggle="modal" data-target="#confirm-delete">Deletar</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection