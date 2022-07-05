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

    public function nh3(Deskripsi $deskripsi)
    {
        $NH3 = data_sensors::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('kode_sensor', '1')
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
        
        foreach($NH3 as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (float) $row->count;
        }
        $NH3_bulanan = data_sensors::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('kode_sensor', '1')
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get(); 
        foreach($NH3_bulanan as $row) {
            $data2['label'][] = $row->month_name;
            $data2['data'][] = (float) $row->count;
        }

        $NH3_kode2 = data_sensors::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('kode_sensor', '2')
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
        foreach($NH3_kode2 as $row) {
            $data2_kode2['label'][] = $row->day_name;
            $data2_kode2['data'][] = (float) $row->count;
        }

         $NH3_bulanan_kode2 = data_sensors::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('kode_sensor', '2')
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get();

        foreach($NH3_bulanan_kode2 as $row) {
            $data22_kode2['label'][] = $row->month_name;
            $data22_kode2['data'][] = (float) $row->count;
        }
        $wilayah = Wilayah::all();

        $desk = Deskripsi::where('judul', 'NH3')->first();
        return view('menu.nh3', [
            'title'=>'nh3',
            'deskripsi'=> $desk,
            'wilayah'=> $wilayah,
            'NH3'=> $NH3,
            'NH3_bulanan'=> $NH3_bulanan,  
            'NH3_bulanan_kode2'=> $NH3_bulanan_kode2,  
            'NH3_kode2'=> $NH3_kode2,
            'chart_data' => json_encode($data),
            'chart_data_bulan' => json_encode($data2), 
            'chart_data2_kode2' => json_encode($data2_kode2),
            'chart_data22_kode2' => json_encode($data22_kode2)
        ]);
        
    }  






     public function co(Deskripsi $deskripsi)
    {
        $CO = data_sensors::select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('kode_sensor', '1')
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
        foreach($CO as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (float) $row->count;
        }

        $CO_bulanan = data_sensors::select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('kode_sensor', '1')
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get(); 
        foreach($CO_bulanan as $row) {
            $data2['label'][] = $row->month_name;
            $data2['data'][] = (float) $row->count;
        }
        
        $CO_kode2 = data_sensors::select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('kode_sensor', '2')
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
        foreach($CO_kode2 as $row) {
            $data_kode2['label'][] = $row->day_name;
            $data_kode2['data'][] = (float) $row->count;
        }

        $CO_bulanan_kode2 = data_sensors::select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('kode_sensor', '2')
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get(); 
        foreach($CO_bulanan_kode2 as $row) {
            $data2_kode2['label'][] = $row->month_name;
            $data2_kode2['data'][] = (float) $row->count;
        }
        $wilayah = Wilayah::all();
      

        $desk = Deskripsi::where('judul', 'CO')->first();
        return view('menu.CO', [
            'title'=>'CO',
            'deskripsi'=> $desk,
            'wilayah'=> $wilayah,
            'CO'=> $CO,
            'CO_bulanan'=> $CO_bulanan,
            'CO_kode2'=> $CO_kode2,
            'CO_bulanan_kode2'=> $CO_bulanan_kode2,
            'chart_data' => json_encode($data),
            'chart_data_bulan' => json_encode($data2),
            'chart_data_kode2' => json_encode($data_kode2),
            'chart_data_bulan_kode2' => json_encode($data2_kode2)
        ]);
        
    }   




    public function ch4()
    {
        $CH4 = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('kode_sensor', '1')
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get(); 
        foreach($CH4 as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (float) $row->count;
        }
        $CH4_bulanan = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('kode_sensor', '1')
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get(); 
        foreach($CH4_bulanan as $row) {
            $data2['label'][] = $row->month_name;
            $data2['data'][] = (float) $row->count;
        }   
        
        $CH4_kode2 = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->where('kode_sensor', '2')
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get(); 
        foreach($CH4_kode2 as $row) {
            $data_kode2['label'][] = $row->day_name;
            $data_kode2['data'][] = (float) $row->count;
        }
        $CH4_bulanan_kode2 = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->where('kode_sensor', '2')
        ->groupBy('month_name','month')
        ->orderBy('month')
        ->get(); 
        foreach($CH4_bulanan_kode2 as $row) {
            $data2_kode2['label'][] = $row->month_name;
            $data2_kode2['data'][] = (float) $row->count;
        }
        $wilayah = Wilayah::all();

        $desk = Deskripsi::where('judul', 'CH4')->first();
        return view('menu.CH4', [
            'title'=>'CH4',
            'CH4_bulanan' => $CH4_bulanan,
            'CH4' => $CH4,
            'CH4_bulanan_kode2' => $CH4_bulanan_kode2,
            'CH4_kode2' => $CH4_kode2,
            'deskripsi'=> $desk,
            'wilayah'=> $wilayah,
            'chart_data_bulan' => json_encode($data2),
            'chart_data' => json_encode($data),
            'chart_data_bulan_kode2' => json_encode($data2_kode2),
            'chart_data_kode2' => json_encode($data_kode2)
        ]);
        
    }


}
