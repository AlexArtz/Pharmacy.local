<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\PharmacyController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');

Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Public drug routes
Route::resource('drugs', DrugController::class)->names([
    'index' => 'drugs.index',
    'show' => 'drugs.show',
    'create' => 'drugs.create',
    'store' => 'drugs.store',
    'edit' => 'drugs.edit',
    'update' => 'drugs.update',
    'destroy' => 'drugs.destroy',
]);

Route::get('/pharmacy/{pharmacy_id}', [PharmacyController::class, 'show'])->name('pharmacy.show');

// Admin drug routes
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/drugs', [DrugController::class, 'adminIndex'])->name('admin.drugs.index');
    Route::get('/drugs/create', [DrugController::class, 'create'])->name('admin.drugs.create');
    Route::post('/drugs', [DrugController::class, 'store'])->name('admin.drugs.store');
    Route::get('/drugs/{drug}/edit', [DrugController::class, 'edit'])->name('admin.drugs.edit');
    Route::put('/drugs/{drug}', [DrugController::class, 'update'])->name('admin.drugs.update');
    Route::delete('/drugs/{drug}', [DrugController::class, 'destroy'])->name('admin.drugs.destroy');
});

require __DIR__.'/auth.php';