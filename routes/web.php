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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('threads', [App\Http\Controllers\ThreadsController::class, 'index']);
Route::get('threads/create', [App\Http\Controllers\ThreadsController::class, 'create']);
Route::get('threads/{channel}/{thread}', [App\Http\Controllers\ThreadsController::class, 'show']);
Route::get('threads/{channel}', [App\Http\Controllers\ThreadsController::class, 'index']);
Route::delete('threads/{channel}/{thread}', [App\Http\Controllers\ThreadsController::class, 'destroy']);
Route::post('threads', [App\Http\Controllers\ThreadsController::class, 'store']);

Route::post('/threads/{channel}/{thread}/replies', [App\Http\Controllers\RepliesController::class, 'store']);
Route::patch('/replies/{reply}',[App\Http\Controllers\RepliesController::class, 'update']);
Route::delete('/replies/{reply}', [App\Http\Controllers\RepliesController::class, 'destroy']);

Route::post('replies/{reply}/favorites', [App\Http\Controllers\FavoritesController::class, 'store']);
Route::delete('/replies/{reply}/favorites', [App\Http\Controllers\FavoritesController::class, 'destroy']);

Route::get('/profiles/{user}', [App\Http\Controllers\ProfilesController::class, 'show'])->name('profile');

