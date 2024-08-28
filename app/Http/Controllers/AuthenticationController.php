<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authentication(Request $request)
    {
        $credentiials = $request->only('email', 'password');
        if (Auth::attempt($credentiials)) {
            return redirect('peulajaran');
        } else {
            return redirect('masuk')->with('salah', 'login yang anda lakukan gagal');
        }
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('masuk');
    }
    public function halaman_register()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        return redirect('masuk');
    }
}
