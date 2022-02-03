<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Gate;

class UsersImportController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new UsersImport, $file);
        
        return redirect('/admin')->with('success', 'All good!');
    }
}
