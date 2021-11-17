<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2120
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\MatrizDeRiscos;
use App\Models\Admin\Processos;
use App\Models\Admin\Ativos;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\MatrizDeRiscosRequest;
use Gate;

class MatrizDeRiscosController extends Controller
{

    public function index()
    {
        if (Gate::none(['matriz_de_riscos_allow', 'matriz_de_riscos_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "matriz_de_riscos";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = MatrizDeRiscos::orderBy("id")->get();
        return view("admin.matriz_de_riscos.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['matriz_de_riscos_allow'])) {
            return redirect(route("admin.matriz_de_riscos.index"));
        }
        $admiko_data['sideBarActive'] = "matriz_de_riscos";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.matriz_de_riscos.store");
        
        /* CONEXÃO COM DM PROCESSOS */
        $processos_all = Processos::all()->pluck("id_processo", "id_processo")->sortBy("id_processo");
        $processos_nome = Processos::all()->pluck("processo", "id_processo")->sortBy("processo");
        $processos_descr = Processos::all()->pluck("descrio", "id_processo")->sortBy("descrio");
        $processos_depart = Processos::all()->pluck("departamento", "id_processo")->sortBy("departamento");
        $processos_terceiro = Processos::all()->pluck("nome_do_terceiro", "id_processo")->sortBy("nome_do_terceiro");
        $processos_dadoscolet = Processos::all()->pluck("dados_pessoais_coletados", "id_processo")->sortBy("dados_pessoais_coletados");
        $processos_finalidade = Processos::all()->pluck("finalidade", "id_processo")->sortBy("finalidade");
        $processos_catdados = Processos::all()->pluck("categoria_de_dados", "id_processo")->sortBy("categoria_de_dados");
        $processos_titulardados = Processos::all()->pluck("titular_de_dados", "id_processo")->sortBy("titular_de_dados");
        $processos_cattitu = Processos::all()->pluck("categoria_do_titular", "id_processo")->sortBy("categoria_do_titular");
        $processos_prazoderete = Processos::all()->pluck("prazo_de_reteno", "id_processo")->sortBy("prazo_de_reteno");
        $processos_baselegal = Processos::all()->pluck("base_legal", "id_processo")->sortBy("base_legal");

        /* CONEXÃO COM DM ATIVOS */
        $ativos_all = Ativos::all()->pluck("id_ativo", "id_ativo")->sortBy("id_ativo");
        $ativos_nome = Ativos::all()->pluck("ativo", "id_ativo")->sortBy("processo");
        $ativos_descr = Ativos::all()->pluck("descrio_ativo", "id_ativo")->sortBy("descrio");
        $ativos_depart = Ativos::all()->pluck("departamento", "id_ativo")->sortBy("departamento");
        $ativos_terceiro = Ativos::all()->pluck("nome_do_terceiro", "id_ativo")->sortBy("nome_do_terceiro");
        $ativos_dadoscolet = Ativos::all()->pluck("dados_pessoais_coletados", "id_ativo")->sortBy("dados_pessoais_coletados");
        $ativos_finalidade = Ativos::all()->pluck("finalidade", "id_ativo")->sortBy("finalidade");
        $ativos_catdados = Ativos::all()->pluck("categoria_de_dados", "id_ativo")->sortBy("categoria_de_dados");
        $ativos_titulardados = Ativos::all()->pluck("titular_de_dados", "id_ativo")->sortBy("titular_de_dados");
        $ativos_cattitu = Ativos::all()->pluck("categoria_do_titular", "id_ativo")->sortBy("categoria_do_titular");
        $ativos_prazoderete = Ativos::all()->pluck("prazo_de_reteno", "id_ativo")->sortBy("prazo_de_reteno");
        $ativos_baselegal = Ativos::all()->pluck("base_legal", "id_ativo")->sortBy("base_legal");
       
        
        $matriz_all = $processos_all->merge($ativos_all);
        $matriz_nome = $processos_nome->merge($ativos_nome);
        $matriz_descr = $processos_descr->merge($ativos_descr);
        $matriz_depart = $processos_depart->merge($ativos_depart);
        $matriz_terceiro = $processos_terceiro->merge($ativos_terceiro);
        $matriz_dadoscolet = $processos_dadoscolet->merge($ativos_dadoscolet);
        $matriz_finalidade = $processos_finalidade->merge($ativos_finalidade);
        $matriz_catdados = $processos_catdados->merge($ativos_catdados);
        $matriz_titulardados = $processos_titulardados->merge($ativos_titulardados);
        $matriz_cattitu = $processos_cattitu->merge($ativos_cattitu);
        $matriz_prazoderete = $processos_prazoderete->merge($ativos_prazoderete);
        $matriz_baselegal = $processos_baselegal->merge($ativos_baselegal);

        $probabilidade_all = MatrizDeRiscos::PROBABILIDADE_CONS;
        $impacto_all = MatrizDeRiscos::IMPACTO_CONS; 
        $resposta_all = MatrizDeRiscos::RESPOSTA_CONS;

        $eventoriscojs = ['eventorisco.js'];
        
        return view("admin.matriz_de_riscos.manage")->with(compact('admiko_data','probabilidade_all','impacto_all','eventoriscojs', 'matriz_all','matriz_nome','matriz_descr','matriz_depart','matriz_terceiro'
        ,'matriz_dadoscolet','matriz_finalidade','matriz_catdados','matriz_titulardados','matriz_cattitu','matriz_prazoderete','matriz_baselegal','resposta_all'));
    }

    public function store(MatrizDeRiscosRequest $request)
    {
        if (Gate::none(['matriz_de_riscos_allow'])) {
            return redirect(route("admin.matriz_de_riscos.index"));
        }
        $data = $request->all();
        
        $MatrizDeRiscos = MatrizDeRiscos::create($data);
        
        return redirect(route("admin.matriz_de_riscos.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $MatrizDeRiscos = MatrizDeRiscos::find($id);
        if (Gate::none(['matriz_de_riscos_allow', 'matriz_de_riscos_edit']) || !$MatrizDeRiscos) {
            return redirect(route("admin.matriz_de_riscos.index"));
        }

        $admiko_data['sideBarActive'] = "matriz_de_riscos";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.matriz_de_riscos.update", [$MatrizDeRiscos->id]);
        
        $processos_all = Processos::all()->pluck("id_processo", "id_processo")->sortBy("id_processo");
        $processos_nome = Processos::all()->pluck("processo", "id_processo")->sortBy("processo");
        $processos_descr = Processos::all()->pluck("descrio", "id_processo")->sortBy("descrio");
        $processos_depart = Processos::all()->pluck("departamento", "id_processo")->sortBy("departamento");
        $processos_terceiro = Processos::all()->pluck("nome_do_terceiro", "id_processo")->sortBy("nome_do_terceiro");
        $processos_dadoscolet = Processos::all()->pluck("dados_pessoais_coletados", "id_processo")->sortBy("dados_pessoais_coletados");
        $processos_finalidade = Processos::all()->pluck("finalidade", "id_processo")->sortBy("finalidade");
        $processos_catdados = Processos::all()->pluck("categoria_de_dados", "id_processo")->sortBy("categoria_de_dados");
        $processos_titulardados = Processos::all()->pluck("titular_de_dados", "id_processo")->sortBy("titular_de_dados");
        $processos_cattitu = Processos::all()->pluck("categoria_do_titular", "id_processo")->sortBy("categoria_do_titular");
        $processos_prazoderete = Processos::all()->pluck("prazo_de_reteno", "id_processo")->sortBy("prazo_de_reteno");
        $processos_baselegal = Processos::all()->pluck("base_legal", "id_processo")->sortBy("base_legal");

        /* CONEXÃO COM DM ATIVOS */
        $ativos_all = Ativos::all()->pluck("id_ativo", "id_ativo")->sortBy("id_ativo");
        $ativos_nome = Ativos::all()->pluck("ativo", "id_ativo")->sortBy("processo");
        $ativos_descr = Ativos::all()->pluck("descrio_ativo", "id_ativo")->sortBy("descrio");
        $ativos_depart = Ativos::all()->pluck("departamento", "id_ativo")->sortBy("departamento");
        $ativos_terceiro = Ativos::all()->pluck("nome_do_terceiro", "id_ativo")->sortBy("nome_do_terceiro");
        $ativos_dadoscolet = Ativos::all()->pluck("dados_pessoais_coletados", "id_ativo")->sortBy("dados_pessoais_coletados");
        $ativos_finalidade = Ativos::all()->pluck("finalidade", "id_ativo")->sortBy("finalidade");
        $ativos_catdados = Ativos::all()->pluck("categoria_de_dados", "id_ativo")->sortBy("categoria_de_dados");
        $ativos_titulardados = Ativos::all()->pluck("titular_de_dados", "id_ativo")->sortBy("titular_de_dados");
        $ativos_cattitu = Ativos::all()->pluck("categoria_do_titular", "id_ativo")->sortBy("categoria_do_titular");
        $ativos_prazoderete = Ativos::all()->pluck("prazo_de_reteno", "id_ativo")->sortBy("prazo_de_reteno");
        $ativos_baselegal = Ativos::all()->pluck("base_legal", "id_ativo")->sortBy("base_legal");
       
        
        $matriz_all = $processos_all->merge($ativos_all);
        $matriz_nome = $processos_nome->merge($ativos_nome);
        $matriz_descr = $processos_descr->merge($ativos_descr);
        $matriz_depart = $processos_depart->merge($ativos_depart);
        $matriz_terceiro = $processos_terceiro->merge($ativos_terceiro);
        $matriz_dadoscolet = $processos_dadoscolet->merge($ativos_dadoscolet);
        $matriz_finalidade = $processos_finalidade->merge($ativos_finalidade);
        $matriz_catdados = $processos_catdados->merge($ativos_catdados);
        $matriz_titulardados = $processos_titulardados->merge($ativos_titulardados);
        $matriz_cattitu = $processos_cattitu->merge($ativos_cattitu);
        $matriz_prazoderete = $processos_prazoderete->merge($ativos_prazoderete);
        $matriz_baselegal = $processos_baselegal->merge($ativos_baselegal);

        $probabilidade_all = MatrizDeRiscos::PROBABILIDADE_CONS;
        $impacto_all = MatrizDeRiscos::IMPACTO_CONS; 
        $resposta_all = MatrizDeRiscos::RESPOSTA_CONS;
        
        $data = $MatrizDeRiscos;
        return view("admin.matriz_de_riscos.manage")->with(compact('admiko_data', 'data','probabilidade_all','impacto_all' ,'matriz_all','matriz_nome','matriz_descr','matriz_depart','matriz_terceiro'
        ,'matriz_dadoscolet','matriz_finalidade','matriz_catdados','matriz_titulardados','matriz_cattitu','matriz_prazoderete','matriz_baselegal','resposta_all'));
    }

    public function update(MatrizDeRiscosRequest $request,$id)
    {
        if (Gate::none(['matriz_de_riscos_allow', 'matriz_de_riscos_edit'])) {
            return redirect(route("admin.matriz_de_riscos.index"));
        }
        $data = $request->all();
        $MatrizDeRiscos = MatrizDeRiscos::find($id);
        $MatrizDeRiscos->update($data);
        
        return redirect(route("admin.matriz_de_riscos.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['matriz_de_riscos_allow'])) {
            return redirect(route("admin.matriz_de_riscos.index"));
        }
        MatrizDeRiscos::destroy($request->idDel);
        return back();
    }
    
    
    
}
