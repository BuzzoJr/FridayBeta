<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\MatrizDeRiscos;
use App\Http\Controllers\Controller;
use Gate;
use PDF;

class PdfController extends Controller
{
    public function geraPdf(){

        $tableData = MatrizDeRiscos::where('risco_inerente', 'Alto')->orWhere('risco_inerente', 'Extremo')->orderBy('id')->get();

        $baselegal = 'Interesse Legítimo do Controlador/Terceiro';
    

        $pdf = PDF::loadView('pdf', compact('tableData', 'baselegal'));

        return $pdf->setPaper('a4')->stream('RIPD.pdf');
        
    }
    public function downloadPdf(){

        $tableData = MatrizDeRiscos::where('risco_inerente', 'Alto')->orWhere('risco_inerente', 'Extremo')->orderBy('id')->get();

        $baselegal = 'Interesse Legítimo do Controlador/Terceiro';
    

        $pdf = PDF::loadView('pdf', compact('tableData', 'baselegal'));

        return $pdf->setPaper('a4')->download('RIPD.pdf');
        
    }
    

    public function index()
    {
        
        $countaltos = MatrizDeRiscos::where('risco_inerente', 'Alto')->count();
        $countextremos = MatrizDeRiscos::where('risco_inerente', 'Extremo')->count();


        $admiko_data['sideBarActive'] = "ripd";
		$admiko_data["sideBarActiveFolder"] = "";
        
        
        return view("admin.ripd.index")->with(compact('admiko_data', 'countaltos', 'countextremos'));
    }
}
 