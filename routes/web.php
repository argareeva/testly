<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Public visible routes
Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::get('applications/{application}',[\App\Http\Controllers\ApplicationController::class, 'show'])->name('applications.show');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Authenticated routes
require __DIR__.'/auth.php';
Route::prefix('user')->name('user.')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('applications', App\Http\Controllers\User\ApplicationController::class);
    Route::resource('categories', App\Http\Controllers\User\CategoryController::class);
    Route::get('applications/{id}/publish', \App\Http\Controllers\User\ApplicationPublishController::class)->name('applications.publish');
    Route::get('applications/{application}/feedback', [\App\Http\Controllers\User\FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('applications/{application}/feedback', [\App\Http\Controllers\User\FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('tested', [\App\Http\Controllers\User\TestedController::class, 'index'])->name('tested.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
