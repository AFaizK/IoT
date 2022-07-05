<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_sensors extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'NH3',
    //     'CO',
    //     'CH4',
    //     'kode_sensor',

    // ];
    public function wilayah(){
        return $this->hasMany(Wilayah::class);
    }
    
}

