<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('Login');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'email' =>$request-> input('email'), 
            'password' =>$request-> input('password')],
            $request->input('remember'))
            ){
                return redirect()->route('home');
                // return view('Admin.layout.Home');
            }
            Session::flash('error', 'Email hoặc Password không đúng');
            return redirect()->back();
            // echo bcrypt('Sangzero,.2011');
    }
}
