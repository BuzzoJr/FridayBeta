@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.ativos.index") }}">Ativos</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Ativos</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.ativos.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage ativos_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" autocomplete="off" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                <!-- ID ATIVO = TEXT BOX OU AUTOMÁTICO -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="id_ativo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Número de identificação do ativo (sistema ou documento analisado).">ID:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="id_ativo" name="id_ativo"  placeholder="ID"  value="{{{ old('id_ativo', isset($data)?$data->id_ativo : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('id_ativo')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="id_ativo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- ATIVO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="ativo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Nome do ativo (sistema ou documento) analisado.">Ativo:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="ativo" name="ativo"  placeholder="Ativo"  value="{{{ old('ativo', isset($data)?$data->ativo : '') }}}"></textarea>
                            <div class="invalid-feedback @if ($errors->has('ativo')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="ativo_help" class="text-muted">Sistemas/Documentos</small>
                        </div>
                    </div>
                </div>
                <!-- DESCRIÇÃO DO ATIVO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="descrio_ativo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Descrição do ativo (sistema ou documento) analisado para auxiliar a sua identificação.">Descrição:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="descrio_ativo" name="descrio_ativo"  placeholder="Descrição"  value="{{{ old('descrio_ativo', isset($data)?$data->descrio_ativo : '') }}}"></textarea>
                            <div class="invalid-feedback @if ($errors->has('descrio_ativo')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="descrio_ativo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- TIPO DO ATIVO = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="tipo_do_ativo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação do tipo de ativo analisado." >Tipo do Ativo:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="tipo_do_ativo" name="tipo_do_ativo" required="true">
                                                
                                @foreach($tipo_ativo_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('tipo_do_ativo') ? old('tipo_do_ativo') : $data->tipo_do_ativo ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('tipo_do_ativo')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="tipo_do_ativo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- LINK IP = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="linkip" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação do link ou IP para acesso e consulta do ativo.">Link/IP:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="linkip" name="linkip"  placeholder="Link/IP"  value="{{{ old('linkip', isset($data)?$data->linkip : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('linkip')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="linkip_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- FORMATO DO ATIVO = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="formato_do_ativo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre a forma do ativo analisado." >Formato do Ativo:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="formato_do_ativo" name="formato_do_ativo" required="true">
                                                
                                @foreach($formato_ativo_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('formato_do_ativo') ? old('formato_do_ativo') : $data->formato_do_ativo ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('formato_do_ativo')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="formato_do_ativo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- RESPONSÁVEL PELO ATIVO = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="responsvel_pelo_ativo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação se o responsável pelo ativo analisado está dentro da empresa ou se é um terceiro contratado para esta finalidade." >Responsável pelo Ativo:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="responsvel_pelo_ativo" name="responsvel_pelo_ativo" required="true">
                                                
                                @foreach($responsavel_ativo_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('responsvel_pelo_ativo') ? old('responsvel_pelo_ativo') : $data->responsvel_pelo_ativo ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('responsvel_pelo_ativo')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="responsvel_pelo_ativo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- TIPO DE ARMAZENAMENTO = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="tipo_de_armazenamento" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre o tipo de armazenamento do ativo analisado." >Tipo de Armazenamento:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="tipo_de_armazenamento" name="tipo_de_armazenamento" required="true">
                                                
                                @foreach($tipo_armazena_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('tipo_de_armazenamento') ? old('tipo_de_armazenamento') : $data->tipo_de_armazenamento ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('tipo_de_armazenamento')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="tipo_de_armazenamento_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- FORMATO DE ARMAZENAMENTO = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="formato_de_armazenamento" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre a forma como o ativo é armazenado." >Formato de Armazenamento:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="formato_de_armazenamento" name="formato_de_armazenamento" required="true">
                                                
                                @foreach($formato_armazena_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('formato_de_armazenamento') ? old('formato_de_armazenamento') : $data->formato_de_armazenamento ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('formato_de_armazenamento')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="formato_de_armazenamento_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- NOME DO SISTEMA DE ARMAZENAMENTO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nome_do_sistema_de_armazenamento" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação do nome do sistema em que o ativo encontra-se armazenado.">Nome do Sistema de Armazenamento:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nome_do_sistema_de_armazenamento" name="nome_do_sistema_de_armazenamento"  placeholder="Nome do Sistema de Armazenamento"  value="{{{ old('nome_do_sistema_de_armazenamento', isset($data)?$data->nome_do_sistema_de_armazenamento : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nome_do_sistema_de_armazenamento')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nome_do_sistema_de_armazenamento_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- MATRIZ OU FILIAL = TEXTO BOX (OU AUTOMÁTICO) -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="matriz_ou_filial" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja interno, indicação se este armazenamento é feito na matriz ou filial da empresa.">Matriz ou Filial:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="matriz_ou_filial" name="matriz_ou_filial"  placeholder="Matriz ou Filial"  value="{{{ old('matriz_ou_filial', isset($data)?$data->matriz_ou_filial : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('matriz_ou_filial')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="matriz_ou_filial_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- DEPARTAMENTO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="departamento" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja interno, indicação da área/departamento da empresa relacionado ao armazenamento do ativo analisado.">Departamento:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="departamento" name="departamento"  placeholder="Departamento"  value="{{{ old('departamento', isset($data)?$data->departamento : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('departamento')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="departamento_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- ID DO TERCEIRO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="id_do_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação do ID constante no data mapping de terceiros.">ID do Terceiro:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="id_do_terceiro" name="id_do_terceiro"  placeholder="ID do Terceiro"  value="{{{ old('id_do_terceiro', isset($data)?$data->id_do_terceiro : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('id_do_terceiro')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="id_do_terceiro_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- NOME DO TERCEIRO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nome_do_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação do nome do terceiro contratado.">Nome do Terceiro:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nome_do_terceiro" name="nome_do_terceiro"  placeholder="Nome do Terceiro"  value="{{{ old('nome_do_terceiro', isset($data)?$data->nome_do_terceiro : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nome_do_terceiro')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nome_do_terceiro_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- LOCALIZAÇÃO FÍSICA DOS ATIVOS = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="localizao_fsica_ativos" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação da localização física do armazenamento.">Localização Física:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="localizao_fsica_ativos" name="localizao_fsica_ativos"  placeholder="Localização Física"  value="{{{ old('localizao_fsica_ativos', isset($data)?$data->localizao_fsica_ativos : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('localizao_fsica_ativos')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="localizao_fsica_ativos_help" class="text-muted">País - No caso dos Estados Unidos, também indicar o Estado</small>
                        </div>
                    </div>
                </div>
                <!-- DADOS PESSOAIS COLETADOS = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="dados_pessoais_coletados" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação de quais dados pessoais são coletados.">Dados Pessoais Coletados:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="dados_pessoais_coletados" name="dados_pessoais_coletados"  placeholder="Dados Pessoais Coletados"  value="{{{ old('dados_pessoais_coletados', isset($data)?$data->dados_pessoais_coletados : '') }}}"></textarea>
                            <div class="invalid-feedback @if ($errors->has('dados_pessoais_coletados')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="dados_pessoais_coletados_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- VOLUME DE DADOS PESSOAIS = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="volume_de_dados_pessoais" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação da quantidade aproximada de dados pessoais tratados no ativo analisado." >Volume de Dados Pessoais:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="volume_de_dados_pessoais" name="volume_de_dados_pessoais" required="true">
                                                
                                @foreach($volume_dados_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('volume_de_dados_pessoais') ? old('volume_de_dados_pessoais') : $data->volume_de_dados_pessoais ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('volume_de_dados_pessoais')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="volume_de_dados_pessoais_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- TRAFEGO DE REDE = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="trfego_de_rede" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre a criptografia durante o tráfego do ativo." >Tráfego de Rede:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="trfego_de_rede" name="trfego_de_rede" required="true">
                                                
                                @foreach($trafego_rede_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('trfego_de_rede') ? old('trfego_de_rede') : $data->trfego_de_rede ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('trfego_de_rede')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="trfego_de_rede_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- AUTENTICAÇÃO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="autenticao" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre sistemas com senhas próprias e senhas integradas.">Autenticação:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="autenticao" name="autenticao"  placeholder="Autenticação"  value="{{{ old('autenticao', isset($data)?$data->autenticao : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('autenticao')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="autenticao_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CRIPTOGRAFIA NO ARMAZENAMENTO = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="criptografia_no_armazenamento" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre a criptografia do ativo." >Criptografia no Armazenamento:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="criptografia_no_armazenamento" name="criptografia_no_armazenamento" required="true">
                                                
                                @foreach($criptografia_armazena_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('criptografia_no_armazenamento') ? old('criptografia_no_armazenamento') : $data->criptografia_no_armazenamento ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('criptografia_no_armazenamento')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="criptografia_no_armazenamento_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- FINALIDADE = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="finalidade" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre a finalidade da coleta e tratamento dos dados pessoais em relação ao ativo analisado.">Finalidade:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="finalidade" name="finalidade"  placeholder="Finalidade"  value="{{{ old('finalidade', isset($data)?$data->finalidade : '') }}}"></textarea>
                            <div class="invalid-feedback @if ($errors->has('finalidade')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="finalidade_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CATEGORIA DE DADOS = MULTISELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="categoria_de_dados" class="col-md-2 col-form-label" data-toggle="tooltip" title="Categoria dos dados analisados.">Categoria de Dados:</label>
                            <div id="myModal" class="col-md-10" style="position: relative">
                                <select class="js-example-basic-multiple" name="categoria_de_dados[]" multiple="multiple" id="categoria_de_dados" required="true" style="width: 100%" data-allow-clear="true">
                
                                    @foreach($cat_dados_all as $id => $value)
                                    <option value="{{ $id }}" {{ in_array($id, $datacatd) ? "selected" : "" }}>{{ $value }}</option>
                                    @endforeach
                
                                </select>
                                <div class="invalid-feedback @if ($errors->has('categoria_de_dados')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="categoria_de_dados_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- TITULAR DE DADOS = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="titular_de_dados" class="col-md-2 col-form-label" data-toggle="tooltip" title="Pessoa natural a quem se referem os dados pessoais que são objeto de tratamento." >Titular de Dados:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="titular_de_dados" name="titular_de_dados" required="true">
                                                
                                @foreach($titular_dados_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('titular_de_dados') ? old('titular_de_dados') : $data->titular_de_dados ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('titular_de_dados')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="titular_de_dados_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CATEGORIA DO TITULAR = MULTISELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="categoria_do_titular" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação do vínculo entre titular e empresa.">Categoria do Titular:</label>
                            <div id="myModal" class="col-md-10" style="position: relative">
                                <select class="js-example-basic-multiple" name="categoria_do_titular[]" multiple="multiple" id="categoria_do_titular" required="true" style="width: 100%" data-allow-clear="true">
                
                                    @foreach($cat_titular_all as $id => $value)
                                    <option value="{{ $id }}" {{ in_array($id, $datacatt) ? "selected" : "" }}>{{ $value }}</option>
                                    @endforeach
                
                                </select>
                                <div class="invalid-feedback @if ($errors->has('categoria_do_titular')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="categoria_do_titular_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- PTAZO DE RETENÇÃO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="prazo_de_reteno" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação do prazo de manutenção dos dados em relação ao ativo analisado.">Prazo de Retenção:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="prazo_de_reteno" name="prazo_de_reteno"  placeholder="Prazo de Retenção"  value="{{{ old('prazo_de_reteno', isset($data)?$data->prazo_de_reteno : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('prazo_de_reteno')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="prazo_de_reteno_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- BASE LEGAL = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="base_legal" class="col-md-2 col-form-label" data-toggle="tooltip" title="Bases legais para o tratamento de dados pessoais, previstas em rol taxativo do artigo 7º da LGPD." >Base Legal:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="base_legal" name="base_legal" required="true">
                                                
                                @foreach($base_legal_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('base_legal') ? old('base_legal') : $data->base_legal ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('base_legal')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="base_legal_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- PRIMÁRIO OU SECUNDÁRIO = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="ativo_primrio_ou_secundrio" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação se o ativo analisado é primário ou secundário." >Ativo Primário ou Secundário:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="ativo_primrio_ou_secundrio" name="ativo_primrio_ou_secundrio" required="true">
                                                
                                @foreach($ativo_primasecunda_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('ativo_primrio_ou_secundrio') ? old('ativo_primrio_ou_secundrio') : $data->ativo_primrio_ou_secundrio ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('ativo_primrio_ou_secundrio')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="ativo_primrio_ou_secundrio_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- ID DO PRIMEIRO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="id_primrio" class="col-md-2 col-form-label" data-toggle="tooltip" title="Número de identificação do ativo (sistema ou documento) primário vinculado ao ativo secundário analisado.">ID Primário:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="id_primrio" name="id_primrio"  placeholder="ID Primário"  value="{{{ old('id_primrio', isset($data)?$data->id_primrio : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('id_primrio')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="id_primrio_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- RESPONSÁVEL INTERNO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="responsvel_interno" class="col-md-2 col-form-label" data-toggle="tooltip" title="Responsável pelo ativo dentro da empresa.">Responsável Interno:</label>
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
                    <a href="{{ route("admin.ativos.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection