<?php

use App\Http\Controllers\Backend\AdviceController;
use App\Http\Controllers\Backend\AssistantController;
use App\Http\Controllers\Backend\Bed\FloorController;
use App\Http\Controllers\Backend\BloodController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DiseaseController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\EatingTimeController;
use App\Http\Controllers\Backend\FrequencyController;
use App\Http\Controllers\Backend\MedicineController;
use App\Http\Controllers\Backend\MedicineGroupController;
use App\Http\Controllers\Backend\PatientController;
use App\Http\Controllers\Backend\PrescriptionController;
use App\Http\Controllers\Backend\QuantityController;
use App\Http\Controllers\Backend\QuantityTypeController;
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


    Route::group(['as'=>'disease.','prefix'=>'disease'],function(){

        Route::get('/index',[DiseaseController::class,'index'])->name('index');
        Route::get('/create',[DiseaseController::class,'create'])->name('create');
        Route::post('/store',[DiseaseController::class,'store'])->name('store');
        Route::get('/edit/{id}',[DiseaseController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[DiseaseController::class,'update'])->name('update');
        Route::get('/delete/{id}',[DiseaseController::class,'destroy'])->name('delete');
    });


    Route::group(['as'=>'blood.','prefix'=>'blood'],function(){

        Route::get('/index',[BloodController::class,'index'])->name('index');
        Route::get('/create',[BloodController::class,'create'])->name('create');
        Route::post('/store',[BloodController::class,'store'])->name('store');
        Route::get('/edit/{id}',[BloodController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[BloodController::class,'update'])->name('update');
        Route::get('/delete/{id}',[BloodController::class,'destroy'])->name('delete');
    });


    Route::group(['as'=>'patient.','prefix'=>'patient'],function(){

        Route::get('/index',[PatientController::class,'index'])->name('index');
        Route::get('/create',[PatientController::class,'create'])->name('create');
        Route::post('/store',[PatientController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PatientController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[PatientController::class,'update'])->name('update');
        Route::get('/delete/{id}',[PatientController::class,'destroy'])->name('delete');
    });


    Route::group(['as'=>'frequency.','prefix'=>'frequency'],function(){

        Route::get('/index',[FrequencyController::class,'index'])->name('index');
        Route::get('/create',[FrequencyController::class,'create'])->name('create');
        Route::post('/store',[FrequencyController::class,'store'])->name('store');
        Route::get('/edit/{id}',[FrequencyController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[FrequencyController::class,'update'])->name('update');
        Route::get('/delete/{id}',[FrequencyController::class,'destroy'])->name('delete');
    });


    Route::group(['as'=>'quantity.','prefix'=>'quantity'],function(){

        Route::get('/index',[QuantityController::class,'index'])->name('index');
        Route::get('/create',[QuantityController::class,'create'])->name('create');
        Route::post('/store',[QuantityController::class,'store'])->name('store');
        Route::get('/edit/{id}',[QuantityController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[QuantityController::class,'update'])->name('update');
        Route::get('/delete/{id}',[QuantityController::class,'destroy'])->name('delete');
    });

    Route::group(['as'=>'quantity.type.','prefix'=>'quantity/type'],function(){

        Route::get('/index',[QuantityTypeController::class,'index'])->name('index');
        Route::get('/create',[QuantityTypeController::class,'create'])->name('create');
        Route::post('/store',[QuantityTypeController::class,'store'])->name('store');
        Route::get('/edit/{id}',[QuantityTypeController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[QuantityTypeController::class,'update'])->name('update');
        Route::get('/delete/{id}',[QuantityTypeController::class,'destroy'])->name('delete');
    });

    Route::group(['as'=>'eatingtime.','prefix'=>'eating/time'],function(){

        Route::get('/index',[EatingTimeController::class,'index'])->name('index');
        Route::get('/create',[EatingTimeController::class,'create'])->name('create');
        Route::post('/store',[EatingTimeController::class,'store'])->name('store');
        Route::get('/edit/{id}',[EatingTimeController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[EatingTimeController::class,'update'])->name('update');
        Route::get('/delete/{id}',[EatingTimeController::class,'destroy'])->name('delete');
    });

    Route::group(['as'=>'advice.','prefix'=>'advice'],function(){

        Route::get('/index',[AdviceController::class,'index'])->name('index');
        Route::get('/create',[AdviceController::class,'create'])->name('create');
        Route::post('/store',[AdviceController::class,'store'])->name('store');
        Route::get('/edit/{id}',[AdviceController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[AdviceController::class,'update'])->name('update');
        Route::get('/delete/{id}',[AdviceController::class,'destroy'])->name('delete');
    });


    Route::group(['as'=>'medicinegroup.','prefix'=>'medicine/group'],function(){

        Route::get('/index',[MedicineGroupController::class,'index'])->name('index');
        Route::get('/create',[MedicineGroupController::class,'create'])->name('create');
        Route::post('/store',[MedicineGroupController::class,'store'])->name('store');
        Route::get('/edit/{id}',[MedicineGroupController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[MedicineGroupController::class,'update'])->name('update');
        Route::get('/delete/{id}',[MedicineGroupController::class,'destroy'])->name('delete');
    });

    Route::group(['as'=>'medicine.','prefix'=>'medicine'],function(){

        Route::get('/index',[MedicineController::class,'index'])->name('index');
        Route::get('/create',[MedicineController::class,'create'])->name('create');
        Route::post('/store',[MedicineController::class,'store'])->name('store');
        Route::get('/edit/{id}',[MedicineController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[MedicineController::class,'update'])->name('update');
        Route::get('/delete/{id}',[MedicineController::class,'destroy'])->name('delete');
    });


    Route::group(['as'=>'prescription.','prefix'=>'prescription'],function(){

        Route::get('/index',[PrescriptionController::class,'index'])->name('index');
        Route::get('/create',[PrescriptionController::class,'create'])->name('create');
        Route::post('/store',[PrescriptionController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PrescriptionController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[PrescriptionController::class,'update'])->name('update');
        Route::get('/delete/{id}',[PrescriptionController::class,'destroy'])->name('delete');

        // ajax route
        Route::get('patient/info/{id}',[PrescriptionController::class,'patient_info']);
        Route::get('medicine/info/{id}',[PrescriptionController::class,'medicine_info']);
    });



    Route::group(['as'=>'floor.','prefix'=>'floor','namespace'=>'Bed'],function(){

        Route::get('/index',[FloorController::class,'index'])->name('index');
        Route::post('/store',[FloorController::class,'store'])->name('store');
        Route::get('/edit/{id}',[FloorController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[FloorController::class,'update'])->name('update');
        Route::get('/delete/{id}',[FloorController::class,'destroy'])->name('delete');
    });
    
});


require __DIR__.'/auth.php';
