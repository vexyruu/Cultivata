<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\TwoFactor;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\PotController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/garden', [PotController::class, 'index'])->name('garden');
    Route::get('/garden/create', [PotController::class, 'create'])->name('pots.create');
    Route::delete('/garden/{pot}', [PotController::class, 'destroy'])->name('pots.destroy');
    Route::post('/garden', [PotController::class, 'store'])->name('pots.store');
    Route::get('/garden/{pot}', [PotController::class, 'show'])->name('pots.show');

    Route::get('/plants', [PlantController::class, 'index'])->name('plants');
    Route::get('/plants/create', [PlantController::class, 'create'])->name('plants.create');
    Route::delete('/plants/{plant}', [PlantController::class, 'destroy'])->name('plants.destroy');
    Route::post('/plants', [PlantController::class, 'store'])->name('plants.store');
    Route::get('/plants/{plant}', [PlantController::class, 'show'])->name('plants.show');
    Route::post('/garden/{pot}/water', [PotController::class, 'water'])->name('pots.water');
    Route::post('/garden/{pot}/harvest', [PotController::class, 'harvest'])->name('pots.harvest');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('settings/two-factor', TwoFactor::class)
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
