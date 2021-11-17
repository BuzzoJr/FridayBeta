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

class AtivosRequest extends FormRequest
{
    public function rules()
    {
        return [
            "id_ativo"=>[
				"string",
				"nullable"
			],
			"ativo"=>[
				"string",
				"nullable"
			],
			"descrio_ativo"=>[
				"string",
				"nullable"
			],
			"tipo_do_ativo"=>[
				"string",
				"nullable"
			],
			"linkip"=>[
				"string",
				"nullable"
			],
			"formato_do_ativo"=>[
				"string",
				"nullable"
			],
			"responsvel_pelo_ativo"=>[
				"string",
				"nullable"
			],
			"tipo_de_armazenamento"=>[
				"string",
				"nullable"
			],
			"formato_de_armazenamento"=>[
				"string",
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
			"localizao_fsica_ativos"=>[
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
			"trfego_de_rede"=>[
				"string",
				"nullable"
			],
			"autenticao"=>[
				"string",
				"nullable"
			],
			"criptografia_no_armazenamento"=>[
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
			"ativo_primrio_ou_secundrio"=>[
				"string",
				"nullable"
			],
			"id_primrio"=>[
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
            "id_ativo"=>"ID",
			"ativo"=>"Ativo",
			"descrio_ativo"=>"Descrição",
			"tipo_do_ativo"=>"Tipo do Ativo",
			"linkip"=>"Link/IP",
			"formato_do_ativo"=>"Formato do Ativo",
			"responsvel_pelo_ativo"=>"Responsável pelo Ativo",
			"tipo_de_armazenamento"=>"Tipo de Armazenamento",
			"formato_de_armazenamento"=>"Formato de Armazenamento",
			"nome_do_sistema_de_armazenamento"=>"Nome do Sistema de Armazenamento",
			"matriz_ou_filial"=>"Matriz ou Filial",
			"departamento"=>"Departamento",
			"id_do_terceiro"=>"ID do Terceiro",
			"nome_do_terceiro"=>"Nome do Terceiro",
			"localizao_fsica_ativos"=>"Localização Física",
			"dados_pessoais_coletados"=>"Dados Pessoais Coletados",
			"volume_de_dados_pessoais"=>"Volume de Dados Pessoais",
			"trfego_de_rede"=>"Tráfego de Rede",
			"autenticao"=>"Autenticação",
			"autenticao1"=>"Autenticação",
			"criptografia_no_armazenamento"=>"Criptografia no Armazenamento",
			"finalidade"=>"Finalidade",
			"forma_de_coleta"=>"Forma de Coleta",
			"categoria_de_dados"=>"Categoria de Dados",
			"titular_de_dados"=>"Titular de Dados",
			"categoria_do_titular"=>"Categoria do Titular",
			"prazo_de_reteno"=>"Prazo de Retenção",
			"base_legal"=>"Base Legal",
			"ativo_primrio_ou_secundrio"=>"Ativo Primário ou Secundário",
			"id_primrio"=>"ID Primário",
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