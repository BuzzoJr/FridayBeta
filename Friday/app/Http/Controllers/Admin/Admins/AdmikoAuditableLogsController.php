<?php
/** Auditable Logs Controller **/

namespace App\Http\Controllers\Admin\Admins;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admins\AdmikoAuditable;
use Illuminate\Http\Request;

class AdmikoAuditableLogsController extends Controller
{

    public function index(Request $request)
    {
        if (auth()->user()->role_id != 1) {
            return redirect(route("admin.home"));
        }
        $admiko_data['sideBarActive'] = "admiko_auditable_logs";
		$admiko_data["sideBarActiveFolder"] = "";

        $tableData = AdmikoAuditable::search($request->query("search"))->orderByDesc("id")->paginate($request->query("length")??array_key_first(config("admiko_config.length_menu_table")));
        return view("admin.admins.admiko_auditable_logs.index")->with(compact('admiko_data', "tableData"));
    }

    public function show($id)
    {
        $AuditableLogs = AdmikoAuditable::find($id);
        if (auth()->user()->role_id != 1 || !$AuditableLogs) {
            return redirect(route("admin.admiko_auditable_logs.index"));
        }

        $admiko_data['sideBarActive'] = "admiko_auditable_logs";
        $admiko_data["sideBarActiveFolder"] = "";

        $data = $AuditableLogs;
        return view("admin.admins.admiko_auditable_logs.view")->with(compact('admiko_data', 'data'));
    }

}
