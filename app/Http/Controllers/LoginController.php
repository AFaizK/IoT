<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('menu.login', [
            'title' => 'Login',
        ]);
    }

    public function login(Request $request){
       
       $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password'=> 'required'

        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
            // $role=Auth::user()->role;
            // if($role == '1')
            // {
            //     // return view('menu.adminHome');
            //     return view('menu.adminHome');
            // }
            // else
            // {
            //     return redirect()->intended('menu.app');
            // } 
        }
        return back()->with('loginError', 'Login Failed!!');
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
        
    }
}
