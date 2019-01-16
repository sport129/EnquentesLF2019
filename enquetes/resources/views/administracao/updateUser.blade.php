@extends('layouts.dashboardprincipal')


@section('titulo')
<p class="navbar-brand">Administração - Atualizar Cadastro</p>
@endsection

@section('conteudo')
<div class="card-header card-header-primary">
    <h4 class="card-title ">Atualizar Usuário</h4>
</div>
<div class="card-body">
    <div class="table-responsive">
        <form method="POST" action="{{ action('HomeController@attUser', $usuario->id) }}" aria-label="{{ __('Register') }}">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('Nome do Usuário') }}</label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                    value="{{ $usuario->name }}" placeholder="Digite seu Usuário">
                @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">{{ __('Enderenço de E-mail') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email" value="{{ $usuario->email }}" placeholder="Digite Seu E-mail">
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label  for="tipoUser">{{ __('Tipo de Usuário') }}</label>
                <select class="form-control" id="tipoUser" name="tipoUser" required>
                    <option value="1">Administrador</option>
                    <option value="2">Coordenador</option>
                    <option value="3">Direção</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Atualizar Usuário') }}</button>
        </form>
    </div>
</div>
@endsection
