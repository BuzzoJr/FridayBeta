@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.processos.index") }}">Processos</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Processos</h1> 
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.processos.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage processos_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" autocomplete="off" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                <!-- ID = TEXT BOX OU AUTOMÁTICO -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="id_processo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Número de identificação do processo analisado">ID:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="id_processo" name="id_processo"  placeholder="ID"  value="{{{ old('id_processo', isset($data)?$data->id_processo : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('id_processo')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="id_processo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- PROCESSO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="processo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Nome do processo analisado">Processo:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="processo" name="processo"  placeholder="Processo"  value="{{{ old('processo', isset($data)?$data->processo : '') }}}"></textarea>
                            <div class="invalid-feedback @if ($errors->has('processo')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="processo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- DESCRIÇÃO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="descrio" class="col-md-2 col-form-label" data-toggle="tooltip" title="Descrição do processo para auxiliar a identificação">Descrição:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="descrio" name="descrio"  placeholder="Descrição"  value="{{{ old('descrio', isset($data)?$data->descrio : '') }}}"></textarea>
                            <div class="invalid-feedback @if ($errors->has('descrio')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="descrio_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- RESPONSÁVEL PELO PROCESSO = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="responsvel_pelo_processo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação se o responsável pelo processo analisado está dentro da empresa ou se é um terceiro contratado para esta finalidade.">Responsável pelo Processo:*</label>
                        <div class="col-md-10">
                            <select class="form-select" id="responsvel_pelo_processo" name="responsvel_pelo_processo" required="true">
                                                
                                @foreach($responsvel_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('responsvel_pelo_processo') ? old('responsvel_pelo_processo') : $data->responsvel_pelo_processo ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('responsvel_pelo_processo')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="responsvel_pelo_processo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- FORMA DA COLETA DOS DADOS = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="forma_de_coleta_dos_dados" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre a forma como os dados são coletados em relação ao processo analisado.".>Forma de Coleta dos Dados:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="forma_de_coleta_dos_dados" name="forma_de_coleta_dos_dados" required="true">
                                                
                                @foreach($forma_de_coleta_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('forma_de_coleta_dos_dados') ? old('forma_de_coleta_dos_dados') : $data->forma_de_coleta_dos_dados ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('forma_de_coleta_dos_dados')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="forma_de_coleta_dos_dados_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- ID DA COLETA = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="id_da_coleta" class="col-md-2 col-form-label">ID da Coleta:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="id_da_coleta" name="id_da_coleta"  placeholder="ID da Coleta"  value="{{{ old('id_da_coleta', isset($data)?$data->id_da_coleta : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('id_da_coleta')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="id_da_coleta_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- TIPO DE ARMAZENAMENTO = MULTI SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="tipo_de_armazenamento" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre o tipo de armazenamento do ativo analisado.">Tipo de Armazenamento:</label>
                            <div id="myModal" class="col-md-10" style="position: relative">
                                <select class="js-example-basic-multiple" name="tipo_de_armazenamento[]" multiple="multiple" id="tipo_de_armazenamento" required="true" style="width: 100%" data-allow-clear="true">

                                    @foreach($tipo_de_armazenamento_all as $id => $value)
                                    <option value="{{ $id }}" {{ in_array($id, $datatipo) ? "selected" : "" }}>{{ $value }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback @if ($errors->has('tipo_de_armazenamento')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="tipo_de_armazenamento_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
             <!-- ID DE ARMAZENAMENTO = TEXT BOX -->
             <div class=" col-12">
                <div class="form-group row">
                    <label for="id_de_armazenamento" class="col-md-2 col-form-label" >ID de Armazenamento:</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="id_de_armazenamento" name="id_de_armazenamento"  placeholder="ID de Armazenamento"  value="{{{ old('id_de_armazenamento', isset($data)?$data->id_de_armazenamento : '') }}}">
                        <div class="invalid-feedback @if ($errors->has('id_de_armazenamento')) d-block @endif">{{trans('admiko.required_text')}}</div>
                        <small id="id_de_armazenamento_help" class="text-muted"></small>
                    </div>
                </div>
            </div>
                <!-- NOME DO SISTEMA DE ARMAZENAMENTO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="nome_do_sistema_de_armazenamento" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação do nome do sistema utilizado para armazenamento durante o processo." >Nome do Sistema de Armazenamento:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nome_do_sistema_de_armazenamento" name="nome_do_sistema_de_armazenamento"  placeholder="Nome do Sistema de Armazenamento"  value="{{{ old('nome_do_sistema_de_armazenamento', isset($data)?$data->nome_do_sistema_de_armazenamento : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nome_do_sistema_de_armazenamento')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nome_do_sistema_de_armazenamento_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- MATRIZ OU FILIAL = TEXT BOX (PODEMOS FAZER UM CAMPO DE CRIAÇÃO DE SEDES E VIRA UM SELECT Q É CRIADO AUTOMÁTICO) -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="matriz_ou_filial" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja interno, indicação se este armazenamento é feito na matriz ou filial da empresa." >Matriz ou Filial:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="matriz_ou_filial" name="matriz_ou_filial"  placeholder="Matriz ou Filial"  value="{{{ old('matriz_ou_filial', isset($data)?$data->matriz_ou_filial : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('matriz_ou_filial')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="matriz_ou_filial_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- DEPARTAMENTO =  TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="departamento" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja interno, indicação da área/departamento da empresa relacionado ao armazenamento do processo analisado." >Departamento:</label>
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
                        <label for="id_do_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação do ID constante no data mapping de terceiros." >ID do Terceiro:</label>
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
                        <label for="nome_do_terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação do nome do terceiro contratado." >Nome do Terceiro:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nome_do_terceiro" name="nome_do_terceiro"  placeholder="Nome do Terceiro"  value="{{{ old('nome_do_terceiro', isset($data)?$data->nome_do_terceiro : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('nome_do_terceiro')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="nome_do_terceiro_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- LOCALIZAÇÃO FÍSICA = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="localizao_fsica" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação da localização física do armazenamento.">Localização Física:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="localizao_fsica" name="localizao_fsica"  placeholder="Localização Física"  value="{{{ old('localizao_fsica', isset($data)?$data->localizao_fsica : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('localizao_fsica')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="localizao_fsica_help" class="text-muted">País - No caso dos Estados Unidos, também indicar o Estado</small>
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
                <!-- VOLUME DE DADOS PESSOAS = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="volume_de_dados_pessoais" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação da quantidade aproximada de dados pessoais tratados no processo analisado." >Volume de Dados Pessoais:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="volume_de_dados_pessoais" name="volume_de_dados_pessoais" required="true">
                                                
                                @foreach($volumedados_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('volume_de_dados_pessoais') ? old('volume_de_dados_pessoais') : $data->volume_de_dados_pessoais ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('volume_de_dados_pessoais')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="volume_de_dados_pessoais_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- TRATAMENTOS REALIZADOS = MULTI SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="tratamentos_realizados" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação de qual(ais) tratamento(s) são realizado(s).">Tratamentos Realizados:</label>
                            <div id="myModal" class="col-md-10" style="position: relative">
                                <select class="js-example-basic-multiple" name="tratamentos_realizados[]" multiple="multiple" id="tratamentos_realizados" required="true" style="width: 100%" data-allow-clear="true">

                                    @foreach($tratamentos_realizados_all as $id => $value)
                                    <option value="{{ $id }}" {{ in_array($id, $datatrata) ? "selected" : "" }}>{{ $value }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback @if ($errors->has('tratamentos_realizados')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="tratamentos_realizados_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- DEPARTAMENTO COM ACESSO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="departamentos_com_acesso_aos_dados" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação de qual(ais) departamento(s)  podem acessar os dados pessoais coletados." >Departamento(s) com Acesso aos Dados:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="departamentos_com_acesso_aos_dados" name="departamentos_com_acesso_aos_dados"  placeholder="Departamento(s) com Acesso aos Dados"  value="{{{ old('departamentos_com_acesso_aos_dados', isset($data)?$data->departamentos_com_acesso_aos_dados : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('departamentos_com_acesso_aos_dados')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="departamentos_com_acesso_aos_dados_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- FINALIDADE = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="finalidade" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre a finalidade da coleta e tratamento dos dados pessoais em relação ao processo analisado.">Finalidade:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="finalidade" name="finalidade"  placeholder="Finalidade"  value="{{{ old('finalidade', isset($data)?$data->finalidade : '') }}}"></textarea>
                            <div class="invalid-feedback @if ($errors->has('finalidade')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="finalidade_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CATEGORIA DE DADOS = MULTI SELECT -->
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
                        <label for="titular_de_dados" class="col-md-2 col-form-label" data-toggle="tooltip" title="Pessoa natural a quem se referem os dados pessoais que são objeto de tratamento." >Titular de dados:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="titular_de_dados" name="titular_de_dados" required="true">
                                                
                                @foreach($titular_de_dados_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('titular_de_dados') ? old('titular_de_dados') : $data->titular_de_dados ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('titular_de_dados')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="titular_de_dados_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CATEGORIA DO TITULAR = MULTI SELECT -->
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
                <!-- PRAZO DE RETENÇÃO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="prazo_de_reteno" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação do prazo de manutenção dos dados em relação ao processo analisado.">Prazo de Retenção:</label>
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
                        <label for="base_legal" class="col-md-2 col-form-label" data-toggle="tooltip" title="Bases legais para o tratamento de dados pessoais, previstas em rol taxativo do artigo 7º da LGPD." >Base legal:</label>
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
                <!-- RESPONSÁVEL INTERNO = TEXT BOX -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="responsvel_interno" class="col-md-2 col-form-label" data-toggle="tooltip" title="Responsável pelo processo dentro da empresa.">Responsável Interno:</label>
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
                <div class="col-md-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("admin.processos.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection