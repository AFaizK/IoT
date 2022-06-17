<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('menu.register', [
            'title' => 'register'
        ]);
    }
    public function store(Request $request){

      $validateData = $request->validate([
        'name' => 'required|max:255',
        'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        'email' => 'required|email|unique:users',
        'password' =>  'required|min:5|max:255'
        ]);
        $validateData['password']=bcrypt($validateData['password']);

        User::create($validateData);
        $request->session()->flash('success', 'registration succesfull!! please lgoin');
        return redirect('/login');
    }
}
