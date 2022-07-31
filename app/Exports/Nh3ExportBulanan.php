<?php

namespace App\Exports;
use App\Models\data_sensors;
use App\Models\Wilayah;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class Nh3ExportBulanan implements FromCollection, WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $NH3_bulanan = data_sensors::with('wilayah')->select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%b %Y") as month'))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('id_wilayah', 2)
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get(); 
        return $NH3_bulanan;
    }
    public function headings(): array
    {
        return [
            'Data Sensor',
            'Bulan',
            'Tahun',
            'Wilayah',
 
        ];
    }
}
