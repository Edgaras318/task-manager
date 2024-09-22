<?php

use App\Http\Controllers\EntityController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntityLogController;

Route::get('/entity-logs', [EntityLogController::class, 'all']);

Route::prefix('entities')->group(function () {
    // CRUD routes for Entities (Tasks and Bugs)
    Route::get('/', [EntityController::class, 'all']); // List all entities
    Route::post('/', [EntityController::class, 'store']); // Create a new entity
    Route::get('/{id}', [EntityController::class, 'show']); // Get a specific entity
    Route::put('/{id}', [EntityController::class, 'update']); // Update a specific entity
    Route::delete('/{id}', [EntityController::class, 'destroy']); // Soft delete a specific entity

    Route::put('{id}/status', [EntityController::class, 'changeStatus']);
    Route::put('{id}/type', [EntityController::class, 'changeType']);
    Route::post('{entityId}/comments', [EntityController::class, 'addComment']);
});

Route::prefix('entities/{entityId}/comments')->group(function () {
    // Routes for Comments associated with Entities
    Route::get('/', [CommentController::class, 'index']); // Get comments for a specific entity
    Route::post('/', [CommentController::class, 'store']); // Add a new comment to a specific entity
//    Route::put('/{id}', [CommentController::class, 'update']); // Update a specific comment
//    Route::delete('/{id}', [CommentController::class, 'destroy']); // Soft delete a specific comment
});
