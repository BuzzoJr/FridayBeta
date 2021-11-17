<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\MatrizDeRisco;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\MatrizDeRiscoRequest;
use Gate;
use App\Models\Admin\Processos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class MapadecalorController extends Controller
{
    public function index()
    {
    

        $admiko_data['sideBarActive'] = "mapadecalor";
        $admiko_data['sideBarActiveFolder'] = "";

        /* Riscos Inerentes*/

        $malto_mbaixo = DB::table('matriz_de_riscos')->where('probabilidade', '=', '5')->where('impacto', '=', '1')->count();
        $alto_mbaixo = DB::table('matriz_de_riscos')->where('probabilidade', '=', '4')->where('impacto', '=', '1')->count();
        $medio_mbaixo = DB::table('matriz_de_riscos')->where('probabilidade', '=', '3')->where('impacto', '=', '1')->count();
        $baixo_mbaixo = DB::table('matriz_de_riscos')->where('probabilidade', '=', '2')->where('impacto', '=', '1')->count();
        $mbaixo_mbaixo = DB::table('matriz_de_riscos')->where('probabilidade', '=', '1')->where('impacto', '=', '1')->count();
        
        $malto_baixo = DB::table('matriz_de_riscos')->where('probabilidade', '=', '5')->where('impacto', '=', '2')->count();
        $alto_baixo = DB::table('matriz_de_riscos')->where('probabilidade', '=', '4')->where('impacto', '=', '2')->count();
        $medio_baixo = DB::table('matriz_de_riscos')->where('probabilidade', '=', '3')->where('impacto', '=', '2')->count();
        $baixo_baixo = DB::table('matriz_de_riscos')->where('probabilidade', '=', '2')->where('impacto', '=', '2')->count();
        $mbaixo_baixo = DB::table('matriz_de_riscos')->where('probabilidade', '=', '1')->where('impacto', '=', '2')->count();

        $malto_medio = DB::table('matriz_de_riscos')->where('probabilidade', '=', '5')->where('impacto', '=', '3')->count();
        $alto_medio = DB::table('matriz_de_riscos')->where('probabilidade', '=', '4')->where('impacto', '=', '3')->count();
        $medio_medio = DB::table('matriz_de_riscos')->where('probabilidade', '=', '3')->where('impacto', '=', '3')->count();
        $baixo_medio = DB::table('matriz_de_riscos')->where('probabilidade', '=', '2')->where('impacto', '=', '3')->count();
        $mbaixo_medio = DB::table('matriz_de_riscos')->where('probabilidade', '=', '1')->where('impacto', '=', '3')->count();

        $malto_alto = DB::table('matriz_de_riscos')->where('probabilidade', '=', '5')->where('impacto', '=', '4')->count();
        $alto_alto = DB::table('matriz_de_riscos')->where('probabilidade', '=', '4')->where('impacto', '=', '4')->count();
        $medio_alto = DB::table('matriz_de_riscos')->where('probabilidade', '=', '3')->where('impacto', '=', '4')->count();
        $baixo_alto = DB::table('matriz_de_riscos')->where('probabilidade', '=', '2')->where('impacto', '=', '4')->count();
        $mbaixo_alto = DB::table('matriz_de_riscos')->where('probabilidade', '=', '1')->where('impacto', '=', '4')->count();

        $malto_malto = DB::table('matriz_de_riscos')->where('probabilidade', '=', '5')->where('impacto', '=', '5')->count();
        $alto_malto = DB::table('matriz_de_riscos')->where('probabilidade', '=', '4')->where('impacto', '=', '5')->count();
        $medio_malto = DB::table('matriz_de_riscos')->where('probabilidade', '=', '3')->where('impacto', '=', '5')->count();
        $baixo_malto = DB::table('matriz_de_riscos')->where('probabilidade', '=', '2')->where('impacto', '=', '5')->count();
        $mbaixo_malto = DB::table('matriz_de_riscos')->where('probabilidade', '=', '1')->where('impacto', '=', '5')->count();

        /* Riscos Residuais*/

        $malto_mbaixo1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '5')->where('impacto_residual', '=', '1')->count();
        $alto_mbaixo1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '4')->where('impacto_residual', '=', '1')->count();
        $medio_mbaixo1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '3')->where('impacto_residual', '=', '1')->count();
        $baixo_mbaixo1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '2')->where('impacto_residual', '=', '1')->count();
        $mbaixo_mbaixo1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '1')->where('impacto_residual', '=', '1')->count();
        
        $malto_baixo1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '5')->where('impacto_residual', '=', '2')->count();
        $alto_baixo1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '4')->where('impacto_residual', '=', '2')->count();
        $medio_baixo1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '3')->where('impacto_residual', '=', '2')->count();
        $baixo_baixo1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '2')->where('impacto_residual', '=', '2')->count();
        $mbaixo_baixo1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '1')->where('impacto_residual', '=', '2')->count();

        $malto_medio1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '5')->where('impacto_residual', '=', '3')->count();
        $alto_medio1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '4')->where('impacto_residual', '=', '3')->count();
        $medio_medio1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '3')->where('impacto_residual', '=', '3')->count();
        $baixo_medio1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '2')->where('impacto_residual', '=', '3')->count();
        $mbaixo_medio1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '1')->where('impacto_residual', '=', '3')->count();

        $malto_alto1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '5')->where('impacto_residual', '=', '4')->count();
        $alto_alto1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '4')->where('impacto_residual', '=', '4')->count();
        $medio_alto1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '3')->where('impacto_residual', '=', '4')->count();
        $baixo_alto1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '2')->where('impacto_residual', '=', '4')->count();
        $mbaixo_alto1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '1')->where('impacto_residual', '=', '4')->count();

        $malto_malto1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '5')->where('impacto_residual', '=', '5')->count();
        $alto_malto1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '4')->where('impacto_residual', '=', '5')->count();
        $medio_malto1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '3')->where('impacto_residual', '=', '5')->count();
        $baixo_malto1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '2')->where('impacto_residual', '=', '5')->count();
        $mbaixo_malto1 = DB::table('matriz_de_riscos')->where('probabilidade_residual', '=', '1')->where('impacto_residual', '=', '5')->count();



        return view('admin.mapa_de_calor.index')->with(compact('admiko_data','malto_mbaixo', 'alto_mbaixo', 'medio_mbaixo', 'baixo_mbaixo', 'mbaixo_mbaixo', 'malto_baixo','alto_baixo', 'medio_baixo', 'baixo_baixo', 'mbaixo_baixo', 'malto_medio', 'alto_medio', 'medio_medio', 'baixo_medio', 'mbaixo_medio', 'malto_alto', 'alto_alto', 'medio_alto', 'baixo_alto', 'mbaixo_alto', 'malto_malto', 'alto_malto', 'medio_malto', 'baixo_malto', 'mbaixo_malto', 'malto_mbaixo1', 'alto_mbaixo1', 'medio_mbaixo1', 'baixo_mbaixo1', 'mbaixo_mbaixo1', 'malto_baixo1','alto_baixo1', 'medio_baixo1', 'baixo_baixo1', 'mbaixo_baixo1', 'malto_medio1', 'alto_medio1', 'medio_medio1', 'baixo_medio1', 'mbaixo_medio1', 'malto_alto1', 'alto_alto1', 'medio_alto1', 'baixo_alto1', 'mbaixo_alto1', 'malto_malto1', 'alto_malto1', 'medio_malto1', 'baixo_malto1', 'mbaixo_malto1'));
    }

}

