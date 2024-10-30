<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('/about', function () {
    return view('about.index');
})->name('about');

Route::get('/kegiatan', function () {
    return view('kegiatan.index');
})->name('kegiatan');

Route::get('/organisasi', function () {
    return view('organisasi.index');
})->name('organisasi');
