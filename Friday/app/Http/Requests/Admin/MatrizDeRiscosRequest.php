<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2120
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Requests\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Response;

class MatrizDeRiscosRequest extends FormRequest
{
    public function rules()
    {
        return [
            "id_col"=>[
				"string",
				"nullable"
			],
			"id_no_data_mapping"=>[
				"string",
				"nullable"
			],
			"nome_do_ativo_ou_processo"=>[
				"string",
				"nullable"
			],
			"descrio"=>[
				"string",
				"nullable"
			],
			"departamento"=>[
				"string",
				"nullable"
			],
			"terceiro"=>[
				"string",
				"nullable"
			],
			"dados_pessoais_coletados"=>[
				"string",
				"nullable"
			],
			"finalidade"=>[
				"string",
				"nullable"
			],
			"categoria_de_dados"=>[
				"string",
				"nullable"
			],
			"titular_de_dados"=>[
				"string",
				"nullable"
			],
			"categoria_do_titular"=>[
				"string",
				"nullable"
			],
			"prazo_de_reteno"=>[
				"string",
				"nullable"
			],
			"base_legal"=>[
				"string",
				"nullable"
			],
			"eventos_de_risco"=>[
				"string",
				"nullable"
			],
			"causas"=>[
				"string",
				"nullable"
			],
			"categoria_de_risco"=>[
				"string",
				"nullable"
			],
			"consequncias"=>[
				"string",
				"nullable"
			],
			"data_de_avaliao_do_risco"=>[
				'date_format:"'.config('admiko_config.table_date_time_format').'"',
				"nullable"
			],
			"probabilidade"=>[
				"string",
				"nullable"
			],
			"impacto"=>[
				"string",
				"nullable"
			],
			"risco_inerente"=>[
				"string",
				"nullable"
			],
			"resposta_ao_risco"=>[
				"string",
				"nullable"
			],
			"planos_de_ao_para_implementao_de_controles"=>[
				"string",
				"nullable"
			],
			"fundamentao"=>[
				"string",
				"nullable"
			],
			"status_do_plano_de_ao"=>[
				"string",
				"nullable"
			],
			"gestor_responsvel"=>[
				"string",
				"nullable"
			],
			"data_de_incio"=>[
				'date_format:"'.config('admiko_config.table_date_time_format').'"',
				"nullable"
			],
			"data_de_limite"=>[
				'date_format:"'.config('admiko_config.table_date_time_format').'"',
				"nullable"
			],
			"efetividade"=>[
				"string",
				"nullable"
			],
			"fora"=>[
				"string",
				"nullable"
			],
			"objetivo_do_risco"=>[
				"string",
				"nullable"
			],
			"data_de_avaliao_residual"=>[
				'date_format:"'.config('admiko_config.table_date_time_format').'"',
				"nullable"
			],
			"probabilidade_residual"=>[
				"string",
				"nullable"
			],
			"impacto_residual"=>[
				"string",
				"nullable"
			],
			"risco_residual"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "id_col"=>"ID",
			"id_no_data_mapping"=>"ID no Data Mapping",
			"nome_do_ativo_ou_processo"=>"Nome do Ativo ou Processo",
			"descrio"=>"Descrição",
			"departamento"=>"Departamento",
			"terceiro"=>"Terceiro",
			"dados_pessoais_coletados"=>"Dados Pessoais Coletados",
			"finalidade"=>"Finalidade",
			"categoria_de_dados"=>"Categoria de Dados",
			"titular_de_dados"=>"Titular de Dados",
			"categoria_do_titular"=>"Categoria do Titular",
			"prazo_de_reteno"=>"Prazo de Retenção",
			"base_legal"=>"Base Legal",
			"eventos_de_risco"=>"Eventos de Risco",
			"causas"=>"Causas",
			"categoria_de_risco"=>"Categoria de Risco",
			"consequncias"=>"Consequências",
			"data_de_avaliao_do_risco"=>"Data de Avaliação do Risco",
			"probabilidade"=>"Probabilidade",
			"impacto"=>"Impacto",
			"risco_inerente"=>"Risco Inerente",
			"resposta_ao_risco"=>"Resposta ao Risco",
			"planos_de_ao_para_implementao_de_controles"=>"Planos de Ação para Implementação de Controles",
			"fundamentao"=>"Fundamentação",
			"status_do_plano_de_ao"=>"Status do Plano de Ação",
			"gestor_responsvel"=>"Gestor Responsável",
			"data_de_incio"=>"Data de Início",
			"data_de_limite"=>"Data de Limite",
			"efetividade"=>"Efetividade",
			"fora"=>"Força",
			"objetivo_do_risco"=>"Objetivo do Risco",
			"data_de_avaliao_residual"=>"Data de Avaliação Residual",
			"probabilidade_residual"=>"Probabilidade Residual",
			"impacto_residual"=>"Impacto Residual",
			"risco_residual"=>"Risco Residual"
        ];
    }
    
    public function authorize()
    {
        if (!auth("admin")->check()) {
            return false;
        }
        return true;
    }
}