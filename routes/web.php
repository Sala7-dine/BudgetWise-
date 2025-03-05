<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('dashboard/admin');
})->name("admin");


Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/user', [DashboardController::class, 'index'])->name('user.dashboard');
    
    // Salary route
    Route::patch('/user/salary', [SalaryController::class, 'update'])->name('user.salary.update');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.show');
    Route::patch('/admin/users/{user}/role', [UserController::class, 'updateRole'])->name('admin.users.update-role');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::resource('admin/categories', CategoryController::class)
         ->names('admin.categories')
         ->except(['show', 'edit', 'create']);
// });

Route::middleware(['auth'])->group(function () {
    // Route pour la mise à jour du salaire
    Route::patch('/user/salary', [SalaryController::class, 'update'])->name('user.salary.update');
});
