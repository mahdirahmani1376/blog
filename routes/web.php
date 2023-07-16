<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::prefix('/')->controller(PostsController::class)->group(function (){
    Route::get('/','index')->name('home');
    Route::get('/{post:slug}','show')->name('posts.view');
});

Route::controller(RegisterController::class)->prefix('register')->group(function (){
   Route::get('/signup','create')->name('users.register')->middleware('guest');
   Route::post('/create','store')->name('users.create')->middleware('guest');
});

Route::controller(SessionsController::class)->prefix('users')->group(function (){
    Route::get('/login/','create')->middleware('guest')->name('users.login');
    Route::post('/login','store')->name('users.store');
    Route::post('/logout','destroy')->name('users.logout')->middleware('auth');
});

Route::controller(PostCommentsController::class)->prefix('comments')->group(function (){
   Route::post('/{post:slug}/comments','store')->name('comments.store');
});

