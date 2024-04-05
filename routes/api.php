<?php

use Illuminate\Support\Facades\Route;
use Presentation\Auth\Controller\LoginController;
use Presentation\Auth\Controller\RegisterController;
use Presentation\Publication\Controller\CreatePublicationController;

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
    });
});

Route::post('login', LoginController::class)->name('login');
Route::post('register', RegisterController::class)->name('register');
