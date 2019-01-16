@extends('layouts.dashboardprincipal')

@section('titulo')
<p class="navbar-brand">Administração - Sedes</p>
@endsection

@section('conteudo')
@section('botao')
<div class="card-body">
    <div class="table-responsive">
        <form method="POST" action="{{ action('SedesController@addSede', empty($sede->id_sedes) ? 0 : $sede->id_sedes) }}"
            aria-label="{{ __('Register') }}">
            @csrf
            <div class="form-group">
                <label for="Sede">{{ __('Nome da Turma') }}</label>
                <input id="Sede" type="text" class="form-control{{ $errors->has('Sede') ? ' is-invalid' : '' }}" name="Sede"
                    value="{{ empty($sede->id_sedes) ?  '' : $sede->Sede }}" placeholder="Digite a Sede">
                @if ($errors->has('Sede'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('Sede') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">{{ empty($sede->id_sedes) ? __('Registrar Nova Sede') :
                __('Atualiza Sede') }}</button>
        </form>
    </div>
</div>
@endsection
<div class="card-header card-header-primary">
    <h4 class="card-title ">Listagem de Sedes</h4>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    Sedes
                </th>
                <th>
                    Ações
                </th>
            </thead>
            <tbody>
                @foreach($listagem as $lista)
                <tr>
                    <td>{{ $lista->id_sedes }}</td>
                    <td>{{ $lista->Sede }}</td>
                    <td class="td-actions">
                        <a href="{{ action('SedesController@index', $lista->id_sedes) }}">
                            <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title
                                title>
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-toggle="modal"
                            data-target="#modalExcluir{{ action('SedesController@deletarSede', $lista->id_sedes) }}">
                            <i class="material-icons">close</i>
                        </button>
                        <div class="modal fade" id="modalExcluir{{ action('SedesController@deletarSede', $lista->id_sedes) }}"
                            tabindex="-1" role="dialog" aria-labelledby="modalLabelExcluir" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabelExcluir">Confirmação de Exclusão</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Você Realmente Tem Certeza que Deseja Excluir essa Sede? Uma vez apagado os
                                        dados serão Deletados PERMANENTEMENTE!!!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <a href="{{ action('SedesController@deletarSede', $lista->id_sedes) }}"><button
                                                type="button" class="btn btn-primary">Excluir</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection
