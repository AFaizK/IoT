<?php

namespace App\Exports;
use App\Models\data_sensors;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoExportBulanan implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $CO_bulanan = data_sensors::select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
            ->where('created_at', '>', Carbon::today()->subMonth(12))
            ->groupBy('month_name','month')
            ->orderBy('month')
            ->get();
        return $CO_bulanan;
    }
}
