<?php

use App\Http\Controllers\V1\Auth\AuthController;
use App\Http\Controllers\V1\User\UserBalanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    Route::prefix('user')->name('user.')->group(function () {

        Route::prefix('balance')->name('balance.')->group(function () {

            Route::get('/{walletId}', [UserBalanceController::class, 'info'])->name('show');
            Route::put('/{walletId}', [UserBalanceController::class, 'update'])->name('update');

        });

    });

    Route::post('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
