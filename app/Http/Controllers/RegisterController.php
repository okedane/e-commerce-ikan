<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('register')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',  // Default role sebagai customer
        ]);

        // Simpan data customer terkait user
        Customer::create([
            'id_user' => $user->id,
            'alamat' => $request->address,
            'no_hp' => $request->phone,
        ]);

        // Login otomatis setelah pendaftaran
        Auth::login($user);

        // Redirect ke halaman dashboard customer
        return redirect()->route('customer.dashboard');
    }
}
