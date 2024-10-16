<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});


// Check database connection
use Illuminate\Support\Facades\DB;

Route::get('/db', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['status' => 'success', 'message' => 'Database connected successfully!']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Database connection failed: ' . $e->getMessage()]);
    }
});

// Routes for Tasks
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'save'])->name('tasks.save');
Route::get('/tasks/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'delete'])->name('tasks.delete');

// Routes for Categories
//use App\Http\Controllers\CategoryController;
