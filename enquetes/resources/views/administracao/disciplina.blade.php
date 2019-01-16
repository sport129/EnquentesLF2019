@extends('layouts.dashboardprincipal')

@section('titulo')
<p class="navbar-brand">Administração - Disciplinas</p>
@endsection

@section('conteudo')
@section('botao')
<div class="card-body">
    <div class="table-responsive">
        <form method="POST" action="{{ action('DisciplinasController@addDisciplina', empty($disciplina->id_disciplina) ? 0 : $disciplina->id_disciplina) }}"
            aria-label="{{ __('Register') }}">
            @csrf
            <div class="form-group">
                <label for="disciplina">{{ __('Nome da Disciplina') }}</label>
                <input id="disciplina" type="text" class="form-control{{ $errors->has('disciplina') ? ' is-invalid' : '' }}" name="disciplina"
                    value="{{ empty($disciplina->id_disciplina) ?  '' : $disciplina->disciplina }}" placeholder="Digite a Disciplina">
                @if ($errors->has('disciplina'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('disciplina') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">{{ empty($disciplina->id_disciplina) ? __('Registrar Nova Disciplina') :
                __('Atualiza Disciplina') }}</button>
        </form>
    </div>
</div>
@endsection
<div class="card-header card-header-primary">
    <h4 class="card-title ">Listagem de Disciplina</h4>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    Disciplinas
                </th>
                <th>
                    Ações
                </th>
            </thead>
            <tbody>
                @foreach($listagem as $lista)
                <tr>
                    <td>{{ $lista->id_disciplina }}</td>
                    <td>{{ $lista->disciplina }}</td>
                    <td class="td-actions">
                        <a href="{{ action('DisciplinasController@index', $lista->id_disciplina) }}">
                            <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title
                                title>
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-toggle="modal"
                            data-target="#modalExcluir{{ action('DisciplinasController@deletarDisciplina', $lista->id_disciplina) }}">
                            <i class="material-icons">close</i>
                        </button>
                        <div class="modal fade" id="modalExcluir{{ action('DisciplinasController@deletarDisciplina', $lista->id_disciplina) }}"
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
                                        Você Realmente Tem Certeza que Deseja Excluir essa Disciplina? Uma vez apagado os
                                        dados serão Deletados PERMANENTEMENTE!!!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <a href="{{ action('DisciplinasController@deletarDisciplina', $lista->id_disciplina) }}"><button
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
