<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DatadiriController;



Route::get('/', function () {
    return view('auth/login');
});

// Route asli untuk dashboard
Route::get('/dashboard', [PegawaiController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard');
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route untuk admin dashboard
Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('admin.dashboard');

// Route untuk superadmin dashboard
Route::get('superadmin/dashboard', [SuperAdminController::class, 'index'])->middleware(['auth', 'superadmin'])->name('superadmin.dashboard');

// Route untuk PegawaiController
Route::get('pegawai/dashboard', [PegawaiController::class, 'index'])->middleware(['auth', 'verified'])->name('pegawai.dashboard');

Route::get('/tambah', [PegawaiController::class, 'tambah'])->middleware(['auth', 'verified'])->name('tambah');

Route::post('/insert', [PegawaiController::class, 'insert'])->middleware(['auth', 'verified'])->name('insert');

Route::get('/tampildata/{id}', [PegawaiController::class, 'tampildata'])->middleware(['auth', 'verified'])->name('tampildata');
Route::post('/updatedata/{id}', [PegawaiController::class, 'updatedata'])->middleware(['auth', 'verified'])->name('updatedata');

Route::get('/delet/{id}', [PegawaiController::class, 'delete'])->middleware(['auth', 'verified'])->name('delete');

// Route untuk DatadiriController
Route::get('/profile/edit', [DatadiriController::class, 'create'])->name('datadiri.create');
Route::post('/profile/store', [DatadiriController::class, 'store'])->name('datadiri.store');

