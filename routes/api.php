<?php

use Illuminate\Support\Facades\Route;
use Presentation\Auth\Controller\LoginController;
use Presentation\Auth\Controller\RegisterController;
use Presentation\Comment\CreateCommentController;
use Presentation\Publication\Controller\CreatePublicationController;
use Presentation\Publication\Controller\DeleteAllPublications;
use Presentation\Publication\Controller\DeleteOwnPublication;
use Presentation\Publication\Controller\UpdatePublicationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('post')->group(function () {
        Route::post('create', CreatePublicationController::class)->name('post.create');
        Route::put('update/{publication}', UpdatePublicationController::class)->name('post.update');
        Route::delete('delete/{publication}', DeleteOwnPublication::class)->name('post.delete');
        Route::delete('delete', DeleteAllPublications::class)->name('post.delete-all')->middleware('role:admin');
    });

    Route::prefix('comment')->group(function () {
        Route::post('create', CreateCommentController::class)->name('comment.create');
    });
});

Route::post('login', LoginController::class)->name('login');
Route::post('register', RegisterController::class)->name('register');
