<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
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
})->name('home');

Route::prefix('/posts')->controller(PostsController::class)->group(function (){
    Route::get('/','index')->name('posts.view_any');
    Route::get('/{post:slug}','show')->name('posts.view');
});

Route::prefix('/categories')->controller(CategoriesController::class)->group(function (){
   Route::get('/{category:slug}','show')->name('categories.view');
});
