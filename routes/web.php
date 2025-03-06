<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\RecurringExpenseController;
use App\Http\Controllers\ExpenseController;

// Routes publiques
Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('dashboard/admin');
})->name("admin");

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/user', [DashboardController::class, 'index'])->name('user.dashboard');
    
    // Gestion du salaire
    Route::patch('/user/salary', [SalaryController::class, 'update'])->name('user.salary.update');
    
    // Dépenses récurrentes
    Route::prefix('recurring-expenses')->name('recurring-expenses.')->group(function () {
        Route::post('/', [RecurringExpenseController::class, 'store'])->name('store');
        Route::patch('/{recurringExpense}', [RecurringExpenseController::class, 'update'])->name('update');
        Route::delete('/{recurringExpense}', [RecurringExpenseController::class, 'destroy'])->name('destroy');
    });
    
    // Dépenses ponctuelles
    Route::prefix('expenses')->name('expenses.')->group(function () {
        Route::post('/', [ExpenseController::class, 'store'])->name('store');
        Route::delete('/{expense}', [ExpenseController::class, 'destroy'])->name('destroy');
    });

    // Objectifs d'épargne
    Route::prefix('goals')->name('goals.')->group(function () {
        Route::post('/', [GoalController::class, 'store'])->name('store');
        Route::patch('/{goal}', [GoalController::class, 'update'])->name('update');
        Route::delete('/{goal}', [GoalController::class, 'destroy'])->name('destroy');
    });
});

// Routes administration
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.show');
    Route::patch('users/{user}/role', [UserController::class, 'updateRole'])->name('users.update-role');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('categories', CategoryController::class)
         ->names('categories')
         ->except(['show', 'edit', 'create']);
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
