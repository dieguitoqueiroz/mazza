@extends('layouts.app')
@php
    $edit_mode = ($action == 'editar') ? true : false;
@endphp
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-plus"></span> Usuários</div>
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
            <form class="form-horizontal" role="form" method="POST" action="@if($edit_mode) {{ url('/users/editar') }} @else {{ url('/register') }} @endif">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>
                                <input id="active" type="checkbox" value="1" name="active"> Ativo
                            </label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>
                                <input id="can_create_user" type="checkbox" value="1" name="can_create_user"> Permissão para gerenciar usuários
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" placeholder="Nome" aria-describedby="basic-addon1" name="name" value="@if($edit_mode){{$user->name}}@else{{ old('name') }}@endif">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="nome">E-mail</label>
                            <input type="text" class="form-control" placeholder="E-mail" aria-describedby="basic-addon1" name="email" value="@if($edit_mode) {{$user->email}} @else {{ old('email') }} @endif">
                        </div>
                    </div>
                </div>
                @if(!$edit_mode)
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nome">Senha</label>
                                <input type="password" class="form-control" placeholder="Senha"  name="password" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nome">Confirmar senha</label>
                                <input type="password" class="form-control" placeholder="Confirme a senha"  name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                @else
                    <input type="hidden" name="id" value="{{$user->id}}">
                @endif

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Gravar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
@endsection
