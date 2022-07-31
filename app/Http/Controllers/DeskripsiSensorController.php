<?php

namespace App\Http\Controllers;

use App\Models\Deskripsi;
use App\Models\amonia;
use App\Models\metana;
use App\Models\karbon_monoksida;
use App\Models\data_sensors;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class DeskripsiSensorController extends Controller
{

    public function nh3(Request $request)
    {
        $id  = $request->id;


        $id_wilayah = data_sensors::where('id_wilayah', $id )->exists();
        // \Carbon\Carbon::setLocale('id');
        if($id == $id_wilayah) {
        $NH3= data_sensors::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%d %b %Y") as day'))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('id_wilayah', $id )
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();

        $NH3_detik  = data_sensors::select('NH3','created_at')->where('id_wilayah', $id)->get();
        foreach($NH3 as $row) {
            $data['label'][] = $row->day;
            $data['data'][] = (float) $row->count;
        }
        $NH3_bulanan = data_sensors::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, " %b %Y") as month'))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('id_wilayah', $id )
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get(); 
        foreach($NH3_bulanan as $row) {
            $data2['label'][] = $row->month;
            $data2['data'][] = (float) $row->count;
        }

        $wilayah = Wilayah::all();

        $desk = Deskripsi::where('judul', 'NH3')->first();
        return view('menu.nh3', [
            'title'=>'nh3',
            'deskripsi'=> $desk,
            'wilayah'=> $wilayah,
            'NH3'=> $NH3,
            'NH3_detik'=> $NH3_detik,
            'NH3_bulanan'=> $NH3_bulanan,  

            'chart_data' => json_encode($data),
            'chart_data_bulan' => json_encode($data2), 

        ]);
        }else{
            return 'salah';
        }
        
    }  






     public function co(Request $request)
    {
        $id  = $request->id;


        $id_wilayah = data_sensors::where('id_wilayah', $id )->exists();
        // \Carbon\Carbon::setLocale('id');
        if($id == $id_wilayah) {
        $CO = data_sensors::select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%d %b %Y") as day'))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('id_wilayah', $id)
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get(); 
        foreach($CO as $row) {
            $data['label'][] = $row->day;
            $data['data'][] = (float) $row->count;
        }
        $CO_bulanan = data_sensors::select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, " %b %Y") as month'))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('id_wilayah', $id)
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get(); 
        foreach($CO_bulanan as $row) {
            $data2['label'][] = $row->month;
            $data2['data'][] = (float) $row->count;
        }   
        
        $wilayah = Wilayah::all();

        $desk = Deskripsi::where('judul', 'CO')->first();
        return view('menu.CO', [
            'title'=>'CO',
            'CO_bulanan' => $CO_bulanan,
            'CO' => $CO,
            'deskripsi'=> $desk,
            'wilayah'=> $wilayah,
            'chart_data_bulan' => json_encode($data2),
            'chart_data' => json_encode($data),
        ]);
        
    
    }else{
    return "salah";
    }
        
    }   




    public function ch4(Request $request)
    {
        $id  = $request->id;


        $id_wilayah = data_sensors::where('id_wilayah', $id )->exists();
        // \Carbon\Carbon::setLocale('id');
        if($id == $id_wilayah) {
        $CH4 = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%d %b %Y") as day'))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('id_wilayah', $id)
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get(); 
        foreach($CH4 as $row) {
            $data['label'][] = $row->day;
            $data['data'][] = (float) $row->count;
        }
        $CH4_bulanan = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, " %b %Y") as month'))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('id_wilayah', $id)
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get(); 
        foreach($CH4_bulanan as $row) {
            $data2['label'][] = $row->month;
            $data2['data'][] = (float) $row->count;
        }   
        
        $wilayah = Wilayah::all();

        $desk = Deskripsi::where('judul', 'CH4')->first();
        return view('menu.CH4', [
            'title'=>'CH4',
            'CH4_bulanan' => $CH4_bulanan,
            'CH4' => $CH4,
            'deskripsi'=> $desk,
            'wilayah'=> $wilayah,
            'chart_data_bulan' => json_encode($data2),
            'chart_data' => json_encode($data),
        ]);
        
    
    }else{
    return "salah";
    }
}


}
