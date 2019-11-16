<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        // return view('auth.login');
        if(Auth::attempt($request->only('nim','password'))){
            return redirect('/dashboard')->with('success','Login Berhasil! Selamat Datang!');

        }

        return redirect('/login')->with('error','Login Gagal, Silahkan Check NIM dan Password Anda.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('warning','Anda Telah Logout!');
    }
}
