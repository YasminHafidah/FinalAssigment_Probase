<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
        // dd(Socialite::driver('google')->redirect()->getTargetUrl());
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::updateOrCreate([
                'google_id' => $googleUser->getId(),
            ], [
                'nama' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'username' => explode('@', $googleUser->getEmail())[0],
                'password' => null,
                'kelas' => 'xi',
                'google_token' => $googleUser->token,
            ]);
            Auth::login($user);
            return redirect('/dashboard');
            // $response = Http::withToken($googleUser->token)
            //     ->throw()
            //     ->post('https://meet.googleapis.com/v2/spaces', []);

            // $meetingUri = $response->json('meetingUri');

            // if ($meetingUri) {
            //     // Jika berhasil, arahkan ke dashboard dengan link meeting
            //     return redirect('/meet')->with('success', 'Login berhasil! Link Meet: ' . $meetingUri);
            // } else {
            //     // Jika gagal membuat meet, tetap login-kan tapi beri pesan error
            //     return redirect('/meet')->with('error', 'Login berhasil, tapi gagal membuat link Google Meet.');
            // }
        } catch (\Exception $e) {
            // Jika ada error, kembalikan ke halaman login
            dd($e);
            // }
            // $meetingUri = null;
            // try {
            //     $response = Http::withToken($googleUser->token)
            //         ->throw()
            //         ->post('https://meet.googleapis.com/v2/spaces', []);

            //     $meetingUri = $response->json('meetingUri');
            // } catch (\Exception $e) {
            //     // Mencatat error spesifik jika HANYA pembuatan meet yang gagal
            //     Log::error('Gagal membuat link Google Meet: ' . $e->getMessage());
            // }

            // // Redirect berdasarkan hasil pembuatan meet
            // if ($meetingUri) {
            //     return redirect('/meet')->with('success', 'Login berhasil! Link Meet: ' . $meetingUri);
            // } else {
            //     return redirect('/meet')->with('error', 'Login berhasil, tapi gagal membuat link Google Meet.');
            // }
            // try {
            //     $response = Http::withToken($googleUser->token)
            //         ->throw()
            //         // INI ADALAH PERBAIKANNYA: Kirim array kosong sebagai body JSON
            //         ->post('https://meet.googleapis.com/v2/spaces', []);

            //     $meetingUri = $response->json('meetingUri');
            // } catch (\Exception $e) {
            //     Log::error('Gagal membuat link Google Meet: ' . $e->getMessage());
            // }
            // $meetingUri = null; // Set nilai default
            // try {
            //     $response = Http::withToken($googleUser->token)
            //         ->throw()
            //         ->post('https://meet.googleapis.com/v2/spaces', []);

            //     $meetingUri = $response->json('meetingUri');
            // } catch (\Exception $e) {
            //     Log::error('Gagal membuat link Google Meet: ' . $e->getMessage());
            // }

            // // --- Bagian 3: Redirect Berdasarkan Hasil ---
            // if ($meetingUri) {
            //     return redirect('/meet')->with('success', 'Login berhasil! Link Meet: ' . $meetingUri);
            // } else {
            //     return redirect('/meet')->with('error', 'Login berhasil, tapi gagal membuat link Google Meet.');
            // }
        }
    }
}
