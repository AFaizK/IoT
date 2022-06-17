<?php

namespace App\Http\Controllers;

use App\Models\Deskripsi;
use App\Models\amonia;
use App\Models\metana;
use App\Models\karbon_monoksida;
use App\Models\data_sensors;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DeskripsiSensorController extends Controller
{

    public function nh3(Deskripsi $deskripsi)
    {
        $NH3 = amonia::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();

        foreach($NH3 as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $desk = Deskripsi::where('judul', 'NH3')->first();
        return view('menu.nh3', [
            'title'=>'nh3',
            'deskripsi'=> $desk,
            'chart_data' => json_encode($data)
        ]);
        
    }  
     public function co(Deskripsi $deskripsi)
    {
        $CO = karbon_monoksida::select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();

        foreach($CO as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }

        $desk = Deskripsi::where('judul', 'CO')->first();
        return view('menu.CO', [
            'title'=>'CO',
            'deskripsi'=> $desk,
            'chart_data' => json_encode($data)
        ]);
        
    }   
    public function ch4()
    {
        $CH4 = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get(); 
        // $datach4 = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
        // ->where('created_at', '>', Carbon::today()->subDay(10))
        // ->groupBy('day_name','day')
        // ->orderBy('day')
        // ->get();
        $datach4 = data_sensors::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("MONTHNAME(created_at) as day_name"), DB::raw("MONTH(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subMonth(12))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get(); 
        foreach($CH4 as $row) {
            $data['label'][] = $row->day_name;
            $data['data'][] = (int) $row->count;
        }
        foreach($datach4 as $row) {
            $data2['label'][] = $row->day_name;
            $data2['data'][] = (int) $row->count;
        }

        $desk = Deskripsi::where('judul', 'CH4')->first();
        return view('menu.CH4', [
            'title'=>'CH4',
            'datach4' => $datach4,
            'CH4' => $CH4,
       
            'deskripsi'=> $desk,
            'chart_data_bulan' => json_encode($data2),
            'chart_data' => json_encode($data)
        ]);
        
    }


}
