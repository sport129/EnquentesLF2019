@extends('layouts.dashboardprincipal')


@section('titulo')
<p class="navbar-brand">Administração - Listagem Usuários</p>
@endsection

@section('conteudo')
@section('botao')
<div style="position: relative; margin-left: 80%; margin: auto ">
    <a href="{{ action('HomeController@cadastrar') }}">
        <button type="button" class="btn btn-info btn-round">Cadastrar Novo Usuário</button>
    </a>
</div>
@endsection
<div class="card-header card-header-primary">
    <h4 class="card-title ">Listagem de Usuários Cadastrados</h4>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    Nome do Usuário
                </th>
                <th>
                    E-mail
                </th>
                <th>
                    Tipo de Usuário
                </th>
                <th>
                    Ações
                </th>
            </thead>
            <tbody>
                @foreach($usuarios as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->tipouser }}</td>
                    <td class="td-actions">
                        <a href="{{ action('HomeController@update', $user->id) }}">
                            <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title
                                title>
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-toggle="modal"
                            data-target="#modalExcluir{{ action('HomeController@deleteUser', $user->id) }}">
                            <i class="material-icons">close</i>
                        </button>
                        <div class="modal fade" id="modalExcluir{{ action('HomeController@deleteUser', $user->id) }}"
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
                                        Você Realmente Tem Certeza que Deseja Excluir o Usuário? Uma vez apagado os
                                        dados serão Deletados PERMANENTEMENTE!!!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <a href="{{ action('HomeController@deleteUser', $user->id) }}"><button
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
