<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return redirect('game');
});

Route::get('/game', [GameController::class, 'index'])->name('game.index');
Route::post('/game/submit', [GameController::class, 'submit'])->name('game.submit');
Route::post('/game/save-point', [GameController::class, 'savePoint'])->name('game.savePoint');
Route::post('/game/restart', [GameController::class, 'restart'])->name('game.restart');

