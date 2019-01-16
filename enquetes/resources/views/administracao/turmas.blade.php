@extends('layouts.dashboardprincipal')

@section('titulo')
<p class="navbar-brand">Administração - Turmas</p>
@endsection

@section('conteudo')
@section('botao')
<div class="card-body">
    <div class="table-responsive">
        <form method="POST" action="{{ action('TurmaController@addTurma', empty($turma->id_turma) ? 0 : $turma->id_turma) }}"
            aria-label="{{ __('Register') }}">
            @csrf
            <div class="form-group">
                <label for="Turma">{{ __('Nome da Turma') }}</label>
                <input id="Turma" type="text" class="form-control{{ $errors->has('Turma') ? ' is-invalid' : '' }}" name="Turma"
                    value="{{ empty($turma->id_turma) ?  '' : $turma->Turma }}" placeholder="Digite a Turma">
                @if ($errors->has('Turma'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('Turma') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">{{ empty($turma->id_turma) ? __('Registrar Nova Turma') :
                __('Atualiza Turma') }}</button>
        </form>
    </div>
</div>
@endsection
<div class="card-header card-header-primary">
    <h4 class="card-title ">Listagem de Turmas</h4>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    Turma
                </th>
                <th>
                    Ações
                </th>
            </thead>
            <tbody>
                @foreach($listagem as $lista)
                <tr>
                    <td>{{ $lista->id_turma }}</td>
                    <td>{{ $lista->Turma }}</td>
                    <td class="td-actions">
                        <a href="{{ action('TurmaController@index', $lista->id_turma) }}">
                            <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title
                                title>
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-toggle="modal"
                            data-target="#modalExcluir{{ action('TurmaController@deletarTurma', $lista->id_turma) }}">
                            <i class="material-icons">close</i>
                        </button>
                        <div class="modal fade" id="modalExcluir{{ action('TurmaController@deletarTurma', $lista->id_turma) }}" tabindex="-1" role="dialog" aria-labelledby="modalLabelExcluir"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabelExcluir">Confirmação de Exclusão</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Você Realmente Tem Certeza que Deseja Excluir essa Turma? Uma vez apagado os dados serão Deletados PERMANENTEMENTE!!!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            <a href="{{ action('TurmaController@deletarTurma', $lista->id_turma) }}"><button type="button"
                                                    class="btn btn-primary">Excluir</button></a>
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
