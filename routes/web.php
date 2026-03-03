<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('karyawan', KaryawanController::class);
