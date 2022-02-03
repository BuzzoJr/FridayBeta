<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2120
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;
use App\Http\Controllers\Traits\Admin\AdmikoAuditableTrait;
use App\Http\Controllers\Traits\Admin\AdmikoMultiTenantModeTrait;

class Terceiros extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,AdmikoMultiTenantModeTrait;

    public $table = 'terceiros';
    
    const TIPO_SERVICO_CONS = ["Consultoria"=>"Consultoria","Operação"=>"Operação","Regulatório"=>"Regulatório","Estratégico"=>"Estratégico","Tecnológico"=>"Tecnológico"];
	const STATUS_CONS = ["Ativo"=>"Ativo","Inativo"=>"Inativo"];
	const IMPORTANCIA_CONS = ["Crítica"=>"Crítica","Alta"=>"Alta","Média"=>"Média","Baixa"=>"Baixa"];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"id_terceiros",
		"nome_do_terceiro",
		"descrio",
		"localizao_fsica_terceiro",
		"id_do_ativo",
		"ativo_sistemadocumento",
		"responsvel_interno_pelo_ativo",
		"tipo_de_servio_prestado",
		"status",
		"importncia",
		"site_terceiro",
		"cnpj_terceiro",
		"nome_contato_terceiro",
		"email_contato_terceiro",
		"telefone_de_contato_do_terceiro",
		"responsvel_interno",
    ];
    
}