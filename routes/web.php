<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LinkController;
use \App\Http\Controllers\PlayResultController;
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

Route::get('/', [RegisterController::class, 'index']);
Route::post('/', [RegisterController::class, 'create'])->name('register.create');
Route::get('/link/{link}', [LinkController::class, 'index'])->name('link.index');
Route::put('/link', [LinkController::class, 'update'])->name('link.update');
Route::put('/link/{link}', [LinkController::class, 'deactivate'])->name('link.deactivate');
Route::post('/lottery', [PlayResultController::class, 'play'])->name('lottery.play');
Route::get('/lottery', [PlayResultController::class, 'getHistory'])->name('lottery.history');
