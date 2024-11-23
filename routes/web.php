<?php

use Illuminate\Support\Facades\Route;

//Public visible routes
Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::get('applications', [\App\Http\Controllers\ApplicationController::class, 'index'])->name('applications.index');
Route::get('applications/{id}',[\App\Http\Controllers\ApplicationController::class, 'show'])->name('applications.show');

//Authenticated routes
Route::name('user.')->group(function() {
    Route::resource('user/applications', App\Http\Controllers\User\ApplicationController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
