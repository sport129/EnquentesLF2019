@extends('layouts.dashboardprincipal')

@section('titulo')
<p class="navbar-brand">Administração - Turmas</p>
@endsection

@section('conteudo')
@section('botao')
<div class="card-body">
    <div class="table-responsive">
        <form method="POST" action="{{ action('TurnosController@addTurno', empty($turno->id_turno) ? 0 : $turno->id_turno) }}"
            aria-label="{{ __('Register') }}">
            @csrf
            <div class="form-group">
                <label for="Turno">{{ __('Nome do Turno') }}</label>
                <input id="Turno" type="text" class="form-control{{ $errors->has('Turno') ? ' is-invalid' : '' }}" name="Turno"
                    value="{{ empty($turno->id_turno) ?  '' : $turno->Turno }}" placeholder="Digite o Turno">
                @if ($errors->has('Turno'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('Turno') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">{{ empty($turno->id_turno) ? __('Registrar Novo Turno') :
                __('Atualiza Turno') }}</button>
        </form>
    </div>
</div>
@endsection
<div class="card-header card-header-primary">
    <h4 class="card-title ">Listagem de Turnos</h4>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    Turnos
                </th>
                <th>
                    Ações
                </th>
            </thead>
            <tbody>
                @foreach($listagem as $lista)
                <tr>
                    <td>{{ $lista->id_turno }}</td>
                    <td>{{ $lista->Turno }}</td>
                    <td class="td-actions">
                        <a href="{{ action('TurnosController@index', $lista->id_turno) }}">
                            <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title
                                title>
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-toggle="modal"
                            data-target="#modalExcluir{{ action('TurnosController@deletarTurno', $lista->id_turno) }}">
                            <i class="material-icons">close</i>
                        </button>
                        <div class="modal fade" id="modalExcluir{{ action('TurnosController@deletarTurno', $lista->id_turno) }}" tabindex="-1" role="dialog" aria-labelledby="modalLabelExcluir"
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
                                            Você Realmente Tem Certeza que Deseja Excluir essa Turno? Uma vez apagado os dados serão Deletados PERMANENTEMENTE!!!
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            <a href="{{ action('TurnosController@deletarTurno', $lista->id_turno) }}"><button type="button"
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
