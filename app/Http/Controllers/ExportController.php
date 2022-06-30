<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\Ch4ExportHarian;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportch4(){
        return Excel::download(new Ch4ExportHarian, 'CH4_Haria_Export.xlsx');
      }
}
