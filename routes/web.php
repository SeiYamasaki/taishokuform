<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JudgmentController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ConsentController;
use App\Http\Controllers\ConfirmationController;

Route::get('/judgment', [JudgmentController::class, 'show'])->name('judgment.show');
Route::post('/judgment', [JudgmentController::class, 'submit'])->name('judgment.submit');

Route::get('/form', [FormController::class, 'show'])->name('form.show');
Route::post('/form', [FormController::class, 'submit'])->name('form.submit');

Route::get('/consent', [ConsentController::class, 'show'])->name('consent.show');
Route::post('/consent', [ConsentController::class, 'submit'])->name('consent.submit');

Route::post('/confirmation', [ConfirmationController::class, 'show'])->name('confirmation.show');
Route::post('/submit-final', [ConfirmationController::class, 'submitFinal'])->name('confirmation.submitFinal');

Route::get('/denied', function () {
    return view('denied');
})->name('denied');
