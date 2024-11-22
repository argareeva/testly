<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');
Route::get('applications', [\App\Http\Controllers\ApplicationController::class, 'index'])->name('applications.index');
Route::get('applications/{id}',[\App\Http\Controllers\ApplicationController::class, 'show'])->name('applications.show');
