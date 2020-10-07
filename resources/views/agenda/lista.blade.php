<?php
/**
 * @var App\Helpers $helper;
 */
?>
@extends('layouts.app')
@section('title', 'Agenda')
@section('body_class', 'agenda')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-calendar"></span> Agenda</div>
    </div>
    <div class="btn-group" role="group" aria-label="...">
        <a href="{{ url('/agenda/cadastrar') }}" type="button" class="btn btn-raised btn-success"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
    </div>
    <br><br>
    <table id="agenda-table" class="table table-striped table-bordered datatable">
        <thead>
        <tr>
            <th>Cod.</th>
            <th>Médico</th>
            <th>Paciente</th>
            <th>Data</th>
            <th>Hora</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($agenda as $value)
            <tr>
                <td>{{$value->id}}</td>
                <td>{{$medico::find($value->id_medico)['nome']}}</td>
                <td>{{$paciente::find($value->id_paciente)['nome']}}</td>
                <td>{{$helper->formatDateToDisplay($value->data)}}</td>
                <td>{{$value->hora_inicio}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Ações
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="{{url("agenda/editar/$value->id")}}">Editar</a></li>
                            <li class="bg-danger"><a class="delete-link" href="#" data-href="{{url("agenda/excluir/$value->id")}}" data-toggle="modal" data-target="#confirm-delete">Deletar</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection