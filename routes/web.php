<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [ReportController::class, 'index'])->middleware('auth');

Route::post('/export', [ReportController::class, 'export']);

Route::get('/insert',[InsertController::class, 'index'])->middleware('auth');

Route::post('/insert', [InsertController::class, 'save']);

Route::get('/update/{id}', [UpdateController::class,'index'])->middleware('auth');

Route::put('/update/{id}', [UpdateController::class, 'update']);

Route::get('hapus/{id}',[UpdateController::class,'delete'] );

Route::get('/login',[loginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login',[loginController::class, 'auth']);

Route::post('/logout',[loginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'create']);
