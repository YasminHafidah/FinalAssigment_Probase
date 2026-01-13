<?php

use App\Livewire\Quiz;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\TheoryValidation;
use App\Models\ValidationQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UploadProjectController;
use App\Http\Controllers\TheoryValidationController;
use App\Http\Controllers\UserAnswersController;
use App\Http\Controllers\ValidationQuestionController;


// Login & Register
Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [UserController::class, 'prosesRegister'])->name('user.register');

Route::post('/', [UserController::class, 'prosesLogin'])->name('user.login');

Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])->name('google.redirect');

Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {});

// Halaman Inti Website Harus Login

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/kelompok', [UserGroupController::class,'showMyGroup']);

    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');

    Route::patch('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

    Route::get('/nilai',[UserAnswersController::class, 'showResult'])->name('nilai');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/materi', [ModulController::class, 'index']);

    Route::get('/materi/{materi:slug}', [ModulController::class, 'show']);

    Route::post('/materi/{materi:slug}/selesai', [ModulController::class, 'selesai'])->name('modul.complete');

    Route::get('/project', [ProjectController::class, 'index']);

    Route::get('/project/{project:slug}', [ProjectController::class, 'show']);

    Route::get('/validasi/{project:slug}', function (Project $project) {
        return view('validasiProgress', [
            'project' => $project
        ]);
    })->middleware('auth');

    // Route::get('/validasi/{project:slug}', Quiz::class)->middleware('auth');

    Route::get('/meet', [UserGroupController::class, 'redirectToGroupMeet'])
        ->middleware('auth')
        ->name('meet');

    Route::get('/upload/{project:slug}', [UploadProjectController::class, 'create']);

    Route::post('/upload/{project:slug}', [UploadProjectController::class, 'store'])->name('upload.user')
        ->middleware('auth');

    Route::get('/validasiProgress', function () {
        return view('validasiProgress');
    });
});


// Route::get('/quiz', Quiz::class);

// Route::get('/validasi', ValidationQuestionController::class);

// Route::get('/guru', function () {
//     return view('dashboardAdmin');
// });

// Route::get('/tes-login', function () {
//     // Cek apakah ada user yang sedang login
//     if (Auth::check()) {
//         // Jika ada, tampilkan semua datanya dan hentikan program
//         dd(Auth::user());
//     } else {
//         // Jika tidak ada, beri pesan
//         return 'GAGAL: User tidak terdeteksi login.';
//     }
// });

// Route::get('/test', function () {
//     $user = App\Models\User::first();
//     return $user->getUserName();
// });
