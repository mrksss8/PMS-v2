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

//dashboard
Route::group([ 'prefix' => 'dashboard', 'middleware' => 'auth'], function() {
    Route::get('/index',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
});

/////////////////////////////////////////// USER MANAGEMENT//////////////////////////////////////////////////////

//Users
Route::group([ 'prefix' => 'users', 'middleware' => 'auth'], function() {
    Route::get('/index',[App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::delete('/destroy/{id}',[App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/update/{id}',[App\Http\Controllers\UserController::class, 'update'])->name('users.update');   
});

//Roles
Route::group([ 'prefix' => 'roles', 'middleware' => 'auth'], function() {
    Route::get('/index',[App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::post('/store',[App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::delete('/destroy/{id}',[App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');   
});

//Departments
Route::group([ 'prefix' => 'departments', 'middleware' => 'auth'], function() {
    Route::get('/index',[App\Http\Controllers\DepartmentController::class, 'index'])->name('departments.index');
    Route::post('/store',[App\Http\Controllers\DepartmentController::class, 'store'])->name('departments.store');
    Route::delete('/destroy/{id}',[App\Http\Controllers\DepartmentController::class, 'destroy'])->name('departments.destroy');
    Route::put('/update/{id}',[App\Http\Controllers\DepartmentController::class, 'update'])->name('departments.update');   
});


/////////////////////////////////////////// PATIENT MANAGEMENT///////////////////////////////////////////////////

//Patient List
Route::group([ 'prefix' => 'patients', 'middleware' => 'auth'], function() {
    Route::get('/index',[App\Http\Controllers\PatientController::class, 'index'])->name('patients.index');
    Route::post('/store',[App\Http\Controllers\PatientController::class, 'store'])->name('patients.store');
    Route::get('/show/{id}',[App\Http\Controllers\PatientController::class, 'show'])->name('patients.show');
});

//Consultation
Route::group([ 'prefix' => 'consultation', 'middleware' => 'auth'], function() {
    Route::post('/store',[App\Http\Controllers\ConsultationController::class, 'store'])->name('consultation.store');
});

//intervention
Route::group([ 'prefix' => 'nurse_intervention', 'middleware' => 'auth'], function() {
    Route::get('/show/{id}',[App\Http\Controllers\NurseInterventionController::class, 'show'])->name('nurse_intervention.show');
    Route::post('/store',[App\Http\Controllers\NurseInterventionController::class, 'store'])->name('nurse_intervention.store');
});

//doctor-Intervention
Route::group([ 'prefix' => 'doctor-intervention', 'middleware' => 'auth'], function() {
    Route::get('index',[App\Http\Controllers\DoctorInterventionController::class, 'index'])->name('doctor_intervention.index');
    Route::get('/show/{id}',[App\Http\Controllers\DoctorInterventionController::class, 'show'])->name('doctor_intervention.show');
    Route::post('/store',[App\Http\Controllers\DoctorInterventionController::class, 'store'])->name('doctor_intervention.store');
});

//patient-diagnosis
Route::group([ 'prefix' => 'patient-diagnosis', 'middleware' => 'auth'], function() {
    Route::post('/store',[App\Http\Controllers\PatientDiagnosisController::class, 'store'])->name('patient_diagnosis.store');
});

//medical-record
Route::group([ 'prefix' => 'medical_record', 'middleware' => 'auth'], function() { 
    Route::get('/show/{id}',[App\Http\Controllers\MedicalRecordsController::class, 'show'])->name('medical_records.show');
});
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
