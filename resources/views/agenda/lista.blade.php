<?php
/**
 * @var App\Helpers $helper;
 */
?>
@extends('layouts.app')
@section('title', 'Agenda')
@section('body_class', 'agenda')

@section('content')
    <div class="page-header">
        <h2 class="text-primary"><span class="glyphicon glyphicon-calendar"></span> Agenda</h2>
    </div>

    <div class="btn-group" role="group" aria-label="...">
        <a href="{{ url('/agenda/cadastrar') }}" type="button" class="btn btn-raised btn-success"><span class="glyphicon glyphicon-plus"></span> Marcar consulta</a>
    </div>
    <br><br>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#calendario" aria-controls="home" role="tab" data-toggle="tab">Calendário</a></li>
        <li role="presentation"><a href="#lista" aria-controls="profile" role="tab" data-toggle="tab">Lista | Editar | Excluir</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="calendario">
            <br>
            <div class="row">
                <div class="col-md-3">
                    <span>Selecione o médico para mostrar eventos específicos</span>
                    <br><br>
                    <div class="dropdown">
                        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Médicos
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <li><a class="drop-med-age" href="#" data-idmedico="">Todos</a></li>
                            @foreach($medico::all() as $value)
                                <li><a class="drop-med-age" href="#" data-idmedico="{{$value->id}}">{{$value->nome}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <span id="nome-medico" class="text-left"></span>
                </div>
            </div>

            <br>
            <div id="calendar-wrapper" class="calendar-wrapper"></div>
        </div>
        <div role="tabpanel" class="tab-pane" id="lista">
            <br>
            <table id="agenda-table" class="table table-striped table-bordered datatable responsive">
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
                                    <li><a href="{{url("agenda/editar/$value->id")}}"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
                                    <li class="bg-danger"><a class="delete-link" href="#" data-href="{{url("agenda/excluir/$value->id")}}" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span> Deletar</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection