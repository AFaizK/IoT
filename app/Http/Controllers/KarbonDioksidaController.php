<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\KarbonDioksida;
use App\Models\karbon_monoksidaa;
use App\Models\Wilayah;
use App\Models\data_sensors;



class KarbonDioksidaController extends Controller
{

    public function index(Request $request)
    {
        $id = $request->id;

        $id_wilayah = data_sensors::where('id_wilayah', $id )->exists();
        if($id == $id_wilayah) {
        $CO = data_sensors::with('wilayah')->select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%d %b %Y") as day'))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->where('id_wilayah', $id)
            ->groupBy('day_name', 'day')
            ->orderBy( 'day')
            ->get();
        $CO_bulanan = data_sensors::with('wilayah')->select(DB::raw("SUM(CO)/COUNT(CO) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%b %Y") as month'))
            ->where('created_at', '>', Carbon::today()->subMonth(12))
            ->where('id_wilayah', $id)
            ->groupBy('month_name','month')
            ->orderBy('month')
            ->get();
        $NH3 = data_sensors::with('wilayah')->select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%d %b %Y") as day'))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->where('id_wilayah', $id)
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();
        $NH3_bulanan = data_sensors::with('wilayah')->select(DB::raw("SUM(NH3)/COUNT(NH3) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%b %Y") as month'))
            ->where('created_at', '>', Carbon::today()->subMonth(12))
            ->where('id_wilayah', $id)
            ->groupBy('month_name','month')
            ->orderBy('month')
            ->get();
        $CH4 = data_sensors::with('wilayah')->select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("DAYNAME(created_at) as day_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%d %b %Y") as day'))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->where('id_wilayah', $id)
            ->groupBy('day_name','day')
            ->orderBy('day')
            ->get();
        $CH4_bulanan = data_sensors::with('wilayah')->select(DB::raw("SUM(CH4)/COUNT(CH4) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw('DATE_FORMAT(data_sensors.created_at, "%b %Y") as month'))
            ->where('created_at', '>', Carbon::today()->subMonth(12))
            ->where('id_wilayah', $id)
            ->groupBy('month_name','month')
            ->orderBy('month')
            ->get();

            // $data = [];
            // $data1 = [];
            // $data2 = [];
            // $data22 = [];
            // $data3 = [];
            // $data33 = [];

            foreach($CO_bulanan as $row) {
                $data1['label'][] = $row->month;
                $data1['data'][] = (float) $row->count;
            }
            foreach($NH3_bulanan as $row) {
                $data22['label'][] = $row->month;
                $data22['data'][] = (float) $row->count;
            }
            foreach($CH4_bulanan as $row) {
                $data33['label'][] = $row->month;
                $data33['data'][] = (float) $row->count;
            }

            foreach($CO as $row) {
                $data['label'][] = $row->day;
                $data['data'][] = (float) $row->count;
            }

            foreach($NH3 as $row) {
                $data2['label'][] = $row->day;
                $data2['data'][] = (float) $row->count;
            }

            foreach($CH4 as $row) {
                $data3['label'][] = $row->day;
                $data3['data'][] = (float) $row->count;
            }



            // $id = Wilayah::select('id')->get();


            // $getdata = metana::find(1);
            $getdata = data_sensors::with('wilayah')->select('CH4','created_at') ->where('id_wilayah', $id)->latest()->first();
            // $getdata = data_sensors::select('CH4','created_at')->latest()->first();
            // $getdatakode2 = data_sensors::select('CH4','created_at')->latest()->first();

            // $getdata2 = data_sensors::select('NH3','created_at')->latest()->first();
            $getdata2 = data_sensors::with('wilayah')->select('NH3','created_at') ->where('id_wilayah', $id)->latest()->first();



            // $getdata3 = data_sensors::select('CO','created_at')->latest()->first();
            $getdata3 = data_sensors::with('wilayah')->select('CO','created_at') ->where('id_wilayah', $id)->latest()->first();

            $wilayah =  Wilayah::all();
            // $wilayah =  data_sensors::all();



         

            return view('menu.app', [
                        'title' => 'user Dashboard',
                        'terbaru' => $getdata,
                        'terbaru2' => $getdata2,
                        'wilayah' => $wilayah,
                        'terbaru3' => $getdata3,
                    
                        // kode2
                        'chart_data' => json_encode($data),
                        'chart_data2' => json_encode($data2),
                        'chart_data3' => json_encode($data3),
                        'chart_data1' => json_encode($data1),
                        'chart_data22' => json_encode($data22),
                        'chart_data33' => json_encode($data33),

            ]);
        }else {
            return "Maaf Data Tidak Tersedia";
        }

    }




}
