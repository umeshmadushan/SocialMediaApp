<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/',[WelcomeController::class,'index'])->name('welcome');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//posts

Route::middleware('auth')->group(function () {
    Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/all',[HomeController::class,'allPosts'])->name('posts.all');
Route::get('/posts/toggle-like/{post}',[LikeController::class,'toggleLike'])->name('posts.toggleLike');

});
