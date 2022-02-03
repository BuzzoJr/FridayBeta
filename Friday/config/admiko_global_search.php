<?php
/** Admiko global search configuration**/

/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2120
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */

/**IMPORTANT: this page will be overwritten and any change will be lost!!
 ** use admiko_global_search_custom.php to add your models into global search!!
 **/
return [
    [
        'name' => 'Processos',
        'route_id' => 'processos',
        'model' => 'Processos',
        'fields' => [
            ["field"=>"id_processo","show"=>1],
			["field"=>"processo","show"=>1],
			["field"=>"descrio","show"=>1],
			["field"=>"responsvel_pelo_processo","show"=>1],
			["field"=>"forma_de_coleta_dos_dados","show"=>1],
			["field"=>"id_da_coleta","show"=>1],
			["field"=>"tipo_de_armazenamento","show"=>1],
			["field"=>"nome_do_sistema_de_armazenamento","show"=>1],
			["field"=>"matriz_ou_filial","show"=>1],
			["field"=>"departamento","show"=>1],
			["field"=>"id_do_terceiro","show"=>1],
			["field"=>"nome_do_terceiro","show"=>1],
			["field"=>"localizao_fsica","show"=>1],
			["field"=>"dados_pessoais_coletados","show"=>1],
			["field"=>"volume_de_dados_pessoais","show"=>1],
			["field"=>"tratamentos_realizados","show"=>1],
			["field"=>"departamentos_com_acesso_aos_dados","show"=>1],
			["field"=>"finalidade","show"=>1],
			["field"=>"categoria_de_dados","show"=>1],
			["field"=>"titular_de_dados","show"=>1],
			["field"=>"categoria_do_titular","show"=>1],
			["field"=>"prazo_de_reteno","show"=>1],
			["field"=>"base_legal","show"=>1],
			["field"=>"responsvel_interno","show"=>1]
        ]
    ],
    [
        'name' => 'Terceiros',
        'route_id' => 'terceiros',
        'model' => 'Terceiros',
        'fields' => [
            ["field"=>"id_terceiros","show"=>1],
			["field"=>"nome_do_terceiro","show"=>1],
			["field"=>"descrio","show"=>1],
			["field"=>"localizao_fsica_terceiro","show"=>1],
			["field"=>"id_do_ativo","show"=>1],
			["field"=>"ativo_sistemadocumento","show"=>1],
			["field"=>"responsvel_interno_pelo_ativo","show"=>1],
			["field"=>"tipo_de_servio_prestado","show"=>1],
			["field"=>"status","show"=>1],
			["field"=>"importncia","show"=>1],
			["field"=>"site_terceiro","show"=>1],
			["field"=>"cnpj_terceiro","show"=>1],
			["field"=>"nome_contato_terceiro","show"=>1],
			["field"=>"email_contato_terceiro","show"=>1],
			["field"=>"telefone_de_contato_do_terceiro","show"=>1],
			["field"=>"responsvel_interno","show"=>1]
        ]
    ],
    [
        'name' => 'Matriz de Riscos',
        'route_id' => 'matriz_de_riscos',
        'model' => 'MatrizDeRiscos',
        'fields' => [
            ["field"=>"id_col","show"=>1],
			["field"=>"id_no_data_mapping","show"=>1],
			["field"=>"nome_do_ativo_ou_processo","show"=>1],
			["field"=>"descrio","show"=>1],
			["field"=>"departamento","show"=>1],
			["field"=>"terceiro","show"=>1],
			["field"=>"dados_pessoais_coletados","show"=>1],
			["field"=>"finalidade","show"=>1],
			["field"=>"categoria_de_dados","show"=>1],
			["field"=>"titular_de_dados","show"=>1],
			["field"=>"categoria_do_titular","show"=>1],
			["field"=>"prazo_de_reteno","show"=>1],
			["field"=>"base_legal","show"=>1],
			["field"=>"eventos_de_risco","show"=>1],
			["field"=>"causas","show"=>1],
			["field"=>"categoria_de_risco","show"=>1],
			["field"=>"consequncias","show"=>1],
			["field"=>"data_de_avaliao_do_risco","show"=>1],
			["field"=>"probabilidade","show"=>1],
			["field"=>"impacto","show"=>1],
			["field"=>"risco_inerente","show"=>1],
			["field"=>"resposta_ao_risco","show"=>1],
			["field"=>"planos_de_ao_para_implementao_de_controles","show"=>1],
			["field"=>"fundamentao","show"=>1],
			["field"=>"status_do_plano_de_ao","show"=>1],
			["field"=>"gestor_responsvel","show"=>1],
			["field"=>"data_de_incio","show"=>1],
			["field"=>"data_de_limite","show"=>1],
			["field"=>"efetividade","show"=>1],
			["field"=>"fora","show"=>1],
			["field"=>"objetivo_do_risco","show"=>1],
			["field"=>"data_de_avaliao_residual","show"=>1],
			["field"=>"probabilidade_residual","show"=>1],
			["field"=>"impacto_residual","show"=>1],
			["field"=>"risco_residual","show"=>1]
        ]
    ],
];
