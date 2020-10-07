<?php
/**
 * @var App\Helpers $helper;
 */
?>
@extends('layouts.app')
@section('title', 'Agenda')
@section('body_class', 'agenda')

@php
    $isset_medico = isset($medico);
    $isset_paciente = isset($paciente);
    $all_pacientes = $pacientes::all();
    $all_medicos = $medicos::all();
    $edit_mode = ($action == 'editar') ? true : false;
@endphp

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-calendar"></span> Agenda</div>
    </div>
    <div class="col-md-5">
        <form action="{{ url("/agenda/$action") }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-md-10">
                    <label for="nome">Médico</label>
                    <div class="input-group">
                        <input id="medico" type="text" class="form-control" placeholder="Médico" aria-describedby="basic-addon1" name="medico" value="@if($edit_mode){{$medicos::find($agenda->id_medico)['nome'] or ''}}@endif" readonly>
                        <input id="id_medico" type="hidden" name="id_medico" value="@if($edit_mode){{$agenda->id_medico or ''}}@endif">
                        <span class="input-group-addon" id="basic-addon1">
                            <a href="#" class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modal-medicos"></a>
                        </span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-10">
                    <label for="nome">Paciente</label>
                    <div class="input-group">
                        <input id="paciente" type="text" class="form-control" placeholder="Paciente" aria-describedby="basic-addon1" name="paciente" value="@if($edit_mode){{$pacientes::find($agenda->id_paciente)['nome'] or ''}}@endif" readonly>
                        <input id="id_paciente" type="hidden" name="id_paciente" value="@if($edit_mode){{$agenda->id_paciente}}@endif">
                        <span class="input-group-addon" id="basic-addon1">
                            <a href="#" class="glyphicon glyphicon-search" data-toggle="modal" data-target="#modal-pacientes"></a>
                        </span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control datepicker" placeholder="Data" aria-describedby="basic-addon1" name="data" value="@if($edit_mode){{$helper->formatDateToDisplay($agenda->data)}}@endif">
                        <span class="input-group-addon" id="basic-addon1">
                            <a href="#" class="glyphicon glyphicon-calendar"></a>
                        </span>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control time" placeholder="Hora" aria-describedby="basic-addon1" name="hora" maxlength="5" value="@if($edit_mode){{$agenda->hora_inicio or ''}}@endif">
                        <span class="input-group-addon" id="basic-addon1">
                            <a href="#" class="glyphicon glyphicon-time"></a>
                        </span>
                    </div>
                </div>
            </div>
            <br>
            <br>
            @if($edit_mode)
                <input type="hidden" name="id" value="{{$agenda->id or ''}}">
            @endif
            <button type="submit" class="btn btn-raised btn-success" data-ripple-color="#F0F0F0"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
        </form>
    </div>
    @include('includes.modal-medicos')
    @include('includes.modal-pacientes')
@endsection