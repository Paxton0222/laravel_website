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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts', App\Http\Controllers\API\PostAPIController::class);


Route::resource('categories', App\Http\Controllers\API\categoryAPIController::class);


Route::resource('tags', App\Http\Controllers\API\TagsAPIController::class);
