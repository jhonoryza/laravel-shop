<?php

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

Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class)->only(['index', 'show']);
Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class)->only(['index', 'show']);
