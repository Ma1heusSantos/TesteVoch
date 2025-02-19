<?php

use App\Http\Controllers\EconomicGroupController;
use App\Http\Controllers\FlagController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::prefix('economicGroup')->group(function () {
        Route::get('/show', [EconomicGroupController::class, 'show'])->name('economicGroup.show');
        Route::get('/create', [EconomicGroupController::class, 'create'])->name('economicGroup.create');
        Route::get('/edit/{id}', [EconomicGroupController::class, 'edit'])->name('economicGroup.edit');
        Route::get('/destroy/{id}', [EconomicGroupController::class, 'destroy'])->name('economicGroup.destroy');    
    });

    Route::prefix('flag')->group(function () {
        Route::get('/show', [FlagController::class, 'show'])->name('flag.show');
        Route::get('/create', [FlagController::class, 'create'])->name('flag.create');
        Route::get('/edit/{id}', [FlagController::class, 'edit'])->name('flag.edit');
        Route::get('/destroy/{id}', [FlagController::class, 'destroy'])->name('flag.destroy');    
    });

    Route::prefix('unit')->group(function () {
        Route::get('/show', [UnitController::class, 'show'])->name('unit.show');
        Route::get('/create', [UnitController::class, 'create'])->name('unit.create');
        Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
        Route::get('/destroy/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');    
    });

    Route::prefix('collaborator')->group(function () {
        Route::get('/show', [UnitController::class, 'show'])->name('collaborator.show');
        Route::get('/create', [UnitController::class, 'create'])->name('collaborator.create');
        Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('collaborator.edit');
        Route::get('/destroy/{id}', [UnitController::class, 'destroy'])->name('collaborator.destroy');    
    });
});

require __DIR__.'/auth.php';