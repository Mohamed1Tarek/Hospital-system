<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect']);
Route::post('/appointment',[HomeController::class,'appointment']);
Route::get('/myappointment',[HomeController::class,'myappointment']);



////////////////////////////////////////////////////////////////
Route::get('/add_doctor_view',[AdminController::class,'add_doctor_view']);
Route::post('/upload_doctor',[AdminController::class,'upload_doctor']);
Route::get('/show_appointments',[AdminController::class,'show_appointments']);
Route::get('/canel_appointment/{id}',[AdminController::class,'canel_appointment']);
Route::get('/approve_appointment/{id}',[AdminController::class,'approve_appointment']);
Route::get('/show_doctor',[AdminController::class,'show_doctor']);
Route::get('/DeleteDoctor/{id}',[AdminController::class,'DeleteDoctor']);
Route::get('/UpdateDoctor/{id}',[AdminController::class,'UpdateDoctor']);
Route::post('/updated_doctor/{id}',[AdminController::class,'updated_doctor']);
///////////////////////////////////////////////////////////////////////////
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
