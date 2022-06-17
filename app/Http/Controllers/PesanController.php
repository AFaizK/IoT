<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deskripsi;
use App\Models\ContactUs;

class PesanController extends Controller
{
    public function index(){
        return view('/admin/pesan/pesan',[
            'title'=>'contact',
            'contact_us' =>  ContactUs::paginate(2)
        ]);
        
    }   
     public function show(Deskripsi $deskripsi)
    {
         return view('admin.deskripsi.show', [
             "title" => "deskripsi",
              "deskripsi" => $deskripsi
        ]);
    }

}
