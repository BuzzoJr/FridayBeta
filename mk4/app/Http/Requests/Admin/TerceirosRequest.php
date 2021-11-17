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

class TerceirosRequest extends FormRequest
{
    public function rules()
    {
        return [
            "id_terceiros"=>[
				"string",
				"nullable"
			],
			"nome_do_terceiro"=>[
				"string",
				"nullable"
			],
			"descrio"=>[
				"string",
				"nullable"
			],
			"localizao_fsica_terceiro"=>[
				"string",
				"nullable"
			],
			"id_do_ativo"=>[
				"string",
				"nullable"
			],
			"ativo_sistemadocumento"=>[
				"string",
				"nullable"
			],
			"responsvel_interno_pelo_ativo"=>[
				"string",
				"nullable"
			],
			"tipo_de_servio_prestado"=>[
				"string",
				"nullable"
			],
			"status"=>[
				"string",
				"nullable"
			],
			"importncia"=>[
				"string",
				"nullable"
			],
			"site_terceiro"=>[
				"string",
				"nullable"
			],
			"cnpj_terceiro"=>[
				"string",
				"nullable"
			],
			"nome_contato_terceiro"=>[
				"string",
				"nullable"
			],
			"email_contato_terceiro"=>[
				"string",
				"nullable"
			],
			"telefone_de_contato_do_terceiro"=>[
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
            "id_terceiros"=>"ID",
			"nome_do_terceiro"=>"Nome do Terceiro",
			"descrio"=>"Descrição",
			"localizao_fsica_terceiro"=>"Localização Física",
			"id_do_ativo"=>"ID do Ativo",
			"ativo_sistemadocumento"=>"Ativo (Sistema/Documento)",
			"responsvel_interno_pelo_ativo"=>"Responsável Interno pelo Ativo",
			"tipo_de_servio_prestado"=>"Tipo de Serviço Prestado",
			"status"=>"Status",
			"importncia"=>"Importância",
			"site_terceiro"=>"Site do Terceiro",
			"cnpj_terceiro"=>"CNPJ do Terceiro",
			"nome_contato_terceiro"=>"Nome de contato do Terceiro",
			"email_contato_terceiro"=>"E-mail de contato do Terceiro",
			"telefone_de_contato_do_terceiro"=>"Telefone de contato do Terceiro",
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