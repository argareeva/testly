<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

//Public visible routes
Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::get('applications', [\App\Http\Controllers\ApplicationController::class, 'index'])->name('applications.index');
Route::get('applications/{application}',[\App\Http\Controllers\ApplicationController::class, 'show'])->name('applications.show');
Route::get('/applications/{application}/feedback', [App\Http\Controllers\FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/applications/{application}/feedback', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');

//Authenticated routes
Route::name('user.')->group(function() {
    Route::resource('user/applications', App\Http\Controllers\User\ApplicationController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
