<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    //        protected $fillable = [
    //     'wilayah',
    //     'data_sensor_id',
    // ];

      public function data_sensor(){
        return $this->hasMany(data_sensors::class);
    }
    
}
