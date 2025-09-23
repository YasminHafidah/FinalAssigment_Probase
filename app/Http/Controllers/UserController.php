<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function prosesRegister(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users,username',
            'nama' => 'required',
            'kelas' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        User::createUser($validatedData);
        return redirect('/')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function prosesLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/dashboard')->with('success', 'Login berhasil!');
        };

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
