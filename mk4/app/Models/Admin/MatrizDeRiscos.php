<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2120
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Http\Controllers\Traits\Admin\AdmikoFileUploadTrait;
use App\Http\Controllers\Traits\Admin\AdmikoAuditableTrait;
use App\Http\Controllers\Traits\Admin\AdmikoMultiTenantModeTrait;

use App\Models\Admin\Processos;
use App\Models\Admin\Ativos;
use Illuminate\Support\Facades\DB;

class MatrizDeRiscos extends Model
{
    use AdmikoFileUploadTrait,AdmikoAuditableTrait,AdmikoMultiTenantModeTrait;

    public $table = 'matriz_de_riscos';
    
    const PROBABILIDADE_CONS = ["1"=>"Muito Baixo","2"=>"Baixo","3"=>"Medio","4"=>"Alto","5"=>"Extremo"];
    const IMPACTO_CONS = ["1"=>"Muito Baixo","2"=>"Baixo","3"=>"Medio","4"=>"Alto","5"=>"Extremo"];
    const RESPOSTA_CONS = ["Aceitar"=>"Aceitar","Evitar"=>"Evitar","Mitigar"=>"Mitigar","Transferir"=>"Transferir"];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
		"id_col",
		"id_no_data_mapping",
		"nome_do_ativo_ou_processo",
		"descrio",
		"departamento",
		"terceiro",
		"dados_pessoais_coletados",
		"finalidade",
		"categoria_de_dados",
		"titular_de_dados",
		"categoria_do_titular",
		"prazo_de_reteno",
		"base_legal",
		"eventos_de_risco",
		"causas",
		"categoria_de_risco",
		"consequncias",
		"data_de_avaliao_do_risco",
		"probabilidade",
		"impacto",
		"risco_inerente",
		"resposta_ao_risco",
		"planos_de_ao_para_implementao_de_controles",
		"fundamentao",
		"status_do_plano_de_ao",
		"gestor_responsvel",
		"data_de_incio",
		"data_de_limite",
		"efetividade",
		"fora",
		"objetivo_do_risco",
		"data_de_avaliao_residual",
		"probabilidade_residual",
		"impacto_residual",
		"risco_residual",
    ];
    /* CONEXÃO DM PROCESSOS */
    public function id_do_processo_id()
    {
        //return $this->belongsTo(Processos::class, 'id_no_data_mapping');
        $str = $this->id_no_data_mapping;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->id_no_data_mapping)->pluck('id_processo');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->id_no_data_mapping)->pluck('id_ativo');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->id_no_data_mapping)->pluck('id_no_data_mapping');
        }
    }
	public function processo_id()
    {
        //return $this->belongsTo(Processos::class, 'nome_do_ativo_ou_processo');
        $str = $this->nome_do_ativo_ou_processo;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->nome_do_ativo_ou_processo)->pluck('processo');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->nome_do_ativo_ou_processo)->pluck('ativo');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->nome_do_ativo_ou_processo)->pluck('nome_do_ativo_ou_processo');
        }
    }
	public function descrio_id()
    {
        //return $this->belongsTo(Processos::class, 'descrio');
        $str = $this->descrio;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->descrio)->pluck('descrio');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->descrio)->pluck('descrio_ativo');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->descrio)->pluck('descrio');
        }
    }
	public function departamento_id()
    {
        //return $this->belongsTo(Processos::class, 'departamento');
        $str = $this->departamento;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->departamento)->pluck('departamento');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->departamento)->pluck('departamento');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->departamento)->pluck('departamento');
        }
    }
	public function terceiro_id()
    {
        //return $this->belongsTo(Processos::class, 'terceiro');
        $str = $this->terceiro;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->terceiro)->pluck('nome_do_terceiro');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->terceiro)->pluck('nome_do_terceiro');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->terceiro)->pluck('terceiro');
        }
    }
	public function dados_pessoais_coletados_id()
    {
        //return $this->belongsTo(Processos::class, 'dados_pessoais_coletados');
        $str = $this->dados_pessoais_coletados;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->dados_pessoais_coletados)->pluck('dados_pessoais_coletados');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->dados_pessoais_coletados)->pluck('dados_pessoais_coletados');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->dados_pessoais_coletados)->pluck('dados_pessoais_coletados');
        }
    }
	public function finalidade_id()
    {
        //return $this->belongsTo(Processos::class, 'finalidade');
        $str = $this->finalidade;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->finalidade)->pluck('finalidade');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->finalidade)->pluck('finalidade');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->finalidade)->pluck('finalidade');
        }
    }
    public function categoria_de_dados_id()
    {
        //return $this->belongsTo(Processos::class, 'categoria_de_dados');
        $str = $this->categoria_de_dados;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->categoria_de_dados)->pluck('categoria_de_dados');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->categoria_de_dados)->pluck('categoria_de_dados');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->categoria_de_dados)->pluck('categoria_de_dados');
        }
    }
    public function titular_de_dados_id()
    {
        //return $this->belongsTo(Processos::class, 'titular_de_dados');
        $str = $this->titular_de_dados;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->titular_de_dados)->pluck('titular_de_dados');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->titular_de_dados)->pluck('titular_de_dados');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->titular_de_dados)->pluck('titular_de_dados');
        }
    }
    
    public function categoria_do_titular_id()
    {
        //return $this->belongsTo(Processos::class, 'categoria_do_titular');
        $str = $this->categoria_do_titular;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->categoria_do_titular)->pluck('categoria_do_titular');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->categoria_do_titular)->pluck('categoria_do_titular');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->categoria_do_titular)->pluck('categoria_do_titular');
        }
    }
	public function prazo_de_reteno_id()
    {
        //return $this->belongsTo(Processos::class, 'prazo_de_reteno');
        $str = $this->prazo_de_reteno;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->prazo_de_reteno)->pluck('prazo_de_reteno');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->prazo_de_reteno)->pluck('prazo_de_reteno');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->prazo_de_reteno)->pluck('prazo_de_reteno');
        }
    }

	public function base_legal_id()
    {
        $str = $this->base_legal;
        if(str_starts_with($str, 'P')){ 
            return  DB::table('processos')->where('id_processo',$this->base_legal)->pluck('base_legal');
        }elseif(str_starts_with($str, 'A')){
            return DB::table('ativos')->where('id_ativo',$this->base_legal)->pluck('base_legal');
        }else{
            return DB::table('matriz_de_riscos')->where('id_col',$this->base_legal)->pluck('base_legal');
        }
    }

    /* DATAS */
    public function getDataDeAvaliaoDoRiscoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_time_format')) : null;
    }
    public function setDataDeAvaliaoDoRiscoAttribute($value)
    {
        $this->attributes['data_de_avaliao_do_risco'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function getDataDeIncioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_time_format')) : null;
    }
    public function setDataDeIncioAttribute($value)
    {
        $this->attributes['data_de_incio'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function getDataDeLimiteAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_time_format')) : null;
    }
    public function setDataDeLimiteAttribute($value)
    {
        $this->attributes['data_de_limite'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
	public function getDataDeAvaliaoResidualAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('admiko_config.table_date_time_format')) : null;
    }
    public function setDataDeAvaliaoResidualAttribute($value)
    {
        $this->attributes['data_de_avaliao_residual'] = $value ? Carbon::createFromFormat(config('admiko_config.table_date_time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}