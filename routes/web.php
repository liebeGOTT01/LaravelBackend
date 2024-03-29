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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::post('/follow/{user}', [App\Http\Controllers\FollowController::class, 'store'])->name('follow');

Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('index');
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store'])->name('store');
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts');
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('showPost');

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');


