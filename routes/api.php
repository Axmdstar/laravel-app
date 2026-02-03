<?php

use App\Http\Controllers\quizcontroller;
use Illuminate\Support\Facades\Route;

// Route::post('/quizzes', [quizcontroller::class, 'create']);
Route::post('/quizzes', [quizcontroller::class, 'create'])->name('quizzes.store');
