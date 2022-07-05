<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\Ch4ExportHarian;
use App\Exports\Ch4ExportBulanan;
use App\Exports\Ch4Export_kode2;
use App\Exports\Ch4ExportBulanan_kode2;
use App\Exports\CoExportBulanan;
use App\Exports\CoExportHarian;
use App\Exports\CoExportHarian_kode2;
use App\Exports\CoExportBulanan_kode2;
use App\Exports\Nh3ExportHarian;
use App\Exports\Nh3ExportBulanan;
use App\Exports\Nh3ExportHarian_kode2;
use App\Exports\Nh3ExportBulanan_kode2;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportch4(){
        return Excel::download(new Ch4ExportHarian, 'CH4-Harian-Export.xlsx');
    }
    public function exportch4_bulanan(){
        return Excel::download(new Ch4ExportBulanan, 'CH4-bulana-export.xlsx');
    }
    public function exportch4_kode2(){
        return Excel::download(new Ch4Export_kode2, 'CH4-Harian-Export.xlsx');
    }
    public function exportch4_bulanan_kode2(){
        return Excel::download(new Ch4ExportBulanan_kode2, 'CH4-bulana-export.xlsx');
    }

    public function exportnh3(){
    return Excel::download(new NH3ExportHarian, 'NH3-Harian-Export.xlsx');
    }
    public function exportnh3_bulanan(){
    return Excel::download(new NH3ExportBulanan, 'NH3-Bulanan-Export.xlsx');
    }
    public function exportnh3_kode2(){
    return Excel::download(new NH3ExportHarian_kode2, 'NH3-Harian-Export.xlsx');
    }
    public function exportnh3_bulanan_kode2(){
    return Excel::download(new NH3ExportBulanan_kode2, 'NH3-Bulanan-Export.xlsx');
    }

    public function exportco(){
    return Excel::download(new COExportHarian, 'CO-Harian-Export.xlsx');
    } 
    public function exportco_bulanan(){
    return Excel::download(new COExportBulanan, 'CO-Bulanan-Export.xlsx');
    } 
    public function exportco_kode2(){
    return Excel::download(new COExportHarian_kode2, 'CO-Harian-Export.xlsx');
    } 
    public function exportco_bulanan_kode2(){
    return Excel::download(new COExportBulanan_kode2, 'CO-Bulanan-Export.xlsx');
    }
}
