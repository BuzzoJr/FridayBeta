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

class Ativos extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,AdmikoMultiTenantModeTrait;

    public $table = 'ativos';
    
    const TIPOATIVO_CONS = ["Documento"=>"Documento","Aplicação"=>"Aplicação","Banco de Dados"=>"Banco","Site"=>"Site","Hardware"=>"Hardware"];
	const FORMATO_ATIVO_CONS = ["Físico"=>"Físico","Digital"=>"Digital","Físico e Digital"=>"Físico e Digital","Não aplicável"=>"Não aplicável"];
	const RESPONSÁVEL_ATIVO_CONS = ["Interno"=>"Interno","Terceiro"=>"Terceiro"];
	const TIPO_ARMAZENA_CONS = ["Interno"=>"Interno","Nuvem"=>"Nuvem","Terceiro"=>"Terceiro"];
	const FORMATO_ARMAZENA_CONS = ["Físico"=>"Físico","Depósito de Arquivos"=>"Depósito de Arquivos","Banco de Dados"=>"Banco de Dados","Servidor FTP"=>"Servidor FTP","Unidade Compartilhada"=>"Unidade Compartilhada"];
	const VOLUME_DADOS_CONS = ["Não Aplicável"=>"Não Aplicável","0 - 1.000"=>"0 - 1.000","1.000 - 10.000"=>"1.000 - 10.000","10.000 - 100.000"=>"10.000 - 100.000","100.000 - 1M"=>"100.000 - 1M","1M - 10M"=>"1M - 10M","> 10M"=>"> 10M"];
	const TRAFEGO_REDE_CONS = ["Não Aplicável"=>"Não Aplicável","Criptografado"=>"Criptografado","Opicional"=>"Opicional","Não Criptografado"=>"Não Criptografado","Local"=>"Local"];
	const CRIPTOGRAFIA_ARMAZENA_CONS = ["Não Aplicável"=>"Não Aplicável","Sim"=>"Sim","Não"=>"Não","Não Sei"=>"Não Sei","Terceiro"=>"Terceiro"];
	const TITULAR_DE_DADOS_CONS = ["Identificado"=>"Identificado","Identificável"=>"Identificável","Não identificad"=>"Não identificado","Não aplicável"=>"Não aplicável"];
	const BASE_LEGAL_CONS = ["Consentimento"=>"Consentimento","Interesse Legítimo do Controlador/Terceiro"=>"Interesse Legítimo do Controlador/Terceiro","Cumprimento de Obrigação Legal"=>"Cumprimento de Obrigação Legal","Execução de Políticas Públicas"=>"Execução de Políticas Públicas","Execução de contrato/ Diligências Pré-Contratuais"=>"Execução de contrato/ Diligências Pré-Contratuais","Estudos por Órgão de Pesquisa"=>"Estudos por Órgão de Pesquisa","Exercício Regular de Direitos"=>"Exercício Regular de Direitos","Proteção da Vida"=>"Proteção da Vida","Tutela da Saúde"=>"Tutela da Saúde","Proteção ao Crédito"=>"Proteção ao Crédito","Prevenção à Fraude e à Segurança do Titular"=>"Prevenção à Fraude e à Segurança do Titular","Não aplicável"=>"Não aplicável"];
	const ATIVO_PRIMARIOSECUNDARIO_CONS = ["Primário"=>"Primário","Secundário"=>"Secundário"];

	/* MULTISELECT */
    const CATEGORIA_DE_DADOS_CONS = ["Pessoais"=>"Pessoais","Sensíveis"=>"Sensíveis","Anonimizados"=>"Anonimizados","Criança"=>"Criança","Adolescente"=>"Adolescente"];
	const CATEGORIA_DO_TITULAR_CONS = ["Cliente"=>"Cliente","Colaborador"=>"Colaborador","Dcolaborador do Colaborador"=>"Dependente do Colaborador","Fornecedor"=>"Fornecedor","Candidato"=>"Candidato","Terceiro"=>"Terceiro","Visitante"=>"Visitante","Não aplicável"=>"Não aplicável"];



    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"id_ativo",
		"ativo",
		"descrio_ativo",
		"tipo_do_ativo",
		"linkip",
		"formato_do_ativo",
		"responsvel_pelo_ativo",
		"tipo_de_armazenamento",
		"formato_de_armazenamento",
		"nome_do_sistema_de_armazenamento",
		"matriz_ou_filial",
		"departamento",
		"id_do_terceiro",
		"nome_do_terceiro",
		"localizao_fsica_ativos",
		"dados_pessoais_coletados",
		"volume_de_dados_pessoais",
		"trfego_de_rede",
		"autenticao",
		"criptografia_no_armazenamento",
		"finalidade",
		"categoria_de_dados",
		"titular_de_dados",
		"categoria_do_titular",
		"prazo_de_reteno",
		"base_legal",
		"ativo_primrio_ou_secundrio",
		"id_primrio",
		"responsvel_interno",
    ];
    
}