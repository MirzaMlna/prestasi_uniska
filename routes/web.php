<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/not-approved', function () {
    return view('auth.not-approved');
})->name('not_approved');

Route::middleware('auth')->group(function () {
    // ? Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //  ? User
    Route::resource('users', UserController::class);
    Route::post('/user/{id}/verify', [UserController::class, 'verify'])->name('user.verify');

    // ? Achievement
    Route::resource('achievements', AchievementController::class)->middleware('auth');
    Route::patch('/achievements/{id}/update-status', [AchievementController::class, 'updateStatus'])->name('achievements.updateStatus');
    Route::get('/achievements/print', [AchievementController::class, 'print'])->name('achievements.print');
});

require __DIR__ . '/auth.php';
