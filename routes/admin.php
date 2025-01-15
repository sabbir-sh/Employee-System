<?php
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::prefix('/admin')->group(function () {
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit'); // Edit route
    Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('employee.update'); // Update route
    Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});
