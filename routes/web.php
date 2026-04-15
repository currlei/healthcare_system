<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('welcome'); });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Resource Routes
Route::resource('patients', PatientController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('medications', MedicationController::class);
});

// ADMIN ONLY 
Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::patch('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
});

require __DIR__.'/auth.php';
