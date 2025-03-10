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
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\AdminMiddleware;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
});


// Routes publiques
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->to(auth()->user()->isAdmin() ? '/admin' : '/user');
    }
    return view('home');
});

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

    // Souhaits
    Route::resource('wishes', WishController::class)->except(['index', 'create', 'edit', 'show']);
});

// Routes administration
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name("admin");
    Route::get('users', [UserController::class, 'index'])->name('admin.users.show');
    Route::patch('users/{user}/role', [UserController::class, 'updateRole'])->name('admin.users.update-role');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::resource('categories', CategoryController::class)
         ->names('admin.categories')
         ->except(['show', 'edit', 'create']);
});

