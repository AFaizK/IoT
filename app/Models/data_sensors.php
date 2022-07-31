<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_sensors extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function wilayah(){
        return $this->belongsTo(Wilayah::class);
    }
    
}

