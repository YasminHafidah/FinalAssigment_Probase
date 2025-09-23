<?php

use App\Http\Controllers\ModulController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TheoryValidationController;
use App\Http\Controllers\UserController;
use App\Models\TheoryValidation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/kelompok', function () {
    return view('daftarKelompok');
});

Route::get('/materi', [ModulController::class, 'index']);

Route::get('/materi/{materi:slug}', [ModulController::class, 'show']);


Route::get('/project', [ProjectController::class, 'index']);

Route::get('/project/{project:slug}', [ProjectController::class, 'show']);

Route::get('/validasiProgress', [TheoryValidationController::class, 'index']);

Route::get('/meet', function () {
    return view('meet');
});

Route::get('/uploadProgress', function () {
    return view('uploadProject');
});

Route::get('/validasiProgress', function () {
    return view('validasiProgress');
});

Route::post('/register', [UserController::class, 'prosesRegister'])->name('user.register');

Route::post('/', [UserController::class, 'prosesLogin'])->name('user.login');
