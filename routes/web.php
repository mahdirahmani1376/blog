<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\MailChimpController;
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
    Route::get('admin/posts/create','create')->name('posts.create')->middleware(['admin','auth']);
    Route::post('/admin/posts','store')->name('posts.store')->middleware(['admin','auth']);
});

Route::controller(RegisterController::class)->prefix('register')->group(function (){
   Route::get('/signup','create')->name('users.register')->middleware('guest');
   Route::post('/create','store')->name('users.create')->middleware('guest');
});

Route::controller(SessionsController::class)->prefix('users')->group(function (){
    Route::get('/login/','create')->middleware('guest')->name('login');
    Route::post('/login','store')->name('users.store');
    Route::post('/logout','destroy')->name('users.logout')->middleware('auth');
});

Route::controller(PostCommentsController::class)->prefix('comments')->group(function (){
   Route::post('/{post:slug}/comments','store')->name('comments.store');
});

Route::controller(MailChimpController::class)->prefix('mail-chimp')->group(function (){
   Route::get('/ping','ping')->name('mail-chimp.ping');
   Route::post('/newsletter','signUp')->name('mail-chimp.signUp');
});

Route::controller(AdminPostController::class)->prefix('admin/posts')->middleware('admin')->group(function (){
	Route::get('/','index')->name('admin-posts.index');
    Route::post('/','store')->name('admin-posts.store');
    Route::get('/{post}/edit','edit')->name('admin-posts.edit');
});
