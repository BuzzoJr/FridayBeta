@extends("admin.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Ativos</li>
@endsection
@section('pageTitle')
<h1>Ativos</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("admin.home")}}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card ativos_index admikoIndex">
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
							<th scope="col" class="text size1" data-toggle="tooltip" title="Número de identificação do ativo (sistema ou documento analisado).">ID</th>
							<th scope="col" class="text size2" data-toggle="tooltip" title="Nome do ativo (sistema ou documento) analisado.">Ativo</th>
							<th scope="col" class="text size3 d-none d-sm-table-cell" data-toggle="tooltip" title="Descrição do ativo (sistema ou documento) analisado para auxiliar a sua identificação.">Descrição</th>
							<th scope="col" class="text size2 d-none d-md-table-cell" data-toggle="tooltip" title="Indicação do tipo do ativo analisado." >Tipo do Ativo</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação do link ou IP para acesso e consulta do ativo.">Link/IP</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação sobre a forma do ativo analisado.">Formato do Ativo</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação se o responsável pelo ativo analisado está dentro da empresa ou se é um terceiro contratado para esta finalidade.">Responsável pelo Ativo</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação sobre o tipo de armazenamento do ativo analisado.">Tipo de Armazenamento</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação sobre a forma como o ativo é armazenado.">Formato de Armazenamento</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação do nome do sistema em que o ativo encontra-se armazenado.">Nome do Sistema de Armazenamento</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Caso o armazenamento seja interno, indicação se este armazenamento é feito na matriz ou filial da empresa.">Matriz ou Filial</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Caso o armazenamento seja interno, indicação da área/departamento da empresa relacionado ao armazenamento do ativo analisado.">Departamento</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação do ID constante no data mapping de terceiros.">ID do Terceiro</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação do nome do terceiro contratado.">Nome do Terceiro</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação da localização física do armazenamento.">Localização Física</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação de quais dados pessoais são coletados.">Dados Pessoais Coletados</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação da quantidade aproximada de dados pessoais tratados no ativo analisado.">Volume de Dados Pessoais</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação sobre a criptografia durante o tráfego do ativo." >Tráfego de Rede</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação sobre sistemas com senhas próprias e senhas integradas.">Autenticação</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação sobre a criptografia do ativo.">Criptografia no Armazenamento</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação sobre a finalidade da coleta e tratamento dos dados pessoais em relação ao ativo analisado.">Finalidade</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Categoria dos dados analisados.">Categoria de Dados</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Pessoa natural a quem se referem os dados pessoais que são objeto de tratamento.">Titular de Dados</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação do vínculo entre titular e empresa.">Categoria do Titular</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação do prazo de manutenção dos dados em relação ao ativo analisado.">Prazo de Retenção</th>
							<th scope="col" class="text size3 d-none d-lg-table-cell" data-toggle="tooltip" title="Bases legais para o tratamento de dados pessoais, previstas em rol taxativo do artigo 7º da LGPD.">Base Legal</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação se o ativo analisado é primário ou secundário.">Ativo Primário ou Secundário</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Número de identificação do ativo (sistema ou documento) primário vinculado ao ativo secundário analisado.">ID Primário</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Responsável pelo ativo dentro da empresa.">Responsável Interno</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans("admiko.table_edit")}}</th>
                            @if(Gate::allows('ativos_allow'))
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans('admiko.table_delete')}}</th>
                            @endIf
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tableData as $data)
                        <tr>
							<td class="text size1">{{$data->id_ativo}}</td>
							<td class="text size2">{{$data->ativo}}</td>
							<td class="text size3 d-none d-sm-table-cell">{{$data->descrio_ativo}}</td>
							<td class="text size2 d-none d-md-table-cell">{{$data->tipo_do_ativo}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->linkip}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->formato_do_ativo}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->responsvel_pelo_ativo}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->tipo_de_armazenamento}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->formato_de_armazenamento}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->nome_do_sistema_de_armazenamento}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->matriz_ou_filial}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->departamento}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->id_do_terceiro}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->nome_do_terceiro}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->localizao_fsica_ativos}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->dados_pessoais_coletados}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->volume_de_dados_pessoais}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->trfego_de_rede}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->autenticao}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->criptografia_no_armazenamento}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->finalidade}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->categoria_de_dados}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->titular_de_dados}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->categoria_do_titular}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->prazo_de_reteno}}</td>
							<td class="text size3 d-none d-lg-table-cell">{{$data->base_legal}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->ativo_primrio_ou_secundrio}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->id_primrio}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->responsvel_interno}}</td>
                            <td class="w-5 no-sort"><a href="{{route("admin.ativos.edit",[$data->id])}}"><i class="fas fa-edit fa-fw"></i></a></td>
                            @if(Gate::allows(['ativos_allow']))
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
                    @if(Gate::any(['ativos_allow']))
                        <a href="{{route('admin.ativos.create')}}" class="btn btn-primary" role="button"><i class="fas fa-plus fa-fw"></i> {{trans('admiko.table_add')}}</a>
                    @endIf
                </div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 align-self-center paginationInfo"></div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 text-end paginationBox"></div>
            </div>
        </div>
    </div>
    @if(Gate::allows('ativos_allow'))
    <!-- Delete confirm -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" class="w-100" action="{{route("admin.ativos.delete")}}">
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