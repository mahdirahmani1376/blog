<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
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

Route::controller(RegisterController::class)->group(function (){
   Route::get('/register/signup','create')->name('users.register');
   Route::post('/register/create','store')->name('users.create');
});
