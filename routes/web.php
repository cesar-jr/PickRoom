<?php

use App\Http\Controllers\PollController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/polls/list', [PollController::class, 'list'])->name('polls.list');
});

Route::resource('polls', PollController::class)
    ->only(['index', 'create', 'store', 'edit', 'update'])
    ->middleware(['auth']);

Route::get('/vote', function () {
    return view('poll.basic');
});

Route::get('/poll-list', function () {
    return view('poll.list');
});
Route::get('/poll-result', function () {
    return view('poll.result');
});

require __DIR__ . '/auth.php';

// survey hub é um nome legal, ou vote hub, ou poll connect, ou combinações dessas