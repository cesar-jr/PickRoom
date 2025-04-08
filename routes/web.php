<?php

use App\Http\Controllers\PollController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/polls/list', [PollController::class, 'list'])->name('polls.list');
    Route::post('/vote/{poll}/store', [VoteController::class, 'store'])->name('vote.store');
});

Route::get('/vote/login', [VoteController::class, 'redirectLogin'])->name('vote.login');
Route::get('/vote/{poll}', [VoteController::class, 'create'])->name('vote.create');

Route::resource('polls', PollController::class)
    ->only(['index', 'create', 'store', 'update', 'show'])
    ->middleware(['auth']);

require __DIR__ . '/auth.php';

// survey hub é um nome legal, ou vote hub, ou poll connect, ou combinações dessas