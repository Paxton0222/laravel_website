<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function () {return view('index');})->name("index");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('posts', App\Http\Controllers\PostController::class);


Route::resource('categories',  App\Http\Controllers\categoryController::class);


Route::resource('tags', App\Http\Controllers\TagsController::class);
