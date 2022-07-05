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
    Route::post('/store',[App\Http\Controllers\UserController::class, 'store'])->name('users.store');
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

//add labtest
Route::group([ 'prefix' => 'labtest', 'middleware' => 'auth'], function() {
    Route::post('/update/{id}',[App\Http\Controllers\ReqLabController::class, 'update'])->name('req_lab.update');
});

//labtest viewer
Route::get('/labtest/preview', function () {
    return view('labtestviewer.labtestview');

})->name('labtest.preview');

//Inventory
Route::group([ 'prefix' => 'inventory', 'middleware' => 'auth'], function() {
    Route::get('index',[App\Http\Controllers\InventoryController::class, 'index'])->name('inventory.index');
});

//medecine category
Route::group([ 'prefix' => 'medicine_category', 'middleware' => 'auth'], function() {

    Route::post('/store',[App\Http\Controllers\MedicineCategoryController::class, 'store'])->name('medicine_category.store');
    Route::put('/update/{id}',[App\Http\Controllers\MedicineCategoryController::class, 'update'])->name('medicine_category.update');   
});

//medecine 
Route::group([ 'prefix' => 'medicine', 'middleware' => 'auth'], function() {
    Route::get('/index',[App\Http\Controllers\MedicineController::class, 'index'])->name('medicine.index');
    Route::post('/store',[App\Http\Controllers\MedicineController::class, 'store'])->name('medicine.store');
    Route::put('/update/{id}',[App\Http\Controllers\MedicineController::class, 'update'])->name('medicine.update');
});

//supply
Route::group([ 'prefix' => 'supply', 'middleware' => 'auth'], function() {

    Route::post('/store',[App\Http\Controllers\SupplyController::class, 'store'])->name('supply.store');
    Route::put('/update/{id}',[App\Http\Controllers\SupplyController::class, 'update'])->name('supply.update');
});

//reports
Route::group([ 'prefix' => 'Reports', 'middleware' => 'auth'], function() {


    //top10data report
    Route::get('top10data/index',[App\Http\Controllers\Top10reportController::class, 'index'])->name('top10data.index');


    //monthly report
    Route::get('monthlyreport/index',[App\Http\Controllers\MonthlyreportController::class, 'index'])->name('monthlyreport.index');


    //nurse assestment report
    Route::get('nurse_assestment/index',[App\Http\Controllers\NurseAssestmentreportController::class, 'index'])->name('nurse_assestment_report.index');


    //physician report
    Route::get('physician_report/index',[App\Http\Controllers\PhysicianreportController::class, 'index'])->name('physician_report.index');
    Route::post('physician_report/search',[App\Http\Controllers\PhysicianreportController::class, 'search'])->name('physician_report.search');
    
    
    //daily_medication_consumption_report
    Route::get('daily_medication_consumption/index',[App\Http\Controllers\DailyMedicationConsumptionreportController::class, 'index'])->name('daily_medication_report.index');


    //deliveryreport_report
    Route::get('delivery_report/index',[App\Http\Controllers\MedicineSupplyDeliveryreportController::class, 'index'])->name('delivery_report.index');
});







Route::get('/', function () {
    return view('welcome');
});




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
