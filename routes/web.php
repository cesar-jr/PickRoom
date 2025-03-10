<?php

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
});

Route::get('/vote', function () {
    return view('poll.basic');
});
Route::get('/poll-create', function () {
    class Teste
    {
        function get($label)
        {
            $teste = [
                // 'email' => ["haha", "oh well"]
            ];
            return $teste[$label] ?? [];
        }
    }
    $stdObj = new Teste;
    $data = [
        'errors' => $stdObj
    ];
    return view('poll.create', $data);
});
Route::get('/poll-list', function () {
    return view('poll.list');
});

require __DIR__ . '/auth.php';
