<?php
/**
 * @var App\Helpers $helper;
 */
?>
@extends('layouts.app')
@section('title', 'Pacientes')
@section('body_class', 'pacientes')

@section('content')
    <div class="page-header">
        <h2 class="text-primary"><span class="glyphicon glyphicon-user"></span> Pacientes</h2>
    </div>
    <div class="btn-group" role="group" aria-label="...">
        <a href="{{ url('/pacientes/cadastrar') }}" type="button" class="btn btn-raised btn-success"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
    </div>
    <br><br>
    <table id="pacientes-table" class="table table-striped table-bordered datatable responsive no-dtr-control">
        <thead>
        <tr>
            <th>Cod.</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Celular</th>
            <th>Data Nasc</th>
            <th>Ações</th>
            <th data-priority="1">#</th>
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
                            <li><a href="{{url("pacientes/editar/$paciente->id")}}"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
                            <li class="bg-danger"><a class="delete-link" href="#" data-href="{{url("pacientes/excluir/$paciente->id")}}" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span> Deletar</a></li>
                        </ul>
                    </div>
                </td>
                <td ><a class="btn-det-paciente" href="#" data-idpaciente="{{$paciente->id}}"><span class="glyphicon glyphicon-eye-open"></span></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@include('includes.modal-det-pacientes')
@endsection