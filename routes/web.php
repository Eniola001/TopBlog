<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index']);
Route::get('/blog', [PostController::class, 'blog']);
Route::get('/blog/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/blog/create', [PostController::class, 'store'])->middleware('auth');

Route::get('/posts/{post:id}', [PostController::class, 'show']);
Route::get('/posts/{post:id}/edit', [PostController::class, 'edit'])->middleware('auth')->can('edit-post', 'post');
Route::patch('/posts/{post:id}', [PostController::class, 'update'])->middleware('auth');
Route::delete('/posts/{post:id}', [PostController::class, 'destroy'])->middleware('auth');

Route::post('/posts/{post:id}', [CommentController::class, 'store']);

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);
Route::get('/categories/{category}', CategoryController::class);

Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisterUserController::class, 'create']);
  Route::post('/register', [RegisterUserController::class, 'store']);

  Route::get('/login', [SessionController::class, 'create'])->name('login');
  Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::view('/about', 'about');
Route::view('/contact', 'contact');
