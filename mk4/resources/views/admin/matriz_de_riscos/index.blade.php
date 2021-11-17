@extends("admin.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Matriz de Riscos</li>
@endsection
@section('pageTitle')
<h1>Matriz de Riscos</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("admin.home")}}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card matriz_de_riscos_index admikoIndex">
    <div class="card-body">
        <div class="tableBox" id="tableBox">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <div class="pb-2 pb-sm-0">
                        <div class="lengthTable"></div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-start justify-content-sm-end">
                            <div class="searchTable">
					<div class="input-group ps-2">
                        <input type="text" name="admiko_search" class="form-control searchTableInput" placeholder="Search" value="">
                    </div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tableLayout pb-2">
                                <table class="table tableSort" style="width:100%" data-dom="ltrip">
                    <thead>
                        <tr data-sort-method='thead'>
							<th scope="col" class="text size1 azul" data-toggle="tooltip" title="Número de identificação do processo ou ativo analisado">ID</th>
							<th scope="col" class="text size1 azul" data-toggle="tooltip" title="Número de identificação do processo ou ativo analisado">ID no Data Mapping</th>
							<th scope="col" class="text size2 azul d-none d-sm-table-cell" data-toggle="tooltip" title="Nome do processo ou ativo analisado">Nome do Ativo ou Processo</th>
							<th scope="col" class="text size3 azul d-none d-md-table-cell" data-toggle="tooltip" title="Descrição do processo ou ativo para auxiliar a identificação">Descrição</th>
							<th scope="col" class="text size2 azul d-none d-lg-table-cell" data-toggle="tooltip" title="Caso o armazenamento seja interno, indicação da área/departamento da empresa relacionado ao armazenamento do processo ou ativo analisado.">Departamento</th>
							<th scope="col" class="text size2 azul d-none d-lg-table-cell" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação do nome do terceiro contratado.">Terceiro</th>
							<th scope="col" class="text size2 azul d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação de quais dados pessoais são coletados.">Dados Pessoais Coletados</th>
							<th scope="col" class="text size2 azul d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação sobre a finalidade da coleta e tratamento dos dados pessoais em relação ao processo analisado.">Finalidade</th>
							<th scope="col" class="text size2 azul d-none d-lg-table-cell" data-toggle="tooltip" title="Categoria dos dados analisados.">Categoria de Dados</th>
							<th scope="col" class="text size2 azul d-none d-lg-table-cell" data-toggle="tooltip" title="Pessoa natural a quem se referem os dados pessoais que são objeto de tratamento.">Titular de Dados</th>
							<th scope="col" class="text size2 azul d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação do vínculo entre titular e empresa." >Categoria do Titular</th>
							<th scope="col" class="text size2 azul d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação do prazo de manutenção dos dados em relação ao processo analisado.">Prazo de Retenção</th>
							<th scope="col" class="text size3 azul d-none d-lg-table-cell" data-toggle="tooltip" title="Bases legais para o tratamento de dados pessoais, previstas em rol taxativo do artigo 7º da LGPD.">Base Legal</th>
							<th scope="col" class="text size3 vermelho d-none d-lg-table-cell" data-toggle="tooltip" title="Evento que existe a probabilidade de acontecer e gerar determinado impacto que cause prejuízos as atividades e objetivos da empresa.">Eventos de Risco</th>
							<th scope="col" class="text size3 vermelho d-none d-lg-table-cell" data-toggle="tooltip" title="Causas que podem provocar o evento de risco.">Causas</th>
							<th scope="col" class="text size2 vermelho d-none d-lg-table-cell" data-toggle="tooltip" title="Categorização do evento de risco.">Categoria de Risco</th>
							<th scope="col" class="text size3 vermelho d-none d-lg-table-cell" data-toggle="tooltip" title="Descrição dos principais impactos ocasionados caso haja a materialização do risco. Serve de suporte para entender a graduação do impacto indicada.">Consequências</th>
							<th scope="col" class="size2 vermelho d-none d-lg-table-cell" data-toggle="tooltip" title="Data em que o risco foi avaliado">Data de Avaliação do Risco</th>
							<th scope="col" class="text size1 vermelho d-none d-lg-table-cell" data-toggle="tooltip" title="Escala de probabilidade antes da aplicação do plano de ação.">Probabilidade</th>
							<th scope="col" class="text size1 vermelho d-none d-lg-table-cell" data-toggle="tooltip" title="Escala de impacto antes da aplicação do plano de ação.">Impacto</th>
							<th scope="col" class="text size2 vermelho d-none d-lg-table-cell" data-toggle="tooltip" title="Grau do evento de risco calculado com base em sua probabilidade de ocorrência e o seu impacto.">Risco Inerente</th>
							<th scope="col" class="text size3 roxo d-none d-lg-table-cell" data-toggle="tooltip" title="Refere-se à resposta da empresa para cada risco identificado.">Resposta ao Risco</th>
							<th scope="col" class="text size3 roxo d-none d-lg-table-cell" data-toggle="tooltip" title="Plano elaborado pela área para mitigar o risco. Pode ser, por exemplo, um projeto em andamento ou uma ação ainda não iniciada. Todo risco precisa de um plano de ação.">Planos de Ação para Implementação de Controles</th>
							<th scope="col" class="text size3 roxo d-none d-lg-table-cell">Fundamentação</th>
							<th scope="col" class="text size2 roxo d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação do status do plano de ação">Status do Plano de Ação</th>
							<th scope="col" class="text size2 roxo d-none d-lg-table-cell" data-toggle="tooltip" title="Refere-se ao gestor responsável pelo plano de ação."">Gestor Responsável</th>
							<th scope="col" class="size2 roxo d-none d-lg-table-cell" data-toggle="tooltip" title="Data definida pela área para a implantação do plano.">Data de Início</th>
							<th scope="col" class="size2 roxo d-none d-lg-table-cell" data-toggle="tooltip" title="Data definida pela área para a implantação do plano.">Data de Limite</th>
							<th scope="col" class="text size2 roxo d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação se o plano de ação foi efetivo ou não.">Efetividade</th>
							<th scope="col" class="text size2 roxo d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação da força do plano de ação aplicado">Força</th>
							<th scope="col" class="text size2 roxo d-none d-lg-table-cell" data-toggle="tooltip" title="Grau do risco que se pretende atingir após a aplicação do plano de ação.">Objetivo do Risco</th>
							<th scope="col" class="size2 verde d-none d-lg-table-cell" data-toggle="tooltip" title="Data em que o risco foi avaliado">Data de Avaliação Residual</th>
							<th scope="col" class="text size1 verde d-none d-lg-table-cell" data-toggle="tooltip" title="Escala de probabilidade após a aplicação do plano de ação.">Probabilidade Residual</th>
							<th scope="col" class="text size1 verde d-none d-lg-table-cell" data-toggle="tooltip" title="Escala de impacto após a aplicação do plano de ação.">Impacto Residual</th>
							<th scope="col" class="text size2 verde d-none d-lg-table-cell" data-toggle="tooltip" title="Grau do evento de risco calculado após a aplicação do plano de ação, com base em nova escala de probabilidade e impacto.">Risco Residual</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans("admiko.table_edit")}}</th>
                            @if(Gate::allows('matriz_de_riscos_allow'))
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans('admiko.table_delete')}}</th>
                            @endIf
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tableData as $data)
                        <tr>
							<td class="text size1">{{$data->id_col}}</td>
							<td class="text size1">{{$data->id_do_processo_id()->implode('')??""}}</td>
							<td class="text size2 d-none d-sm-table-cell">{{$data->processo_id()->implode('')??""}}</td>
							<td class="text size3 d-none d-md-table-cell">{{$data->descrio_id()->implode('')??""}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->departamento_id()->implode('')??""}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->terceiro_id()->implode('')??""}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->dados_pessoais_coletados_id()->implode('')??""}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->finalidade_id()->implode('')??""}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->categoria_de_dados_id()->implode('')??""}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->titular_de_dados_id()->implode('')??""}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->categoria_do_titular_id()->implode('')??""}}</td>
							<td class="text size3 d-none d-lg-table-cell">{{$data->prazo_de_reteno_id()->implode('')??""}}</td>
							<td class="text size3 d-none d-lg-table-cell">{{$data->base_legal_id()->implode('')??""}}</td>
							<td class="text size3 d-none d-lg-table-cell">{{$data->eventos_de_risco}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->causas}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->categoria_de_risco}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->consequncias}}</td>
							<td class="size2 d-none d-lg-table-cell">{{$data->data_de_avaliao_do_risco}}</td>
							<td class="text size1 d-none d-lg-table-cell">{{$data->probabilidade}}</td>
							<td class="text size1 d-none d-lg-table-cell">{{$data->impacto}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->risco_inerente}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->resposta_ao_risco}}</td>
							<td class="text size3 d-none d-lg-table-cell">{{$data->planos_de_ao_para_implementao_de_controles}}</td>
							<td class="text size3 d-none d-lg-table-cell">{{$data->fundamentao}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->status_do_plano_de_ao}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->gestor_responsvel}}</td>
							<td class="size2 d-none d-lg-table-cell">{{$data->data_de_incio}}</td>
							<td class="size2 d-none d-lg-table-cell">{{$data->data_de_limite}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->efetividade}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->fora}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->objetivo_do_risco}}</td>
							<td class="size2 d-none d-lg-table-cell">{{$data->data_de_avaliao_residual}}</td>
							<td class="text size1 d-none d-lg-table-cell">{{$data->probabilidade_residual}}</td>
							<td class="text size1 d-none d-lg-table-cell">{{$data->impacto_residual}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->risco_residual}}</td>
                            <td class="w-5 no-sort"><a href="{{route("admin.matriz_de_riscos.edit",[$data->id])}}"><i class="fas fa-edit fa-fw"></i></a></td>
                            @if(Gate::allows(['matriz_de_riscos_allow']))
                            <td class="w-5 no-sort">
                            <a href="#" data-id="{{$data->id}}" class="admiko_deleteConfirm" data-bs-toggle="modal" data-bs-target="#deleteConfirm"><i class="fas fa-trash fa-fw"></i></a>
                        </td>
                            @endIf
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12 col-sm order-3 order-sm-0 pt-2">
                    @if(Gate::any(['matriz_de_riscos_allow']))
                        <a href="{{route('admin.matriz_de_riscos.create')}}" class="btn btn-primary" role="button"><i class="fas fa-plus fa-fw"></i> {{trans('admiko.table_add')}}</a>
                    @endIf
                </div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 align-self-center paginationInfo"></div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 text-end paginationBox"></div>
            </div>
        </div>
    </div>
    @if(Gate::allows('matriz_de_riscos_allow'))
    <!-- Delete confirm -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" class="w-100" action="{{route("admin.matriz_de_riscos.delete")}}">
            @method('DELETE')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('admiko.delete_confirm')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">{{trans('admiko.delete_message')}}</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('admiko.delete_close_btn')}}</button>
                    <button type="submit" class="btn btn-danger deleteSoft">{{trans('admiko.delete_delete_btn')}}</button>
                </div>
            </div>
            <div class="dataDelete"></div>
            </form>
        </div>
    </div>
    @endIf
    
</div>
@endsection