<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route untuk Admin (bisa admin & petugas)
Route::prefix('admin')->middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::get('/data-pengguna', [UserController::class, 'index'])->name('admin.data-pengguna');
});

// Route untuk Siswa (hanya siswa)
Route::prefix('siswa')->middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/dashboard', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');

});

require __DIR__.'/auth.php';
