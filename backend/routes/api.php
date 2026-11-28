<?php

use App\Http\Controllers\AdminApiController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('api.admin.')->group(function (): void {
    Route::post('/login', [AdminAuthController::class, 'login'])
        ->middleware('throttle:10,1')
        ->name('login');

    Route::middleware(['auth:sanctum', 'abilities:admin', 'role:admin'])->group(function (): void {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/me', [AdminApiController::class, 'me'])->name('me');
        Route::get('/dashboard', [AdminApiController::class, 'dashboard'])->name('dashboard');

        Route::get('/users', [AdminApiController::class, 'users'])->name('users.index');
        Route::post('/users', [AdminApiController::class, 'storeUser'])->name('users.store');
        Route::get('/users/{user}', [AdminApiController::class, 'showUser'])->name('users.show');
        Route::put('/users/{user}', [AdminApiController::class, 'updateUser'])->name('users.update');
        Route::patch('/users/{user}', [AdminApiController::class, 'updateUser'])->name('users.patch');
        Route::delete('/users/{user}', [AdminApiController::class, 'deleteUser'])->name('users.destroy');

        Route::get('/challenges', [AdminApiController::class, 'challenges'])->name('challenges.index');
        Route::post('/challenges', [AdminApiController::class, 'storeChallenge'])->name('challenges.store');
        Route::get('/challenges/{challenge}', [AdminApiController::class, 'showChallenge'])->name('challenges.show');
        Route::put('/challenges/{challenge}', [AdminApiController::class, 'updateChallenge'])->name('challenges.update');
        Route::patch('/challenges/{challenge}', [AdminApiController::class, 'updateChallenge'])->name('challenges.patch');
        Route::delete('/challenges/{challenge}', [AdminApiController::class, 'deleteChallenge'])->name('challenges.destroy');

        Route::get('/appointments', [AdminApiController::class, 'appointments'])->name('appointments.index');
        Route::post('/appointments', [AdminApiController::class, 'storeAppointment'])->name('appointments.store');
        Route::get('/appointments/{appointment}', [AdminApiController::class, 'showAppointment'])->name('appointments.show');
        Route::put('/appointments/{appointment}', [AdminApiController::class, 'updateAppointment'])->name('appointments.update');
        Route::patch('/appointments/{appointment}', [AdminApiController::class, 'updateAppointment'])->name('appointments.patch');
        Route::delete('/appointments/{appointment}', [AdminApiController::class, 'deleteAppointment'])->name('appointments.destroy');

        Route::get('/shop-items', [AdminApiController::class, 'items'])->name('items.index');
        Route::post('/shop-items', [AdminApiController::class, 'storeItem'])->name('items.store');
        Route::get('/shop-items/{item}', [AdminApiController::class, 'showItem'])->name('items.show');
        Route::put('/shop-items/{item}', [AdminApiController::class, 'updateItem'])->name('items.update');
        Route::patch('/shop-items/{item}', [AdminApiController::class, 'updateItem'])->name('items.patch');
        Route::delete('/shop-items/{item}', [AdminApiController::class, 'deleteItem'])->name('items.destroy');

        Route::get('/evaluations', [AdminApiController::class, 'evaluations'])->name('evaluations.index');
        Route::get('/reports', [AdminApiController::class, 'reports'])->name('reports.index');
        Route::get('/settings', [AdminApiController::class, 'settings'])->name('settings.index');
    });
});
