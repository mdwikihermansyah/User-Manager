<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{

    public function login()
    {
        // dd(Hash::make('123456'));
        if(!empty(Auth::check()))
        {
            return redirect('admin/dashboard');
        }

        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
    
           if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
           {
             return redirect('admin/dahsboard');
           }
           else
           {
             return redirect()->back()->with('error', 'Please enter current email and password');
           }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

}


       
      