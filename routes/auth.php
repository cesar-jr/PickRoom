<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('old_login', [AuthenticatedSessionController::class, 'create']);

    Route::view('login', 'auth.login-oauth')->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/auth/{provider}', [AuthenticatedSessionController::class, 'oAuthRedirect'])->name('oauth.redirect');

    Route::get('/auth/{provider}/callback', [AuthenticatedSessionController::class, 'oAuthCallback']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
