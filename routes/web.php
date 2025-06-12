<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;   
use App\Http\Controllers\LandingController;

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ShiftController;
use App\Http\Controllers\Admin\ScheduleController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [LandingController::class, 'index'])->name('landing');

// Route::middleware('auth')->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // Route::resource('employees', EmployeeController::class);
    Route::resource('shifts', ShiftController::class);
    Route::resource('schedules', ScheduleController::class);

    

});

// EMPLOYEES
Route::get('employees/create', [EmployeeController::class, 'index'])->name('admin.employees.create');
Route::post('employees', [EmployeeController::class, 'store'])->name('admin.employees.store');

Route::delete('admin/employees/{id}', [EmployeeController::class, 'destroy'])->name('admin.employees.destroy');

// SHIFTS
Route::get('shifts/create', [ShiftController::class, 'index'])->name('admin.shifts.create');
Route::post('shifts', [ShiftController::class, 'store'])->name('admin.shifts.store');

// SCHEDULES
Route::get('schedules/create', [ScheduleController::class, 'create'])->name('admin.schedules.create');
Route::post('schedules', [ScheduleController::class, 'store'])->name('admin.schedules.store');