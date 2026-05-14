<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\VisitController;

use App\Http\Controllers\MedicineController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('student.dashboard');
    })->name('dashboard');

    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Visits
        Route::get('/visits', [VisitController::class, 'index'])->name('visits.index');
        Route::get('/visits/create', [VisitController::class, 'create'])->name('visits.create');
        Route::post('/visits', [VisitController::class, 'store'])->name('visits.store');
        Route::get('/visits/{visit}/edit', [VisitController::class, 'edit'])->name('visits.edit');
        Route::patch('/visits/{visit}', [VisitController::class, 'update'])->name('visits.update');
        Route::delete('/visits/{visit}', [VisitController::class, 'destroy'])->name('visits.destroy');

        // Inventory
        Route::resource('inventory', MedicineController::class);
    });

    // Student Routes
    Route::middleware(['role:student'])->prefix('student')->name('student.')->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
        
        // Visits
        Route::get('/visits/history', [VisitController::class, 'studentHistory'])->name('visits.history');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
