@extends('layouts.dashboardprincipal')

@section('titulo')
<p class="navbar-brand">Administração - Ensino</p>
@endsection

@section('conteudo')
@section('botao')
<div class="card-body">
    <div class="table-responsive">
        <form method="POST" action="{{ action('EnsinoController@addEnsino', empty($ensino->id_ensino) ? 0 : $ensino->id_ensino) }}"
            aria-label="{{ __('Register') }}">
            @csrf
            <div class="form-group">
                <label for="Ensino">{{ __('Nome do Ensino') }}</label>
                <input id="Ensino" type="text" class="form-control{{ $errors->has('Ensino') ? ' is-invalid' : '' }}" name="Ensino"
                    value="{{ empty($ensino->id_ensino) ?  '' : $ensino->Ensino }}" placeholder="Digite o Ensino">
                @if ($errors->has('Ensino'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('Ensino') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">{{ empty($ensino->id_ensino) ? __('Registrar Novo Ensino') :
                __('Atualiza Ensino') }}</button>
        </form>
    </div>
</div>
@endsection
<div class="card-header card-header-primary">
    <h4 class="card-title ">Listagem de Ensinos</h4>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    Ensino
                </th>
                <th>
                    Ações
                </th>
            </thead>
            <tbody>
                @foreach($listagem as $lista)
                <tr>
                    <td>{{ $lista->id_ensino }}</td>
                    <td>{{ $lista->Ensino }}</td>
                    <td class="td-actions">
                        <a href="{{ action('EnsinoController@index', $lista->id_ensino) }}">
                            <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title
                                title>
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-toggle="modal"
                            data-target="#modalExcluir{{ action('EnsinoController@deletarEnsino', $lista->id_ensino) }}">
                            <i class="material-icons">close</i>
                        </button>
                        <div class="modal fade" id="modalExcluir{{ action('EnsinoController@deletarEnsino', $lista->id_ensino) }}"
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
                                        Você Realmente Tem Certeza que Deseja Excluir o Ensino? Uma vez apagado os
                                        dados serão Deletados PERMANENTEMENTE!!!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <a href="{{ action('EnsinoController@deletarEnsino', $lista->id_ensino) }}"><button
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
