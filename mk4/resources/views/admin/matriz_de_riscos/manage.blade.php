@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.matriz_de_riscos.index") }}">Matriz de Riscos</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Matriz de Riscos</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.matriz_de_riscos.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage matriz_de_riscos_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" autocomplete="off" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="id_col" class="col-md-2 col-form-label">ID:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="id_col" name="id_col"  placeholder="ID"  value="{{{ old('id_col', isset($data)?$data->id_col : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('id_col')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="id_col_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- ID DA DM = ONE SELECT AUTOMÁTICO -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="id_no_data_mapping" class="col-md-2 col-form-label" data-toggle="tooltip" title="Número de identificação do processo ou ativo analisado" >ID no Data Mapping:*</label>                 
                        <div class="col-md-10">
                            <select class="form-select" id="id_no_data_mapping" name="id_no_data_mapping" onchange="cascadeselectid()">
                                
                                @foreach($matriz_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('id_no_data_mapping') ? old('id_no_data_mapping') : $data->id_no_data_mapping ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('id_no_data_mapping')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="id_no_data_mapping_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- NOME DO ATIVO OU PROCESSO = AUTOFILL SELECT -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="nome_do_ativo_ou_processo" class="col-md-2 col-form-label" data-toggle="tooltip" title="Nome do processo ou ativo analisado" >Nome do Ativo ou Processo:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="nome_do_ativo_ou_processo" name="nome_do_ativo_ou_processo" >
                                
                                @foreach($matriz_nome as $id => $value)
                                    <option value="{{ $id }}" {{ (old('nome_do_ativo_ou_processo') ? old('nome_do_ativo_ou_processo') : $data->nome_do_ativo_ou_processo ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('nome_do_ativo_ou_processo')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="nome_do_ativo_ou_processo_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- DESCRIÇÃO = AUTOFILL SELECT -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="descrio" class="col-md-2 col-form-label" data-toggle="tooltip" title="Descrição do processo ou ativo para auxiliar a identificação" >Descrição:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="descrio" name="descrio">
                                
                                @foreach($matriz_descr as $id => $value)
                                    <option value="{{ $id }}" {{ (old('descrio') ? old('descrio') : $data->descrio ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('descrio')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="descrio_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- DEPARTAMENTO = AUTOFILL SELECT -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="departamento" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja interno, indicação da área/departamento da empresa relacionado ao armazenamento do processo ou ativo analisado." >Departamento:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="departamento" name="departamento">
                                
                                @foreach($matriz_depart as $id => $value)
                                    <option value="{{ $id }}" {{ (old('departamento') ? old('departamento') : $data->departamento ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('departamento')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="departamento_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- TERCEIRO = AUTOFILL SELECT -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="terceiro" class="col-md-2 col-form-label" data-toggle="tooltip" title="Caso o armazenamento seja realizado em terceiro, indicação do nome do terceiro contratado." >Terceiro:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="terceiro" name="terceiro">
                                
                                @foreach($matriz_terceiro as $id => $value)
                                    <option value="{{ $id }}" {{ (old('terceiro') ? old('terceiro') : $data->terceiro ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('terceiro')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="terceiro_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- DADOS PESSOAIS COLETADOS = AUTOFILL SELECT -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="dados_pessoais_coletados" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação de quais dados pessoais são coletados." >Dados Pessoais Coletados:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="dados_pessoais_coletados" name="dados_pessoais_coletados">
                                
                                @foreach($matriz_dadoscolet as $id => $value)
                                    <option value="{{ $id }}" {{ (old('dados_pessoais_coletados') ? old('dados_pessoais_coletados') : $data->dados_pessoais_coletados ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('dados_pessoais_coletados')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="dados_pessoais_coletados_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- FINALIDADE = AUTOFILL SELECT -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="finalidade" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação sobre a finalidade da coleta e tratamento dos dados pessoais em relação ao processo analisado." >Finalidade:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="finalidade" name="finalidade">
                                
                                @foreach($matriz_finalidade as $id => $value)
                                    <option value="{{ $id }}" {{ (old('finalidade') ? old('finalidade') : $data->finalidade ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('finalidade')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="finalidade_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CATEGORIA DE DADOS = AUTOFILL SELECT -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="categoria_de_dados" class="col-md-2 col-form-label" data-toggle="tooltip" title="Categoria dos dados analisados." >Categoria de Dados:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="categoria_de_dados" name="categoria_de_dados">
                                
                                @foreach($matriz_catdados as $id => $value)
                                    <option value="{{ $id }}" {{ (old('categoria_de_dados') ? old('categoria_de_dados') : $data->categoria_de_dados ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('categoria_de_dados')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="categoria_de_dados_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- TITULAR DE DADOS = AUTOFILL SELECT -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="titular_de_dados" class="col-md-2 col-form-label" data-toggle="tooltip" title="Pessoa natural a quem se referem os dados pessoais que são objeto de tratamento." >Titular de Dados:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="titular_de_dados" name="titular_de_dados">
                                
                                @foreach($matriz_titulardados as $id => $value)
                                    <option value="{{ $id }}" {{ (old('titular_de_dados') ? old('titular_de_dados') : $data->titular_de_dados ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('titular_de_dados')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="titular_de_dados_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CATEGORIA DO TITULAR = AUTOFILL SELECT -->
                 <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="categoria_do_titular" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação do vínculo entre titular e empresa." >Categoria do Titular:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="categoria_do_titular" name="categoria_do_titular">
                                
                                @foreach($matriz_cattitu as $id => $value)
                                    <option value="{{ $id }}" {{ (old('categoria_do_titular') ? old('categoria_do_titular') : $data->categoria_do_titular ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('categoria_do_titular')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="categoria_do_titular_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- PRAZO DE RETENÇÃO = AUTOFILL SELECT -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="prazo_de_reteno" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação do prazo de manutenção dos dados em relação ao processo analisado." >Prazo de Retenção:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="prazo_de_reteno" name="prazo_de_reteno">
                                
                                @foreach($matriz_prazoderete as $id => $value)
                                    <option value="{{ $id }}" {{ (old('prazo_de_reteno') ? old('prazo_de_reteno') : $data->prazo_de_reteno ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('prazo_de_reteno')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="prazo_de_reteno_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- BASE LEGAL = AUTOFILL SELECT -->
                <div class=" col-12">
                    <div class="form-group row">                   
                        <label for="base_legal" class="col-md-2 col-form-label" data-toggle="tooltip" title="Bases legais para o tratamento de dados pessoais, previstas em rol taxativo do artigo 7º da LGPD." >Base Legal:*</label>                 
                        <div class="col-md-10">
                            <select readonly="readonly" class="form-select" id="base_legal" name="base_legal">
                                
                                @foreach($matriz_baselegal as $id => $value)
                                    <option value="{{ $id }}" {{ (old('base_legal') ? old('base_legal') : $data->base_legal ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
    
                            </select>
                            <div class="invalid-feedback @if ($errors->has('base_legal')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="base_legal_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row admiko_separator">
                        <label class="col-12 col-form-label">Avaliação e Classificação do Risco (Risk Assessment)</label>
                    </div>
                </div>
                <!-- Select evento de risco -->
                @if(isset($eventoriscojs))
                @foreach($eventoriscojs as $file)
                <div class="form-group row">   
                    <label class="col-sm-2 col-form-label"><b>Selecionar Evento de Risco</b></label>                                                                                                     
                    <select class="col-sm-10" name="risk" id="risk" onchange="getNumber()"></select>
                </div>
                @endforeach 
                @endif
                <!-- EVENTO DE RISCO = TEXT BOX CASCADE POPULATE -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="eventos_de_risco" class="col-md-2 col-form-label" data-toggle="tooltip" title="Evento que existe a probabilidade de acontecer e gerar determinado impacto que cause prejuízos as atividades e objetivos da empresa.">Eventos de Risco:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="eventos_de_risco" name="eventos_de_risco"  placeholder="Eventos de Risco"  value="{{{ old('eventos_de_risco', isset($data)?$data->eventos_de_risco : '') }}}"></textarea>
                            <div class="invalid-feedback @if ($errors->has('eventos_de_risco')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="eventos_de_risco_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CAUSAS = TEXT BOX CASCADE POPULATE -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="causas" class="col-md-2 col-form-label" data-toggle="tooltip" title="Causas que podem provocar o evento de risco.">Causas:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="causas" name="causas"  placeholder="Causas"  value="{{{ old('causas', isset($data)?$data->causas : '') }}}"></textarea>
                            <div class="invalid-feedback @if ($errors->has('causas')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="causas_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CATEGORIA DO RISCO = ONE SELECT CASCADE POPULATE -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="categoria_de_risco" class="col-md-2 col-form-label" data-toggle="tooltip" title="Categorização do evento de risco. Pode ser: a) Privacidade; b) Segurança Digital; c) Segurança Física; d) Financeiro; e) Geográfico; f) Operacional; g) Compliance; h) Reputacional; i) Estratégico, j) Institucional.">Categoria de Risco:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="categoria_de_risco" name="categoria_de_risco"  placeholder="Categoria de Risco"  value="{{{ old('categoria_de_risco', isset($data)?$data->categoria_de_risco : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('categoria_de_risco')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="categoria_de_risco_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CONSEQUENCIAS = TEXT BOX CASCADE POPULATE -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="consequncias" class="col-md-2 col-form-label" data-toggle="tooltip" title="Descrição dos principais impactos ocasionados caso haja a materialização do risco. Serve de suporte para entender a graduação do impacto indicada.">Consequências:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="consequncias" name="consequncias"  placeholder="Consequências"  value="{{{ old('consequncias', isset($data)?$data->consequncias : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('consequncias')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="consequncias_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- CAUSAS = DATA ATUAL POPULATE -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="data_de_avaliao_do_risco" class="col-md-2 col-form-label" data-toggle="tooltip" title="Data em que o risco foi avaliado">Data de Avaliação do Risco:</label>
                        <div class="col-md-10">
                            <div class="input-group" id="dateTimePicker_data_de_avaliao_do_risco" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('admiko_config.form_date_time_format')}}"
                                       class="form-control datetimepicker-input dateTimePicker"
                                       data-target="#dateTimePicker_data_de_avaliao_do_risco"  id="data_de_avaliao_do_risco" data-toggle="datetimepicker"
                                       placeholder="Data de Avaliação do Risco" name="data_de_avaliao_do_risco" value="{{{ old('data_de_avaliao_do_risco', isset($data)?$data->data_de_avaliao_do_risco : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#dateTimePicker_data_de_avaliao_do_risco" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('data_de_avaliao_do_risco')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="data_de_avaliao_do_risco_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- PROBABILIDADE = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="probabilidade" class="col-md-2 col-form-label" data-toggle="tooltip" data-html="true" title="5)Muito Alto: acima de 90% de chances - 4)Alto: de 50,1% a 90% de chances - 3)Médio: de 30,1% a 50% de chances - 2)Baixo: de 5,1% a 30% de chances - 1)Muito Baixo: até 5% de chances">Probabilidade:</label>
                        <div class="col-md-10">
                            <select class="DropChange" id="probabilidade" name="probabilidade" required="true">
                                @foreach($probabilidade_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('probabilidade') ? old('probabilidade') : $data->probabilidade ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('probabilidade')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="probabilidade_help" class="text-muted"></small>
                        </div>
                    </div>
                </div> 
                <!-- IMPACTO = ONE SELECT -->
                <div class=" col-12">  
                    <div class="form-group row">
                        <label for="impacto" class="col-md-2 col-form-label" data-toggle="tooltip" title="" >Impacto:</label>
                        <div class="col-md-10">
                            <select class="DropChange" id="impacto" name="impacto" required="true">
                                @foreach($impacto_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('impacto') ? old('impacto') : $data->impacto ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('impacto')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="impacto_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- RISCO INERENTE = AUTOMATIZADO -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="risco_inerente" class="col-md-2 col-form-label" data-toggle="tooltip" title="Grau do evento de risco calculado com base em sua probabilidade de ocorrência e o seu impacto.">Risco Inerente:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="risco_inerente" name="risco_inerente"  placeholder="Risco Inerente"  value="{{{ old('risco_inerente', isset($data)?$data->risco_inerente : '') }}}" readonly>
                            <div class="invalid-feedback @if ($errors->has('risco_inerente')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="risco_inerente_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                
                <div class=" col-12">
                    <div class="form-group row admiko_separator">
                        <label class="col-12 col-form-label" data-toggle="tooltip" title="">Tratamento</label>
                    </div>
                </div>
                <!-- RESPOSTA DO RISCO = ONE SELECT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="resposta_ao_risco" class="col-md-2 col-form-label" data-toggle="tooltip" title="Refere-se à resposta da empresa para cada risco identificado." >Resposta ao Risco:*</label>
                        <div class="col-md-10">
                            <select class="form-select" id="resposta_ao_risco" name="resposta_ao_risco" required="true">
                                                
                                @foreach($resposta_all as $id => $value)
                                <option value="{{ $id }}" {{ (old('resposta_ao_risco') ? old('resposta_ao_risco') : $data->resposta_ao_risco ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                
                            </select>
                            <div class="invalid-feedback @if ($errors->has('resposta_ao_risco')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="resposta_ao_risco_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row admiko_separator">
                        <label class="col-12 col-form-label" >Controles e Planos de Ação</label>
                    </div>
                </div>
                <!-- PLANO DE AÇÃO = TEXT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="planos_de_ao_para_implementao_de_controles" class="col-md-2 col-form-label" data-toggle="tooltip" title="Plano elaborado pela área para mitigar o risco. Pode ser, por exemplo, um projeto em andamento ou uma ação ainda não iniciada. Todo risco precisa de um plano de ação.">Planos de Ação para Implementação de Controles:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="planos_de_ao_para_implementao_de_controles" name="planos_de_ao_para_implementao_de_controles"  placeholder="Planos de Ação para Implementação de Controles"  value="{{{ old('planos_de_ao_para_implementao_de_controles', isset($data)?$data->planos_de_ao_para_implementao_de_controles : '') }}}" style="height:100px"></textarea>
                            <div class="invalid-feedback @if ($errors->has('planos_de_ao_para_implementao_de_controles')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="planos_de_ao_para_implementao_de_controles_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- FUNDAMENTAÇÃO = TEXT -->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="fundamentao" class="col-md-2 col-form-label" data-toggle="tooltip" title="">Fundamentação:</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="fundamentao" name="fundamentao"  placeholder="Fundamentação"  value="{{{ old('fundamentao', isset($data)?$data->fundamentao : '') }}}" style="height:100px"></textarea>
                            <div class="invalid-feedback @if ($errors->has('fundamentao')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="fundamentao_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- MANTER COMO ESTÁ DAQUI PARA BAIXO POR ENQUANTO (?)-->
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="status_do_plano_de_ao" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação do status do plano de ação">Status do Plano de Ação:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="status_do_plano_de_ao" name="status_do_plano_de_ao"  placeholder="Status do Plano de Ação"  value="{{{ old('status_do_plano_de_ao', isset($data)?$data->status_do_plano_de_ao : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('status_do_plano_de_ao')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="status_do_plano_de_ao_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="gestor_responsvel" class="col-md-2 col-form-label" data-toggle="tooltip" title="Refere-se ao gestor responsável pelo plano de ação. Normalmente é o risk owner da matriz, mas pode ter mais de um gestor se tratar-se de um plano de ação compartilhado.">Gestor Responsável:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="gestor_responsvel" name="gestor_responsvel"  placeholder="Gestor Responsável"  value="{{{ old('gestor_responsvel', isset($data)?$data->gestor_responsvel : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('gestor_responsvel')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="gestor_responsvel_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="data_de_incio" class="col-md-2 col-form-label" data-toggle="tooltip" title="Data definida pela área para a implantação do plano.">Data de Início:</label>
                        <div class="col-md-10">
                            <div class="input-group" id="dateTimePicker_data_de_incio" data-target-input="nearest" >
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset; "
                                       data-date_time_format="{{config('admiko_config.form_date_time_format')}}"
                                       class="form-control datetimepicker-input dateTimePicker"
                                       data-target="#dateTimePicker_data_de_incio"  id="data_de_incio" data-toggle="datetimepicker"
                                       placeholder="Data de Início" name="data_de_incio" value="{{{ old('data_de_incio', isset($data)?$data->data_de_incio : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#dateTimePicker_data_de_incio" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('data_de_incio')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="data_de_incio_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="data_de_limite" class="col-md-2 col-form-label" data-toggle="tooltip" title="Data definida pela área para a implantação do plano.">Data de Limite:</label>
                        <div class="col-md-10">
                            <div class="input-group" id="dateTimePicker_data_de_limite" data-target-input="nearest">
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset; "
                                       data-date_time_format="{{config('admiko_config.form_date_time_format')}}"
                                       class="form-control datetimepicker-input dateTimePicker"
                                       data-target="#dateTimePicker_data_de_limite"  id="data_de_limite" data-toggle="datetimepicker"
                                       placeholder="Data de Limite" name="data_de_limite" value="{{{ old('data_de_limite', isset($data)?$data->data_de_limite : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#dateTimePicker_data_de_limite" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('data_de_limite')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="data_de_limite_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="efetividade" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação se o plano de ação foi efetivo ou não.">Efetividade:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="efetividade" name="efetividade"  placeholder="Efetivo - Não efetivo"  value="{{{ old('efetividade', isset($data)?$data->efetividade : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('efetividade')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="efetividade_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="fora" class="col-md-2 col-form-label" data-toggle="tooltip" title="Indicação da força do plano de ação aplicado">Força:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="fora" name="fora"  placeholder="Fraco - Médio - Forte"  value="{{{ old('fora', isset($data)?$data->fora : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('fora')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="fora_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="objetivo_do_risco" class="col-md-2 col-form-label" data-toggle="tooltip" title="Grau do risco que se pretende atingir após a aplicação do plano de ação.">Objetivo do Risco:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="objetivo_do_risco" name="objetivo_do_risco"  placeholder="Objetivo do Risco"  value="{{{ old('objetivo_do_risco', isset($data)?$data->objetivo_do_risco : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('objetivo_do_risco')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="objetivo_do_risco_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row admiko_separator">
                        <label class="col-12 col-form-label">Aferição de Risco Residual</label>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="data_de_avaliao_residual" class="col-md-2 col-form-label" data-toggle="tooltip" title="Data em que o risco foi avaliado">Data de Avaliação Residual:</label>
                        <div class="col-md-10">
                            <div class="input-group" id="dateTimePicker_data_de_avaliao_residual" data-target-input="nearest" >
                                <input type="text" autocomplete="off" style="max-width: 170px;border-right: unset;"
                                       data-date_time_format="{{config('admiko_config.form_date_time_format')}}"
                                       class="form-control datetimepicker-input dateTimePicker"
                                       data-target="#dateTimePicker_data_de_avaliao_residual"  id="data_de_avaliao_residual" data-toggle="datetimepicker"
                                       placeholder="Data de Avaliação Residual" name="data_de_avaliao_residual" value="{{{ old('data_de_avaliao_residual', isset($data)?$data->data_de_avaliao_residual : '') }}}">
                                <div class="input-group-append input-group-text" data-target="#dateTimePicker_data_de_avaliao_residual" data-toggle="datetimepicker">
                                    <i class="fas fa-calendar-alt fa-fw"></i>
                                </div>
                            </div>
                            <div class="invalid-feedback @if ($errors->has('data_de_avaliao_residual')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="data_de_avaliao_residual_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="probabilidade_residual" class="col-md-2 col-form-label" data-toggle="tooltip" title="Escala de probabilidade após a aplicação do plano de ação.">Probabilidade Residual:</label>
                        <div class="col-md-10">
                            <select class="DropChange1" id="probabilidade_residual" name="probabilidade_residual" >
                                @foreach($probabilidade_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('probabilidade_residual') ? old('probabilidade_residual') : $data->probabilidade_residual ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('probabilidade_residual')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="probabilidade_residual_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="impacto_residual" class="col-md-2 col-form-label" data-toggle="tooltip" title="Escala de impacto após a aplicação do plano de ação.">Impacto Residual:</label>
                        <div class="col-md-10">
                            <select class="DropChange1" id="impacto_residual" name="impacto_residual">
                                @foreach($impacto_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('impacto_residual') ? old('impacto_residual') : $data->impacto_residual ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('impacto_residual')) d-block @endif">{{trans('global.required_text')}}</div>
                            <small id="impacto_residual_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="risco_residual" class="col-md-2 col-form-label" data-toggle="tooltip" title="Grau do evento de risco calculado após a aplicação do plano de ação, com base em nova escala de probabilidade e impacto.">Risco Residual:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="risco_residual" name="risco_residual"  placeholder="Risco Residual"  value="{{{ old('risco_residual', isset($data)?$data->risco_residual : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('risco_residual')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="risco_residual_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.matriz_de_riscos.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection