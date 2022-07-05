<?php

namespace App\Exports;
use App\Models\data_sensors;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class Nh3ExportBulanan_kode2 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $NH3_bulanan_kode2 = data_sensors::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('kode_sensor', '2')
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get();
        return $NH3_bulanan_kode2;
    }
}
