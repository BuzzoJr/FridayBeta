<?php
/**
 * @author     Thank you for using Admiko.com
 * @copyright  2020-2120
 * @link       https://Admiko.com
 * @Help       We are always looking to improve our code. If you know better and more creative way don't hesitate to contact us. Thank you.
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Terceiros;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TerceirosRequest;
use Gate;

class TerceirosController extends Controller
{

    public function index()
    {
        if (Gate::none(['terceiros_allow', 'terceiros_edit'])) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "terceiros";
		$admiko_data["sideBarActiveFolder"] = "";
        
        $tableData = Terceiros::orderBy("id")->get();
        return view("admin.terceiros.index")->with(compact('admiko_data', "tableData"));
    }

    public function create()
    {
        if (Gate::none(['terceiros_allow'])) {
            return redirect(route("admin.terceiros.index"));
        }
        $admiko_data['sideBarActive'] = "terceiros";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.terceiros.store");
        
        $tipo_servico_all = Terceiros::TIPO_SERVICO_CONS;
		$status_all = Terceiros::STATUS_CONS;
		$importancia_all = Terceiros::IMPORTANCIA_CONS;
        return view("admin.terceiros.manage")->with(compact('admiko_data','tipo_servico_all','status_all','importancia_all'));
    }

    public function store(TerceirosRequest $request)
    {
        if (Gate::none(['terceiros_allow'])) {
            return redirect(route("admin.terceiros.index"));
        }
        $data = $request->all();
        
        $Terceiros = Terceiros::create($data);
        
        return redirect(route("admin.terceiros.index"));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        $Terceiros = Terceiros::find($id);
        if (Gate::none(['terceiros_allow', 'terceiros_edit']) || !$Terceiros) {
            return redirect(route("admin.terceiros.index"));
        }

        $admiko_data['sideBarActive'] = "terceiros";
		$admiko_data["sideBarActiveFolder"] = "";
        $admiko_data['formAction'] = route("admin.terceiros.update", [$Terceiros->id]);
        
        $tipo_servico_all = Terceiros::TIPO_SERVICO_CONS;
		$status_all = Terceiros::STATUS_CONS;
		$importancia_all = Terceiros::IMPORTANCIA_CONS;
        $data = $Terceiros;
        return view("admin.terceiros.manage")->with(compact('admiko_data', 'data','tipo_servico_all','status_all','importancia_all'));
    }

    public function update(TerceirosRequest $request,$id)
    {
        if (Gate::none(['terceiros_allow', 'terceiros_edit'])) {
            return redirect(route("admin.terceiros.index"));
        }
        $data = $request->all();
        $Terceiros = Terceiros::find($id);
        $Terceiros->update($data);
        
        return redirect(route("admin.terceiros.index"));
    }

    public function destroy(Request $request)
    {
        if (Gate::none(['terceiros_allow'])) {
            return redirect(route("admin.terceiros.index"));
        }
        Terceiros::destroy($request->idDel);
        return back();
    }
    
    
    
}
