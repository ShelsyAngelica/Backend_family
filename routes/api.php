<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

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

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('auth.logout');
    Route::get('/friend-secret', [AuthController::class, 'getAuthenticatedUser'])->middleware('auth:sanctum');
    Route::get('/check', [AuthController::class, 'check'])->name('auth.check');
    Route::put('/user-has-city', [UserController::class, 'storeAssociation']);
    Route::get('/associations', [UserController::class, 'getCityAssociations']);
    Route::put('/delete-associations', [UserController::class, 'deleteAllAssociations']);

});

// Rutas de ciudades y ruleta
Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
