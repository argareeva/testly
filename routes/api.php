<?php

use Illuminate\Support\Facades\Route;

Route::name('api.')->group( function() {
    Route::get('applications', [\App\Http\Controllers\Api\ApplicationController::class, 'index'] )->name('applications.index');
    Route::get('applications/{id}', [\App\Http\Controllers\Api\ApplicationController::class, 'show'] )->name('applications.show');
    Route::get('authors', [\App\Http\Controllers\Api\AuthorController::class, 'index'] )->name('authors.index');
    Route::get('authors/{id}', [\App\Http\Controllers\Api\AuthorController::class, 'show'] )->name('authors.show');
    Route::get('categories', [\App\Http\Controllers\Api\CategoryController::class, 'index'] )->name('categories.index');
    Route::get('categories/{id}', [\App\Http\Controllers\Api\CategoryController::class, 'show'] )->name('categories.show');
});
