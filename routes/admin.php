<?php
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\HomeBannerController;
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

Route::prefix('/admin')->group(function () {
Route::get('/banners', [HomeBannerController::class, 'index'])->name('admin.banners.index');
Route::get('/banners/create', [HomeBannerController::class, 'create'])->name('admin.banners.create');
Route::post('/banners/store', [HomeBannerController::class, 'store'])->name('admin.banners.store');
Route::get('/banners/edit/{id}', [HomeBannerController::class, 'edit'])->name('admin.banners.edit');
Route::put('/banners/update/{id}', [HomeBannerController::class, 'update'])->name('admin.banners.update');
Route::delete('/banners/{id}', [HomeBannerController::class, 'destroy'])->name('admin.banners.destroy');
});


Route::prefix('/admin')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});

