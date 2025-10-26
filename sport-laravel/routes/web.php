<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;

Route::get('/', [ExerciseController::class, 'index'])->name('index');
Route::get('/create', [ExerciseController::class, 'create'])->name('create');
Route::post('/store', [ExerciseController::class, 'store'])->name('store');
Route::get('/show/{exercice}', [ExerciseController::class, 'show'])->name('show');
Route::get('/edit/{exercice}', [ExerciseController::class, 'edit'])->name('edit');
Route::put('/update/{exercice}', [ExerciseController::class, 'update'])->name('update');
Route::delete('/delete/{exercice}', [ExerciseController::class, 'destroy'])->name('delete');