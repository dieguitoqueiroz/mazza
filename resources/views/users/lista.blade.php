<?php
/**
 * @var App\Helpers $helpers;
 */
?>
@extends('layouts.app')
@section('title', 'Usuários')
@section('body_class', 'usuarios')

@section('content')
    <div class="page-header">
        <h2 class="text-primary"><span class="glyphicon glyphicon-plus"></span> Usuários</h2>
    </div>
    <div class="btn-group" role="group" aria-label="...">
        <a href="{{ url('/register') }}" type="button" class="btn btn-raised btn-success"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
    </div>
    <br><br>
    <table id="users-table" class="table table-striped table-hover table-bordered datatable responsive no-wrap">
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data criação</th>
            <th>Data ataualização</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$helpers->formatDateToDisplay($user->created_at,true)}}</td>
                <td>{{$helpers->formatDateToDisplay($user->updated_at,true)}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Ações
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li>
                                <a href="{{url("users/editar/$user->id")}}"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                            </li>
                            <li class="bg-danger">
                                <a class="delete-link" href="#" data-href='{{url("users/excluir/$user->id")}}' data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span> Deletar</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection