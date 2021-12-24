<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\EmpolyeeController;
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


Route::get('/', [App\Http\Controllers\EmpolyeeController::class,'index']);
Route::get('/employees/create', [App\Http\Controllers\EmpolyeeController::class,'create']);
Route::post('/employees/submit', [App\Http\Controllers\EmpolyeeController::class,'save']);
Route::get('/employees/edit/{id}', [App\Http\Controllers\EmpolyeeController::class,'edit']);
Route::post('/employees/update', [App\Http\Controllers\EmpolyeeController::class,'update']);
Route::get('/delete/{id}',[App\Http\Controllers\EmpolyeeController::class,'delete']);
