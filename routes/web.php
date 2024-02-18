<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\KoperasiController;
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
    return view('welcome');
});

Route::controller(KoperasiController::class)->group(function () {
    Route::get('/transaction', 'index');
    Route::get('/transaction/create', 'create');
    Route::post('/transaction/store', 'store');
    Route::get('/transaction/{id}/edit', 'edit');
    Route::put('/transaction/{id}', 'update');
    Route::delete('/transaction/{id}', 'destroy');
});
