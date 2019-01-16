@extends('layouts.dashboardprincipal')

@section('titulo')
<p class="navbar-brand">Cadastrar Nova Vinculação</p>
@endsection

@section('conteudo')
@section('botao')

@endsection
<div class="card-header card-header-primary">
    <h4 class="card-title ">Cadastro Nova Vinculação</h4>
</div>
<div class="card-body">
    <div class="table-responsive">
        <form method="POST" action="{{  action('STTSEController@cadastrar') }}" aria-label="{{ __('Register') }}">
            @csrf
            <div class="form-group">
                <label for="fk_sede">{{ __('Qual a Sede?') }}</label>
                <select class="form-control" id="fk_sede" name="fk_sede" required>
                    @foreach($sedes as $sede)
                    <option value="{{ $sede->id_sedes }}">{{ $sede->Sede }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fk_ensino">{{ __('Qual o Ensino?') }}</label>
                <select class="form-control" id="fk_ensino" name="fk_ensino" required>
                    @foreach($ensinos as $ensino)
                    <option value="{{ $ensino->id_ensino }}">{{ $ensino->Ensino }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fk_turno">{{ __('Qual o Turno?') }}</label>
                <select class="form-control" id="fk_turno" name="fk_turno" required>
                    @foreach($turnos as $turno)
                    <option value="{{ $turno->id_turno }}">{{ $turno->Turno }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fk_serie">{{ __('Qual a Serie?') }}</label>
                <select class="form-control" id="fk_serie" name="fk_serie" required>
                    @foreach($series as $serie)
                    <option value="{{ $serie->id_serie }}">{{ $serie->Serie }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fk_turma">{{ __('Qual a Turma?') }}</label>
                <select class="form-control" id="fk_turma" name="fk_turma" required>
                    @foreach($turmas as $turma)
                    <option value="{{ $turma->id_turma }}">{{ $turma->Turma }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Registrar Nova Vinculação') }}</button>
        </form>
    </div>
</div>
@endsection
