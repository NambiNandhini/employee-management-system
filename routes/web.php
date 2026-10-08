<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees', EmployeeController::class);

Route::get('/attendance', [\App\Http\Controllers\DashboardController::class, 'attendance'])->name('attendance');
Route::get('/departments', [\App\Http\Controllers\DashboardController::class, 'departments'])->name('departments');
Route::get('/designations', [\App\Http\Controllers\DashboardController::class, 'designations'])->name('designations');
Route::get('/leave-management', [\App\Http\Controllers\DashboardController::class, 'leaveManagement'])->name('leave-management');
Route::get('/payroll', [\App\Http\Controllers\DashboardController::class, 'payroll'])->name('payroll');
Route::get('/performance', [\App\Http\Controllers\DashboardController::class, 'performance'])->name('performance');
Route::get('/reports', [\App\Http\Controllers\DashboardController::class, 'reports'])->name('reports');
Route::get('/settings', [\App\Http\Controllers\DashboardController::class, 'settings'])->name('settings');
