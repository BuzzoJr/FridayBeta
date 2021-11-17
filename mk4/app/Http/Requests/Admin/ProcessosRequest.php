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

class ProcessosRequest extends FormRequest
{
    public function rules()
    {
        return [
            "id_processo"=>[
				"string",
				"nullable"
			],
			"processo"=>[
				"string",
				"nullable"
			],
			"descrio"=>[
				"string",
				"nullable"
			],
			"responsvel_pelo_processo"=>[
				"string",
				"nullable"
			],
			"forma_de_coleta_dos_dados"=>[
				"string",
				"nullable"
			],
			"id_da_coleta"=>[
				"string",
				"nullable"
			],
			"id_de_armazenamento"=>[
				"string",
				"nullable"
			],
			"tipo_de_armazenamento"=>[
				"array",
				"nullable"
			],
			"nome_do_sistema_de_armazenamento"=>[
				"string",
				"nullable"
			],
			"matriz_ou_filial"=>[
				"string",
				"nullable"
			],
			"departamento"=>[
				"string",
				"nullable"
			],
			"id_do_terceiro"=>[
				"string",
				"nullable"
			],
			"nome_do_terceiro"=>[
				"string",
				"nullable"
			],
			"localizao_fsica"=>[
				"string",
				"nullable"
			],
			"dados_pessoais_coletados"=>[
				"string",
				"nullable"
			],
			"volume_de_dados_pessoais"=>[
				"string",
				"nullable"
			],
			"tratamentos_realizados"=>[
				"array",
				"nullable"
			],
			"departamentos_com_acesso_aos_dados"=>[
				"string",
				"nullable"
			],
			"finalidade"=>[
				"string",
				"nullable"
			],
			"categoria_de_dados"=>[
				"array",
				"nullable"
			],
			"titular_de_dados"=>[
				"string",
				"nullable"
			],
			"categoria_do_titular"=>[
				"array",
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
			"responsvel_interno"=>[
				"string",
				"nullable"
			]
        ];
    }
    public function attributes()
    {
        return [
            "id_processo"=>"ID",
			"processo"=>"Processo",
			"descrio"=>"Descrição",
			"responsvel_pelo_processo"=>"Responsável pelo Processo",
			"forma_de_coleta_dos_dados"=>"Forma de Coleta dos Dados",
			"id_da_coleta"=>"ID da Coleta",
			"tipo_de_armazenamento"=>"Tipo de Armazenamento",
			"nome_do_sistema_de_armazenamento"=>"Nome do Sistema de Armazenamento",
			"matriz_ou_filial"=>"Matriz ou Filial",
			"departamento"=>"Departamento",
			"id_do_terceiro"=>"ID do Terceiro",
			"nome_do_terceiro"=>"Nome do Terceiro",
			"localizao_fsica"=>"Localização Física",
			"dados_pessoais_coletados"=>"Dados Pessoais Coletados",
			"volume_de_dados_pessoais"=>"Volume de Dados Pessoais",
			"tratamentos_realizados"=>"Tratamento(s) Realizado(s)",
			"departamentos_com_acesso_aos_dados"=>"Departamento(s) com Acesso aos Dados",
			"finalidade"=>"Finalidade",
			"categoria_de_dados"=>"Categoria de Dados",
			"titular_de_dados"=>"Titular de Dados",
			"categoria_do_titular"=>"Categoria do Titular",
			"prazo_de_reteno"=>"Prazo de Retenção",
			"base_legal"=>"Base Legal",
			"responsvel_interno"=>"Responsável Interno"
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