<?php
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\TaskController;
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

Route::prefix('/admin')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // List all tasks
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Create task form
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Edit task form
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update'); // Update task
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Store task
    Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show'); // Show task details
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete task
});
