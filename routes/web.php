<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\AdminPasswordResetController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\PresentationController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Routes publiques
Route::get('/', [PresentationController::class, 'publicIndex'])->name('accueil');
Route::get('/experiences', [ExperienceController::class, 'publicIndex'])->name('experiences.index');
Route::get('/competences', [CompetenceController::class, 'publicIndex'])->name('competences.index');
Route::get('/formations', [FormationController::class, 'publicIndex'])->name('formations.index');

// Authentification admin
Route::middleware('guest')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.store');

    Route::get('/forgot-password', [AdminPasswordResetController::class, 'showForgotForm'])->name('password.request');
    Route::post('/forgot-password', [AdminPasswordResetController::class, 'sendResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [AdminPasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AdminPasswordResetController::class, 'reset'])->name('password.update');
});


Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware('auth')->name('logout');

// Routes admin protegees
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('presentations', PresentationController::class)->except(['show']);
    Route::resource('experiences', ExperienceController::class)->except(['show']);
    Route::resource('competences', CompetenceController::class)->except(['show']);
    Route::resource('formations', FormationController::class)->except(['show']);
});
