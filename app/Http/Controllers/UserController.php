<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
            $user = Auth::user();
            if ($user->is_admin == 1) {
                return redirect('/admin')->with('success', 'Selamat datang Admin!');
            }
            return redirect('/dashboard')->with('success', 'Login berhasil!');
        };

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showProfile()
    {
        $user = Auth::user();

        return view('profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $validatedData = $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
        ]);
        $user->update([
            'nama' => $validatedData['nama'],
            'kelas' => $validatedData['kelas'],
        ]);
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('editProfile', [
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        //kembali ke halaman login
        return redirect('/');
    }
}
