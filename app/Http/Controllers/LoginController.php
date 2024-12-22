<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            } elseif (Auth::user()->role == 'customer') {
                return redirect()->route('dashboard.home'); 
            }
        }

        return redirect()->route('login')->with('failed', 'Email atau password salah');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('succes', 'done keluar');
    }
}
