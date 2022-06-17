<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\User;

class ContactUsController extends Controller
{
    public function index(){
        return view('menu.contactUs', [
            'title' => 'contact',
        ]);
    }
    public function store(Request $request){

        $validateData = $request->validate([
          'nama' => 'required|max:255',
          'pesan' => 'required',
          'email' => 'required'
          ]);
  
        //   $validateData['user_id'] = auth()->user()->id;
          ContactUs::create($validateData);
          $request->session()->flash('success', 'pesan success dikirim');
          return redirect('/contactus');
      } 
}
