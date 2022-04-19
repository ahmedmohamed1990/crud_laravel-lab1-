<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoogleSocialiteController;
 
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
    if (Auth::check()) {
        return view('home');
    } else {
        return view('auth.login');
    }
});
Route::get('/posts',[PostController::class,'index'])->name('posts.index')->middleware('auth');;
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create')->middleware('auth');;
Route::post('/posts',[PostController::class,'store'])->name('posts.store')->middleware('auth');;

Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update')->middleware('auth');; 
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy')->middleware('auth');;
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('auth');;
Route::get('/posts/{post}',[PostController::class,"show"])->name('posts.show')->middleware('auth');;
Route::post('/comments/{postId}', [CommentController::class, 'create'])->name('comments.create')->middleware('auth');;
Route::delete('/comments/{postId}/{commentId}', [CommentController::class, 'delete'])->name('comments.delete')->middleware('auth');;
Route::get('/comments/{postId}/{commentId}', [CommentController::class, 'view'])->name('comments.view')->middleware('auth');;
Route::patch('/comments/{postId}/{commentId}', [CommentController::class, 'edit'])->name('comments.update')->middleware('auth');;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use Laravel\Socialite\Facades\Socialite;
 
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
 dd($user);});
 
 Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
 Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);