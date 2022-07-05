<?php

namespace App\Exports;
use App\Models\data_sensors;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class Ch4Export_kode2 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $CH4_kode2 = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('kode_sensor', '2')
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get(); 
        return $CH4_kode2;
    }
}
