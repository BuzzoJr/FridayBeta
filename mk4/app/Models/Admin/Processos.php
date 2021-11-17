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

class Processos extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,AdmikoMultiTenantModeTrait;

    public $table = 'processos';
    
	const RESPONSVEL_CONS = ["Interno"=>"Interno","Terceiro"=>"Terceiro"];
	const FORMA_DE_COLETA_CONS = ["Consulta em Ativo"=>"Consulta em Ativo","Fornecimento pelo Titular"=>"Fornecimento pelo Titular","Fornecimento por Terceiro"=>"Fornecimento por Terceiro"];
	const VOLUME_DADOS_CONS = ["Não Aplicável"=>"Não Aplicável","0 - 1.000"=>"0 - 1.000","1.000 - 10.000"=>"1.000 - 10.000","10.000 - 100.000"=>"10.000 - 100.000","100.000 - 1M"=>"100.000 - 1M","1M - 10M"=>"1M - 10M","> 10M"=>"> 10M"];
	const TITULAR_DE_DADOS_CONS = ["Identificado"=>"Identificado","Identificável"=>"Identificável","Não identificad"=>"Não identificado","Não aplicável"=>"Não aplicável"];
	const BASE_LEGAL_CONS = ["Consentimento"=>"Consentimento","Interesse Legítimo do Controlador/Terceiro"=>"Interesse Legítimo do Controlador/Terceiro","Cumprimento de Obrigação Legal"=>"Cumprimento de Obrigação Legal","Execução de Políticas Públicas"=>"Execução de Políticas Públicas","Execução de contrato/ Diligências Pré-Contratuais"=>"Execução de contrato/ Diligências Pré-Contratuais","Estudos por Órgão de Pesquisa"=>"Estudos por Órgão de Pesquisa","Exercício Regular de Direitos"=>"Exercício Regular de Direitos","Proteção da Vida"=>"Proteção da Vida","Tutela da Saúde"=>"Tutela da Saúde","Proteção ao Crédito"=>"Proteção ao Crédito","Prevenção à Fraude e à Segurança do Titular"=>"Prevenção à Fraude e à Segurança do Titular","Não aplicável"=>"Não aplicável"];
 
	/* MULTISELECT */

	const TIPO_DE_ARMAZENAMENTO_CONS = ["Interno"=>"Interno","Nuvem"=>"Nuvem","Terceiro"=>"Terceiro"];
    const TRATAMENTOS_REALIZADOS_CONS = ["Coleta"=>"Coleta","Produção"=>"Produção","Recepção"=>"Recepção","Classificação"=>"Classificação","Utilização"=>"Utilização","Acesso"=>"Acesso","Reprodução"=>"Reprodução","Transmissão"=>"Transmissão","Distribuição"=>"Distribuição","Processamento"=>"Processamento","Arquivamento"=>"Arquivamento","Armazenamento"=>"Armazenamento","Eliminação"=>"Eliminação","Modificação"=>"Modificação","Comunicação"=>"Comunicação","Transferência"=>"Transferência","Difusão"=>"Difusão","Extração"=>"Extração","Avaliação ou controle da informação"=>"Avaliação ou controle da informação"];
    const CATEGORIA_DE_DADOS_CONS = ["Pessoais"=>"Pessoais","Sensíveis"=>"Sensíveis","Anonimizados"=>"Anonimizados","Criança"=>"Criança","Adolescente"=>"Adolescente"];
	const CATEGORIA_DO_TITULAR_CONS = ["Cliente"=>"Cliente","Colaborador"=>"Colaborador","Dcolaborador do Colaborador"=>"Dependente do Colaborador","Fornecedor"=>"Fornecedor","Candidato"=>"Candidato","Terceiro"=>"Terceiro","Visitante"=>"Visitante","Não aplicável"=>"Não aplicável"];

	protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"id_processo",
		"processo",
		"descrio",
		"responsvel_pelo_processo",
		"forma_de_coleta_dos_dados",
		"id_da_coleta",
		"tipo_de_armazenamento",
		"id_de_armazenamento",
		"nome_do_sistema_de_armazenamento",
		"matriz_ou_filial",
		"departamento",
		"id_do_terceiro",
		"nome_do_terceiro",
		"localizao_fsica",
		"dados_pessoais_coletados",
		"volume_de_dados_pessoais",
		"tratamentos_realizados",
		"departamentos_com_acesso_aos_dados",
		"finalidade",
		"categoria_de_dados",
		"titular_de_dados",
		"categoria_do_titular",
		"prazo_de_reteno",
		"base_legal",
		"responsvel_interno",
    ];
    
}