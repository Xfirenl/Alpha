<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Auth::routes();

Route::get('/player', [App\Http\Controllers\GameController::class, 'player']);
Route::get('/skills', [App\Http\Controllers\GameController::class, 'skills']);
Route::get('/location', [App\Http\Controllers\GameController::class, 'location']);
Route::get('/items', [App\Http\Controllers\GameController::class, 'items']);
Route::get('/action', [App\Http\Controllers\GameController::class, 'listActions']);
Route::get('/action/{id}', [App\Http\Controllers\GameController::class, 'doAction']);
