<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VignetteController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\ConfirmPasswordController;
// use App\Http\Controllers\Auth\VerificationController;
// use App\Http\Controllers\Auth\ForgotPasswordController;
// use App\Http\Controllers\Auth\ResetPasswordController;

// Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes des vignettes
Route::get('/vignettes', [VignetteController::class, 'index'])->name('vignettes.index');
Route::get('/vignettes/create', [VignetteController::class, 'create'])->name('vignettes.create');
