<?php

namespace App\Exports;
use App\Models\data_sensors;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class Nh3ExportHarian_kode2 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $NH3_kode2 = data_sensors::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('kode_sensor', '2')
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
        return $NH3_kode2;
    }
}
