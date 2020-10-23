<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    
});

Auth::routes();

Route::post('/breakdown', [App\Http\Controllers\BreakdownController::class, 'store'])->name('breakdown.store');
Route::get('/breakdown', [App\Http\Controllers\BreakdownController::class, 'index'])->name('breakdown');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
