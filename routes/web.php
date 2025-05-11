<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PublicCardController;
use App\Http\Controllers\AdminCardController;
use App\Http\Middleware\AdminMiddleware;


Route::get('/', function () {
    return redirect('/explore');
});


Route::get('/explore', [PublicCardController::class, 'index'])->name('explore');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('cards', CardController::class);
});


Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/cards', [AdminCardController::class, 'index'])->name('admin.cards.index');
    Route::patch('/cards/{card}/resize', [AdminCardController::class, 'resize'])->name('admin.cards.resize');
    Route::delete('/cards/{card}', [AdminCardController::class, 'destroy'])->name('admin.cards.destroy');
});


require __DIR__ . '/auth.php';
