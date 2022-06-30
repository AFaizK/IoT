<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use symfony\Component\HttpFoundation\Response;
use App\Models\data_sensors;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class DataSensorController extends Controller
{

    public function store(Request $request){
      
        $tgl = Carbon::now();
        $CO = $request->input('CO');
        $CH4 = $request->input('CH4');
        $NH3 = $request->input('NH3');
        
        $validate = $request->validate([
            'CO' => 'required',
            'NH3' => 'required',
            'CH4' => 'required',
            // 'created_at' => 'required',
            ]);
            
        $validate['CO']= $CO;
        $validate['NH3']= $NH3;
        $validate['CH4']= $CH4;
        // $validate['created_at']= $tgl;
        $response = data_sensors::create($validate);
    
        return response()->json($response);
 
    
      }
    
}
    