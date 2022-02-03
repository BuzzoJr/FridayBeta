<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2120
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Processos;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProcessosRequest;
use Gate;

class ProcessosController extends Controller
{

    public function index()
    {
        if (Gate::none(['processos_allow', 'processos_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "processos";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Processos::orderBy("id")->get();
        return view("admin.processos.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['processos_allow'])) {
            return redirect(route("admin.processos.index"));
        }
        $admiko_data['sideBarActive'] = "processos";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.processos.store");
        
        $responsvel_all = Processos::RESPONSVEL_CONS;
		$forma_de_coleta_all = Processos::FORMA_DE_COLETA_CONS;
		$volumedados_all = Processos::VOLUME_DADOS_CONS;
		$titular_de_dados_all = Processos::TITULAR_DE_DADOS_CONS;
		$base_legal_all = Processos::BASE_LEGAL_CONS;

        $tipo_de_armazenamento_all =  Processos::TIPO_DE_ARMAZENAMENTO_CONS;
        $datatipo = Processos::TIPO_DE_ARMAZENAMENTO_CONS;

        $tratamentos_realizados_all =  Processos::TRATAMENTOS_REALIZADOS_CONS;
        $datatrata = Processos::TRATAMENTOS_REALIZADOS_CONS;

        $cat_dados_all =  Processos::CATEGORIA_DE_DADOS_CONS;
        $datacatd = Processos::CATEGORIA_DE_DADOS_CONS;

        $cat_titular_all =  Processos::CATEGORIA_DO_TITULAR_CONS;
        $datacatt = Processos::CATEGORIA_DO_TITULAR_CONS;

        return view("admin.processos.manage")->with(compact('admiko_data','responsvel_all','forma_de_coleta_all','volumedados_all','titular_de_dados_all','base_legal_all'
        ,'tipo_de_armazenamento_all','tratamentos_realizados_all','cat_dados_all','cat_titular_all','datatipo','datatrata','datacatd','datacatt'));
    }

    public function store(ProcessosRequest $request)
    {
        if (Gate::none(['processos_allow'])) {
            return redirect(route("admin.processos.index"));
        }
        $data = $request->all();

        $data['tipo_de_armazenamento'] = implode(', ', $data['tipo_de_armazenamento']);
        $data['tratamentos_realizados'] = implode(', ', $data['tratamentos_realizados']);
        $data['categoria_de_dados'] = implode(', ', $data['categoria_de_dados']);
        $data['categoria_do_titular'] = implode(', ', $data['categoria_do_titular']);

        $Processos = Processos::create($data);
        
        return redirect(route("admin.processos.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Processos = Processos::find($id);
        if (Gate::none(['processos_allow', 'processos_edit']) || !$Processos) {
            return redirect(route("admin.processos.index"));
        }

        $admiko_data['sideBarActive'] = "processos";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.processos.update", [$Processos->id]);
        
        $responsvel_all = Processos::RESPONSVEL_CONS;
		$forma_de_coleta_all = Processos::FORMA_DE_COLETA_CONS;
		$volumedados_all = Processos::VOLUME_DADOS_CONS;
		$titular_de_dados_all = Processos::TITULAR_DE_DADOS_CONS;
		$base_legal_all = Processos::BASE_LEGAL_CONS;

        $tipo_de_armazenamento_all =  Processos::TIPO_DE_ARMAZENAMENTO_CONS;
        $tipoKey = explode(', ', $Processos['tipo_de_armazenamento']);
        $tipoVal = explode(', ', $Processos['tipo_de_armazenamento']);
        $datatipo = array_combine($tipoKey, $tipoVal);

        $tratamentos_realizados_all =  Processos::TRATAMENTOS_REALIZADOS_CONS;
        $tratamentoKey = explode(', ', $Processos['tratamentos_realizados']);
        $tratamentoVal = explode(', ', $Processos['tratamentos_realizados']);
        $datatrata = array_combine($tratamentoKey, $tratamentoVal);

        $cat_dados_all =  Processos::CATEGORIA_DE_DADOS_CONS;
        $catdKey = explode(', ', $Processos['categoria_de_dados']);
        $catdVal = explode(', ', $Processos['categoria_de_dados']);
        $datacatd = array_combine($catdKey, $catdVal);

        $cat_titular_all =  Processos::CATEGORIA_DO_TITULAR_CONS;
        $cattKey = explode(', ', $Processos['categoria_do_titular']);
        $cattVal = explode(', ', $Processos['categoria_do_titular']);
        $datacatt = array_combine($cattKey, $cattVal);

        $data = $Processos;
        return view("admin.processos.manage")->with(compact('admiko_data', 'data', 'responsvel_all','forma_de_coleta_all','volumedados_all',
        'titular_de_dados_all','base_legal_all', 'tipo_de_armazenamento_all','tratamentos_realizados_all','cat_dados_all','cat_titular_all','datatipo','datatrata','datacatd','datacatt'));
    }

    public function update(ProcessosRequest $request,$id)
    {
        if (Gate::none(['processos_allow', 'processos_edit'])) {
            return redirect(route("admin.processos.index"));
        }
        $data = $request->all();

        $data['tipo_de_armazenamento'] = implode(', ', $data['tipo_de_armazenamento']);
        $data['tratamentos_realizados'] = implode(', ', $data['tratamentos_realizados']);
        $data['categoria_de_dados'] = implode(', ', $data['categoria_de_dados']);
        $data['categoria_do_titular'] = implode(', ', $data['categoria_do_titular']);
        $Processos = Processos::find($id);
        $Processos->update($data);
        
        return redirect(route("admin.processos.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['processos_allow'])) {
            return redirect(route("admin.processos.index"));
        }
        Processos::destroy($request->idDel);
        return back();
    }
    
    
    
}
