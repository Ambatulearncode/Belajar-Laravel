<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [KaryawanController::class, 'index'])
    ->name('karyawan.index');

Route::get('/karyawan/create', [KaryawanController::class, 'create'])
    ->name('karyawan.create');

Route::post('/karyawan', [KaryawanController::class, 'store'])
    ->name('karyawan.store');

Route::get('/karyawan/{id}', [KaryawanController::class, 'show'])
    ->name('karyawan.store');
