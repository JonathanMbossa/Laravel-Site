<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'editForm'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('equipes', App\Http\Controllers\EquipeController::class);
    Route::resource('joueurs', App\Http\Controllers\JoueurController::class);
    Route::resource('basket_matches', App\Http\Controllers\BasketMatchController::class);
    Route::resource('statistiques', App\Http\Controllers\StatistiqueController::class);
    Route::resource('entraineurs', App\Http\Controllers\EntraineurController::class);
});

require __DIR__.'/auth.php';
