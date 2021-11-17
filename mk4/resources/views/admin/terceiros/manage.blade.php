@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.terceiros.index") }}">Terceiros</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Terceiros</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.terceiros.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage terceiros_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" autocomplete="off" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                <!-- ID DO TERCEIRO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="id_terceiros" class="col-md-2 col-form-label" data-toggle="tooltip" title="Número de identificação do terceiro analisado.">ID:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="id_terceiros" name="id_terceiros"  placeholder="ID"  value="{{{ old('id_terceiros', isset($data)?$data->id_terceiros : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('id_terceiros')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="id_terceiros_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- NOME DO TERCEIRO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nome_do_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Nome do terceiro analisado.">Nome do Terceiro:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nome_do_terceiro" name="nome_do_terceiro"  placeholder="Nome do Terceiro"  value="{{{ old('nome_do_terceiro', isset($data)?$data->nome_do_terceiro : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nome_do_terceiro')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nome_do_terceiro_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- DESCRIÇÃO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="descrio" class="col-md-2 col-form-label" data-toggle="tooltip" title="Descrição do terceiro analisado para auxiliar a sua identificação.">Descrição:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="descrio" name="descrio"  placeholder="Descrição"  value="{{{ old('descrio', isset($data)?$data->descrio : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('descrio')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="descrio_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- LOCALIZAÇÃO FÍSICA = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="localizao_fsica_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação da localização física do armazenamento.">Localização Física:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="localizao_fsica_terceiro" name="localizao_fsica_terceiro"  placeholder="Localização Física"  value="{{{ old('localizao_fsica_terceiro', isset($data)?$data->localizao_fsica_terceiro : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('localizao_fsica_terceiro')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="localizao_fsica_terceiro_help" class="text-muted">País - no caso dos Estados Unidos, também indicar o Estado</small>
                        </div>
                    </div>
                </div>
                <!-- ID DO ATIVO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="id_do_ativo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Número de identificação do ativo (sistema ou documento) analisado.">ID do Ativo:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="id_do_ativo" name="id_do_ativo"  placeholder="ID do Ativo"  value="{{{ old('id_do_ativo', isset($data)?$data->id_do_ativo : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('id_do_ativo')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="id_do_ativo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- ATIVO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="ativo_sistemadocumento" class="col-md-2 col-form-label" data-toggle="tooltip" title="Nome do Ativo (sistema ou documento) analisado.">Ativo (Sistema/Documento):</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="ativo_sistemadocumento" name="ativo_sistemadocumento"  placeholder="Ativo (Sistema/Documento)"  value="{{{ old('ativo_sistemadocumento', isset($data)?$data->ativo_sistemadocumento : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('ativo_sistemadocumento')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="ativo_sistemadocumento_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- RESPONSÁVEL INTERNO PELO ATIVO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="responsvel_interno_pelo_ativo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Responsável pelo terceiro dentro da empresa.">Responsável Interno pelo Ativo:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="responsvel_interno_pelo_ativo" name="responsvel_interno_pelo_ativo"  placeholder="Responsável Interno pelo Ativo"  value="{{{ old('responsvel_interno_pelo_ativo', isset($data)?$data->responsvel_interno_pelo_ativo : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('responsvel_interno_pelo_ativo')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="responsvel_interno_pelo_ativo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- SERVIÇO PRESTADO = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="tipo_de_servio_prestado" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação de qual serviço é prestado pelo terceiro." >Tipo de Serviço Prestado:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="tipo_de_servio_prestado" name="tipo_de_servio_prestado" required="true">
                                                
                                @foreach($tipo_servico_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('tipo_de_servio_prestado') ? old('tipo_de_servio_prestado') : $data->tipo_de_servio_prestado ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('tipo_de_servio_prestado')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="tipo_de_servio_prestado_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- STATUS = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="status" class="col-md-2 col-form-label" data-toggle="tooltip" title="Status se a relação com o terceiro está ativa ou inativa." >Status:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="status" name="status" required="true">
                                                
                                @foreach($status_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('status') ? old('status') : $data->status ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('status')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="status_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- IMPORTÂNCIA = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="importncia" class="col-md-2 col-form-label" data-toggle="tooltip" title="Grau de relevância do terceiro para com a empresa." >Importância:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="importncia" name="importncia" required="true">
                                                
                                @foreach($importancia_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('importncia') ? old('importncia') : $data->importncia ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('importncia')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="importncia_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- SITE DO TERCEIRO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="site_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Link do website do terceiro.">Site do Terceiro:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="site_terceiro" name="site_terceiro"  placeholder="Site do Terceiro"  value="{{{ old('site_terceiro', isset($data)?$data->site_terceiro : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('site_terceiro')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="site_terceiro_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CNPJ = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="cnpj_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Número do CNPJ do terceiro.">CNPJ do Terceiro:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="cnpj_terceiro" name="cnpj_terceiro"  placeholder="CNPJ do Terceiro"  value="{{{ old('cnpj_terceiro', isset($data)?$data->cnpj_terceiro : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('cnpj_terceiro')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="cnpj_terceiro_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- NOME DO CONTATO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nome_contato_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Nome completo do representante ou ponto focal do terceiro.">Nome de contato do Terceiro:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nome_contato_terceiro" name="nome_contato_terceiro"  placeholder="Nome de contato do Terceiro"  value="{{{ old('nome_contato_terceiro', isset($data)?$data->nome_contato_terceiro : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nome_contato_terceiro')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nome_contato_terceiro_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- EMAIL DO CONTATO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="email_contato_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="E-mail do representante ou ponto focal do terceiro.">E-mail de contato do Terceiro:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="email_contato_terceiro" name="email_contato_terceiro"  placeholder="E-mail de contato do Terceiro"  value="{{{ old('email_contato_terceiro', isset($data)?$data->email_contato_terceiro : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('email_contato_terceiro')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="email_contato_terceiro_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- TELEFONE DO CONTATO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="telefone_de_contato_do_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Número de telefone do representante ou ponto focal do terceiro.">Telefone de contato do Terceiro:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="telefone_de_contato_do_terceiro" name="telefone_de_contato_do_terceiro"  placeholder="Telefone de contato do Terceiro"  value="{{{ old('telefone_de_contato_do_terceiro', isset($data)?$data->telefone_de_contato_do_terceiro : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('telefone_de_contato_do_terceiro')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="telefone_de_contato_do_terceiro_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- RESPONSÁVLE INTERNO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="responsvel_interno" class="col-md-2 col-form-label" data-toggle="tooltip" title="Responsável pelo terceiro dentro da empresa.">Responsável Interno:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="responsvel_interno" name="responsvel_interno"  placeholder="Responsável Interno"  value="{{{ old('responsvel_interno', isset($data)?$data->responsvel_interno : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('responsvel_interno')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="responsvel_interno_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("admin.terceiros.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection