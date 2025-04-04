<?php

use App\Exports\AchievementExport;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Imports\AchievementImport;
use App\Models\Achievement;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/not-approved', function () {
    return view('auth.not-approved');
})->name('not_approved');

Route::get('/achievement-export', function () {
    return Excel::download(new AchievementExport, 'prestasi_mahasiswa.xlsx');
});
Route::post('/achievement-import', function () {
    Excel::import(new AchievementImport, request()->file('prestasi_mahasiswa'));
    return 'Berhasil mengimpor data prestasi!';
});

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
});

require __DIR__ . '/auth.php';
