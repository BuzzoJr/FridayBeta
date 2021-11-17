@extends("admin.layouts.default")
@section('breadcrumbs')
<li class="breadcrumb-item active" aria-current="page">Terceiros</li>
@endsection
@section('pageTitle')
<h1>Terceiros</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{route("admin.home")}}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content') 
<div class="card terceiros_index admikoIndex">
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
							<th scope="col" class="text size1" data-toggle="tooltip" title="Número de identificação do terceiro analisado.">ID</th>
							<th scope="col" class="text size2" data-toggle="tooltip" title="Nome do terceiro analisado.">Nome do Terceiro</th>
							<th scope="col" class="text size3 d-none d-sm-table-cell" data-toggle="tooltip" title="Descrição do terceiro analisado para auxiliar a sua identificação.">Descrição</th>
							<th scope="col" class="text size2 d-none d-md-table-cell" data-toggle="tooltip" title="Indicação da localização física do armazenamento.">Localização Física</th>
							<th scope="col" class="text size1 d-none d-lg-table-cell" data-toggle="tooltip" title="Número de identificação do ativo (sistema ou documento) analisado.">ID do Ativo</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Nome do Ativo (sistema ou documento) analisado.">Ativo (Sistema/Documento)</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Responsável pelo terceiro dentro da empresa.">Responsável Interno pelo Ativo</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Indicação de qual serviço é prestado pelo terceiro.">Tipo de Serviço Prestado</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Status se a relação com o terceiro está ativa ou inativa.">Status</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Grau de relevância do terceiro para com a empresa.">Importância</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Link do website do terceiro.">Site do Terceiro</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Número do CNPJ do terceiro.">CNPJ do Terceiro</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Nome completo do representante ou ponto focal do terceiro.">Nome de contato do Terceiro</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="E-mail do representante ou ponto focal do terceiro.">E-mail de contato do Terceiro</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Número de telefone do representante ou ponto focal do terceiro.">Telefone de contato do Terceiro</th>
							<th scope="col" class="text size2 d-none d-lg-table-cell" data-toggle="tooltip" title="Responsável pelo terceiro dentro da empresa.">Responsável Interno</th>
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans("admiko.table_edit")}}</th>
                            @if(Gate::allows('terceiros_allow'))
                            <th scope="col" class="w-5 no-sort" data-orderable="false">{{trans('admiko.table_delete')}}</th>
                            @endIf
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($tableData as $data)
                        <tr>
							<td class="text size1">{{$data->id_terceiros}}</td>
							<td class="text size2">{{$data->nome_do_terceiro}}</td>
							<td class="text size3 d-none d-sm-table-cell">{{$data->descrio}}</td>
							<td class="text size2 d-none d-md-table-cell">{{$data->localizao_fsica_terceiro}}</td>
							<td class="text size1 d-none d-lg-table-cell">{{$data->id_do_ativo}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->ativo_sistemadocumento}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->responsvel_interno_pelo_ativo}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->tipo_de_servio_prestado}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->status}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->importncia}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->site_terceiro}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->cnpj_terceiro}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->nome_contato_terceiro}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->email_contato_terceiro}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->telefone_de_contato_do_terceiro}}</td>
							<td class="text size2 d-none d-lg-table-cell">{{$data->responsvel_interno}}</td>
                            <td class="w-5 no-sort"><a href="{{route("admin.terceiros.edit",[$data->id])}}"><i class="fas fa-edit fa-fw"></i></a></td>
                            @if(Gate::allows(['terceiros_allow']))
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
                    @if(Gate::any(['terceiros_allow']))
                        <a href="{{route('admin.terceiros.create')}}" class="btn btn-primary" role="button"><i class="fas fa-plus fa-fw"></i> {{trans('admiko.table_add')}}</a>
                    @endIf
                </div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 align-self-center paginationInfo"></div>
                <div class="col-12 col-sm-auto order-0 order-sm-3 pt-2 text-end paginationBox"></div>
            </div>
        </div>
    </div>
    @if(Gate::allows('terceiros_allow'))
    <!-- Delete confirm -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="deleteConfirm" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="post" class="w-100" action="{{route("admin.terceiros.delete")}}">
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