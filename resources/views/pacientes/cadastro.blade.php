<?php
/**
 * @var App\MedicosEspecialidade $especialidades
 */
?>
@extends('layouts.app')
@section('title', 'Pacientes')
@section('body_class', 'pacientes')
@php
$isset_paciente = isset($paciente);
@endphp

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Pacientes</div>
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
        <form action="{{ url("/pacientes/$action") }}" method="post">
            {{ csrf_field() }}
            <fieldset>
                <legend class="text-info">Informações Pessoais</legend>
                <div class="row">
                    <div class="form-group col-md-7">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control cpf" placeholder="CPF" name="cpf" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="data_nasc">Data Nasc.</label>
                        <input type="text" class="form-control date" placeholder="Data Nasc" name="data_nasc" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="sexo">Sexo</label>
                        <select class="form-control" name="sexo">
                            <option>Masculino</option>
                            <option>Feminino</option>
                            <option>Outro</option>
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend class="text-info">Endereço</legend>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="cep">CEP</label>
                        <input type="text" class="form-control cep" placeholder="CEP" name="cep" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9">
                        <label for="rua">Rua</label>
                        <input type="text" class="form-control" placeholder="Rua" name="endereco" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="numero">Número</label>
                        <input type="text" class="form-control" placeholder="Número" name="numero" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" placeholder="Bairro" name="bairro" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" placeholder="Complemento" name="complemento" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="uf">UF</label>
                        <select class="form-control" name="uf" required>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" placeholder="Cidade" name="cidade" required>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend class="text-info">Contato</legend>
                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" placeholder="E-mail" name="email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control phone" placeholder="Celular" name="celular" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fixo">Telefone Fixo</label>
                        <input type="text" class="form-control phone required" placeholder="Tel Fixo" name="telefone">
                    </div>
                </div>
            </fieldset>
            <br>
            @if($isset_paciente)
                <input type="hidden" name="id" value="{{$paciente->id or ''}}">
            @endif
            <button type="submit" class="btn btn-raised btn-success" data-ripple-color="#F0F0F0"><span class="glyphicon glyphicon-floppy-disk"></span> Gravar</button>
        </form>
    </div>
@endsection