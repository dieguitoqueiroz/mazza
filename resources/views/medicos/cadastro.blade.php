<?php
/**
 * @var App\MedicosEspecialidade $especialidades
 */
?>
@extends('layouts.app')
@section('title', 'Médicos')
@section('body_class', 'medicos')

@php
$isset_medico = isset($medico);
@endphp

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Médicos</div>
    </div>
    <div class="col-md-5">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url("/medicos/$action") }}" method="post">
            {{ csrf_field() }}
            <fieldset>
                <legend class="text-info">Informações Pessoais</legend>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" placeholder="Nome" aria-describedby="basic-addon1" name="nome" value="@if($isset_medico) {{$medico['nome']}} @endif">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nome">Especialidade</label>
                        <select type="text" class="form-control" placeholder="Especialidade" aria-describedby="basic-addon1" name="especialidade">
                            <option value="">Especialidade</option>
                            @foreach ($especialidades as $especialidade)

                                @if($isset_medico AND $medico['especialidade'] == $especialidade['id'])
                                    <option selected value="{{$especialidade['id']}}">{{$especialidade['especialidade']}}</option>
                                @else
                                    <option value="{{$especialidade['id']}}">{{$especialidade['especialidade']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nome">CPF</label>
                        <input type="text" class="form-control cpf" placeholder="CPF" aria-describedby="basic-addon1" name="cpf" value="@if($isset_medico) {{$medico['cpf']}} @endif">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nome">CRM</label>
                        <input type="text" class="form-control crm" placeholder="CRM" aria-describedby="basic-addon1" name="crm" value="@if($isset_medico) {{$medico['cpf']}} @endif">
                    </div>
                </div>
            </div>
            <br>
            <input type="hidden" name="id" value="@if($isset_medico) {{$medico->id or ''}} @endif">
            <button type="submit" class="btn btn-raised btn-success" data-ripple-color="#F0F0F0"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
            </fieldset>

        </form>
    </div>
@endsection