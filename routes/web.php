<?php

use App\Http\Controllers\Backend\AssistantController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DoctorController;
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



Route::group(['as'=>'app.','prefix'=>'app','namespace'=>'Backend','middleware'=>['auth','verified']],function(){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::group(['as'=>'doctor.','prefix'=>'doctor'],function(){

        Route::get('/index',[DoctorController::class,'index'])->name('index');
        Route::get('/create',[DoctorController::class,'create'])->name('create');
        Route::post('/store',[DoctorController::class,'store'])->name('store');
        Route::get('/edit/{id}',[DoctorController::class,'edit'])->name('edit');
        Route::get('/show/{id}',[DoctorController::class,'show'])->name('show');
        Route::put('/update/{id}',[DoctorController::class,'update'])->name('update');
        Route::get('/delete/{id}',[DoctorController::class,'destroy'])->name('delete');
    });


    Route::group(['as'=>'assistant.','prefix'=>'assistant'],function(){

        Route::get('/index',[AssistantController::class,'index'])->name('index');
        Route::get('/create',[AssistantController::class,'create'])->name('create');
        Route::post('/store',[AssistantController::class,'store'])->name('store');
        Route::get('/edit/{id}',[AssistantController::class,'edit'])->name('edit');
        Route::get('/show/{id}',[AssistantController::class,'show'])->name('show');
        Route::put('/update/{id}',[AssistantController::class,'update'])->name('update');
        Route::get('/delete/{id}',[AssistantController::class,'destroy'])->name('delete');
    });
    
});


require __DIR__.'/auth.php';
