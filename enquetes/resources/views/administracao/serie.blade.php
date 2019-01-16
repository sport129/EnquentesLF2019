@extends('layouts.dashboardprincipal')

@section('titulo')
<p class="navbar-brand">Administração - Series</p>
@endsection

@section('conteudo')
@section('botao')
<div class="card-body">
    <div class="table-responsive">
        <form method="POST" action="{{ action('SeriesController@addSerie', empty($serie->id_serie) ? 0 : $serie->id_serie) }}"
            aria-label="{{ __('Register') }}">
            @csrf
            <div class="form-group">
                <label for="Serie">{{ __('Nome da Serie') }}</label>
                <input id="Serie" type="text" class="form-control{{ $errors->has('Serie') ? ' is-invalid' : '' }}" name="Serie"
                    value="{{ empty($serie->id_serie) ?  '' : $serie->Serie }}" placeholder="Digite a Serie">
                @if ($errors->has('Serie'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('Serie') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">{{ empty($serie->id_serie) ? __('Registrar Nova Serie') :
                __('Atualiza Serie') }}</button>
        </form>
    </div>
</div>
@endsection
<div class="card-header card-header-primary">
    <h4 class="card-title ">Listagem das Series</h4>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    Series
                </th>
                <th>
                    Ações
                </th>
            </thead>
            <tbody>
                @foreach($listagem as $lista)
                <tr>
                    <td>{{ $lista->id_serie }}</td>
                    <td>{{ $lista->Serie }}</td>
                    <td class="td-actions">
                        <a href="{{ action('SeriesController@index', $lista->id_serie) }}">
                            <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title
                                title>
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-toggle="modal"
                            data-target="#modalExcluir{{ action('SeriesController@deletarSerie', $lista->id_serie) }}">
                            <i class="material-icons">close</i>
                        </button>
                        <div class="modal fade" id="modalExcluir{{ action('SeriesController@deletarSerie', $lista->id_serie) }}"
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
                                        Você Realmente Tem Certeza que Deseja Excluir essa Serie? Uma vez apagado os
                                        dados serão Deletados PERMANENTEMENTE!!!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <a href="{{ action('SeriesController@deletarSerie', $lista->id_serie) }}"><button
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
