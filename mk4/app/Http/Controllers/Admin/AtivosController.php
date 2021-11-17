<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2120
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Ativos;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AtivosRequest;
use Gate;

class AtivosController extends Controller
{

    public function index()
    {
        if (Gate::none(['ativos_allow', 'ativos_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "ativos";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Ativos::orderBy("id")->get();
        return view("admin.ativos.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['ativos_allow'])) {
            return redirect(route("admin.ativos.index"));
        }
        $admiko_data['sideBarActive'] = "ativos";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.ativos.store");
        
        $tipo_ativo_all = Ativos::TIPOATIVO_CONS;
        $formato_ativo_all = Ativos::FORMATO_ATIVO_CONS;
        $responsavel_ativo_all = Ativos::RESPONSÁVEL_ATIVO_CONS;
        $tipo_armazena_all = Ativos::TIPO_ARMAZENA_CONS;
        $formato_armazena_all = Ativos::FORMATO_ARMAZENA_CONS;
        $volume_dados_all = Ativos::VOLUME_DADOS_CONS;
        $trafego_rede_all = Ativos::TRAFEGO_REDE_CONS;
        $criptografia_armazena_all = Ativos::CRIPTOGRAFIA_ARMAZENA_CONS;
        $titular_dados_all = Ativos::TITULAR_DE_DADOS_CONS;
        $base_legal_all = Ativos::BASE_LEGAL_CONS;
        $ativo_primasecunda_all = Ativos::ATIVO_PRIMARIOSECUNDARIO_CONS;

        $cat_dados_all =  Ativos::CATEGORIA_DE_DADOS_CONS;
        $datacatd = Ativos::CATEGORIA_DE_DADOS_CONS;
        $cat_titular_all =  Ativos::CATEGORIA_DO_TITULAR_CONS;
        $datacatt = Ativos::CATEGORIA_DO_TITULAR_CONS;

        return view("admin.ativos.manage")->with(compact('admiko_data','tipo_ativo_all','formato_ativo_all','responsavel_ativo_all','tipo_armazena_all'
        ,'formato_armazena_all','volume_dados_all','trafego_rede_all','criptografia_armazena_all','titular_dados_all','base_legal_all','ativo_primasecunda_all'
        ,'cat_dados_all','cat_titular_all','datacatd','datacatt'));
    }

    public function store(AtivosRequest $request)
    {
        if (Gate::none(['ativos_allow'])) {
            return redirect(route("admin.ativos.index"));
        }
        $data = $request->all();

        $data['categoria_de_dados'] = implode(', ', $data['categoria_de_dados']);
        $data['categoria_do_titular'] = implode(', ', $data['categoria_do_titular']);

        $Ativos = Ativos::create($data);
        
        return redirect(route("admin.ativos.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Ativos = Ativos::find($id);
        if (Gate::none(['ativos_allow', 'ativos_edit']) || !$Ativos) {
            return redirect(route("admin.ativos.index"));
        }

        $admiko_data['sideBarActive'] = "ativos";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.ativos.update", [$Ativos->id]);
        
        $tipo_ativo_all = Ativos::TIPOATIVO_CONS;
        $formato_ativo_all = Ativos::FORMATO_ATIVO_CONS;
        $responsavel_ativo_all = Ativos::RESPONSÁVEL_ATIVO_CONS;
        $tipo_armazena_all = Ativos::TIPO_ARMAZENA_CONS;
        $formato_armazena_all = Ativos::FORMATO_ARMAZENA_CONS;
        $volume_dados_all = Ativos::VOLUME_DADOS_CONS;
        $trafego_rede_all = Ativos::TRAFEGO_REDE_CONS;
        $criptografia_armazena_all = Ativos::CRIPTOGRAFIA_ARMAZENA_CONS;
        $titular_dados_all = Ativos::TITULAR_DE_DADOS_CONS;
        $base_legal_all = Ativos::BASE_LEGAL_CONS;
        $ativo_primasecunda_all = Ativos::ATIVO_PRIMARIOSECUNDARIO_CONS;

        $cat_dados_all =  Ativos::CATEGORIA_DE_DADOS_CONS;
        $catdKey = explode(', ', $Ativos['categoria_de_dados']);
        $catdVal = explode(', ', $Ativos['categoria_de_dados']);
        $datacatd = array_combine($catdKey, $catdVal);

        $cat_titular_all =  Ativos::CATEGORIA_DO_TITULAR_CONS;
        $cattKey = explode(', ', $Ativos['categoria_do_titular']);
        $cattVal = explode(', ', $Ativos['categoria_do_titular']);
        $datacatt = array_combine($cattKey, $cattVal);

        $data = $Ativos;
        return view("admin.ativos.manage")->with(compact('admiko_data', 'data','tipo_ativo_all','formato_ativo_all','responsavel_ativo_all','tipo_armazena_all','formato_armazena_all','volume_dados_all','trafego_rede_all','criptografia_armazena_all','titular_dados_all','base_legal_all','ativo_primasecunda_all','cat_dados_all','cat_titular_all','datacatd','datacatt'));
    }

    public function update(AtivosRequest $request,$id)
    {
        if (Gate::none(['ativos_allow', 'ativos_edit'])) {
            return redirect(route("admin.ativos.index"));
        }
        $data = $request->all();

        $data['categoria_de_dados'] = implode(', ', $data['categoria_de_dados']);
        $data['categoria_do_titular'] = implode(', ', $data['categoria_do_titular']);
        $Ativos = Ativos::find($id);
        $Ativos->update($data);
        
        return redirect(route("admin.ativos.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['ativos_allow'])) {
            return redirect(route("admin.ativos.index"));
        }
        Ativos::destroy($request->idDel);
        return back();
    }
    
    
    
}
