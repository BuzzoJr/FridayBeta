<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $admiko_data['sideBarActive'] = "home";
        $admiko_data['sideBarActiveFolder'] = "";

        $processos_count = DB::table('processos')->select('id')->count();
        $ativos_count = DB::table('ativos')->select('id')->count();
        $terceiros_count = DB::table('terceiros')->select('id')->count();

        $matriz_de_risco_baixo = DB::table('matriz_de_riscos')->where('risco_inerente', 'Baixo')->count();
        $matriz_de_risco_medio = DB::table('matriz_de_riscos')->where('risco_inerente', 'Médio')->count();
        $matriz_de_risco_alto = DB::table('matriz_de_riscos')->where('risco_inerente', 'Alto')->count();
        $matriz_de_risco_extremo = DB::table('matriz_de_riscos')->where('risco_inerente', 'Extremo')->count();

        $matriz_de_risco_baixo1 = DB::table('matriz_de_riscos')->where('risco_residual', 'Baixo')->count();
        $matriz_de_risco_medio1 = DB::table('matriz_de_riscos')->where('risco_residual', 'Médio')->count();
        $matriz_de_risco_alto1 = DB::table('matriz_de_riscos')->where('risco_residual', 'Alto')->count();
        $matriz_de_risco_extremo1 = DB::table('matriz_de_riscos')->where('risco_residual', 'Extremo')->count();

        $totalriscosinerentes = DB::table('matriz_de_riscos')->whereNotNull('risco_inerente')->count();
        $totalriscosresiduais = DB::table('matriz_de_riscos')->whereNotNull('risco_residual')->count();

        return view('admin.home.index')->with(compact('admiko_data', 'matriz_de_risco_baixo', 'matriz_de_risco_medio', 'matriz_de_risco_alto', 'matriz_de_risco_extremo', 'matriz_de_risco_baixo1', 'matriz_de_risco_medio1', 'matriz_de_risco_alto1', 'matriz_de_risco_extremo1', 'processos_count', 'ativos_count', 'terceiros_count', 'totalriscosinerentes', 'totalriscosresiduais'));
    
    }
}
