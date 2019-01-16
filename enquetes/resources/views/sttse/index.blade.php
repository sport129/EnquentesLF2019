@extends('layouts.dashboardprincipal')

@section('titulo')
<p class="navbar-brand">Administração - Vinculações</p>
@endsection

@section('conteudo')
@section('botao')
@if(old('fk_sede'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
    </button>
    <span>
        <b> SUCESSO - </b> Vinculação Cadastrada</span>
</div>
@endif
@endsection
<div class="card-header card-header-primary">
    <h4 class="card-title ">Listagem Vinculação</h4>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    Sede
                </th>
                <th>
                    Ensino
                </th>
                <th>
                    Serie
                </th>
                <th>
                    Turma
                </th>
                <th>
                    Turno
                </th>
                <th>
                    Ações
                </th>
            </thead>
            <tbody>
                @foreach($table as $t)
                <tr>
                    <td>{{ $t->id_sttse }}</td>
                    <td>{{ $t->Sede }}</td>
                    <td>{{ $t->Ensino }}</td>
                    <td>{{ $t->Serie }}</td>
                    <td>{{ $t->Turma }}</td>
                    <td>{{ $t->Turno }}</td>
                    <td class="td-actions">
                        <a href="">
                            <button type="button" rel="tooltip" class="btn btn-success btn-round" data-original-title
                                title>
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                        <button type="button" rel="tooltip" class="btn btn-danger btn-round" data-toggle="modal"
                            data-target="#modalExcluir">
                            <i class="material-icons">close</i>
                        </button>
                        <div class="modal fade" id="modalExcluir"
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
                                        <a href=""><button type="button"
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
