<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\KarbonDioksida;
use App\Models\karbon_monoksidaa;
use App\Models\data_sensors;
use App\Models\amonia;
use App\Models\karbon_monoksida;
use App\Models\metana;
use Carbon\Carbon;

class KarbonDioksidaController extends Controller
{
    public function index(metana $metana)
    {
  
        $CO = karbon_monoksida::select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();    
        $CO_bulanan = karbon_monoksida::select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
            ->where('created_at', '>', Carbon::today()->subMonth(12))
            ->groupBy('month_name','month')
            ->orderBy('month')
            ->get();
        $NH3 = amonia::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get(); 
        $NH3_bulanan = amonia::select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
            ->where('created_at', '>', Carbon::today()->subMonth(12))
            ->groupBy('month_name','month')
            ->orderBy('month')
            ->get();
        $CH4 = metana::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();
        $CH4_bulanan = metana::select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
            ->where('created_at', '>', Carbon::today()->subMonth(12))
            ->groupBy('month_name','month')
            ->orderBy('month')
            ->get();

            $data = [];
            $data1 = [];
            $data2 = [];
            $data22 = [];
            $data3 = [];
            $data33 = [];

            foreach($CO_bulanan as $row) {
                $data1['label'][] = $row->month_name;
                $data1['data'][] = (int) $row->count;
            }
            foreach($NH3_bulanan as $row) {
                $data22['label'][] = $row->month_name;
                $data22['data'][] = (int) $row->count;
            }
            foreach($CH4_bulanan as $row) {
                $data33['label'][] = $row->month_name;
                $data33['data'][] = (int) $row->count;
            }
            
            foreach($CO as $row) {
                $data['label'][] = $row->day_name;
                $data['data'][] = (int) $row->count;
            }
           
            foreach($NH3 as $row) {
                $data2['label'][] = $row->day_name;
                $data2['data'][] = (int) $row->count;
            }
            
            foreach($CH4 as $row) {
                $data3['label'][] = $row->day_name;
                $data3['data'][] = (int) $row->count;
            }




            // $getdata = metana::find(1);
            $getdata = metana::select('CH4','created_at')->latest()->first();
           
            $getdata2 = amonia::select('NH3','created_at')->latest()->first();
            $getdata3 = karbon_monoksida::select('CO','created_at')->latest()->first();

            // $getdata = metana::latest()->take(1)->get();
            
        
          

        
            return view('menu.app', [
                        'title' => 'user Dashboard',
                        'terbaru' => $getdata,
                        'terbaru2' => $getdata2,
                        'terbaru3' => $getdata3,
                        'chart_data' => json_encode($data),
                        'chart_data2' => json_encode($data2),
                        'chart_data3' => json_encode($data3), 
                        'chart_data1' => json_encode($data1),
                        'chart_data22' => json_encode($data22),
                        'chart_data33' => json_encode($data33),
                        
            ]);
        
    }  



  
}
