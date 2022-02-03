<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Admin\MatrizDeRiscos;

use Gate;


class UsersExportController extends Controller 
{
    public function export() 
    {
        return (new UsersExport)->download('matriz.xlsx');
    }
}