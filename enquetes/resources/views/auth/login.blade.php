@extends('layouts.principal')

@section('conteudo')
<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
    @csrf
    <span class="login100-form-title">
        <img src="{{ asset('images/mob-logo.svg') }}" alt="Logo CLF">
        <br>Sistema Enquetes
    </span>
    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <input class="input100{{ $errors->has('identity') ? ' is-invalid' : '' }}" id="identity" type="identity" name="identity" value="{{ old('identity') }}" placeholder="Usuario/Email" required>
        @if ($errors->has('identity'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('identity') }}</strong>
            </span>
        @endif
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-address-card" aria-hidden="true"></i>
        </span>
    </div>
    <div class="wrap-input100 validate-input" data-validate = "Password is required">
        <input class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" id="password" name="password" required placeholder="Senha">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit">
            {{ __('Logar') }}
        </button>
    </div>
    <div class="text-center p-t-12">
        <span class="txt1">
            Esqueceu a
        </span>
        <a class="txt2" href="{{ route('password.request') }}">
            Sua Senha?
        </a>
    </div>

    <div class="text-center p-t-136">
        <a class="txt2" href="#">
        </a>
    </div>
</form>

@endsection
