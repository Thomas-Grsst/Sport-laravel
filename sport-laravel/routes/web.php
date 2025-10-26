<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;

Route::get('/', [ExerciseController::class, 'index'])->name('index');
Route::resource('exercices', ExerciseController::class)->except(['index']);