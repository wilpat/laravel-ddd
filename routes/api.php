<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('properties')->as('property.')->group(function () {
    Route::post('/', App\Http\Controllers\Api\Property\CreateController::class)->name('create');
    Route::get('/', App\Http\Controllers\Api\Property\FetchController::class)->name('all');

    Route::post('/batch', App\Http\Controllers\Api\Property\BatchCreationController::class)->name('batch.create');
});
