<?php

namespace App\Exports;
use App\Models\data_sensors;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class Ch4ExportBulanan implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $CH4_bulanan = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('kode_sensor', '1')
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get();
        return $CH4_bulanan;
    }
}
