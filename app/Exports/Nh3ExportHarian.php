<?php

namespace App\Exports;
use App\Models\data_sensors;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;

use Illuminate\Http\Request;

class Nh3ExportHarian implements FromCollection, WithHeadings
{


    use Exportable;
    private $id;

    function __construct($id) {
            $this->id = $id;
    }

/**
* @return \Illuminate\Support\Collection
*/
    public function collection()
    {
        return dd($this->id);
        // $id_wilayah = data_sensors::where('id_wilayah', $this->id )->exists();
        // if($this->id == $id_wilayah) {

        // $NH3 = data_sensors::query()->select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%d %b %Y") as day'))
        // ->where('created_at', '>', Carbon::today()->subDay(6))
        // ->where('id_wilayah', $this->id)
        // ->groupBy('day_name','day')
        // ->orderBy('day')
        // ->get();
        // return $NH3;
        // }
    }
    public function headings(): array
    {
        return [
            'Data Sensor',
            'Bulan',
            'Tahun',
        ];
    }
   

}
