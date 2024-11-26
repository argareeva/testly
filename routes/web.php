<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Public visible routes
Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::get('applications', [\App\Http\Controllers\ApplicationController::class, 'index'])->name('applications.index');
Route::get('applications/{application}',[\App\Http\Controllers\ApplicationController::class, 'show'])->name('applications.show');
Route::get('/applications/{application}/feedback', [App\Http\Controllers\FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/applications/{application}/feedback', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');

//Authenticated routes
require __DIR__.'/auth.php';
Route::name('user.')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('user/applications', App\Http\Controllers\User\ApplicationController::class);
    Route::get('user/applications/{id}/publish', \App\Http\Controllers\User\ApplicationPublishController::class)->name('applications.publish');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
