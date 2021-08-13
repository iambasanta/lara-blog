<?php

use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [CommentController::class, 'store']);

Route::post('/newsletter', NewsletterController::class);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth');

//Admin
/*Route::prefix('admin')->middleware('admin')->group(function () {*/
/*});*/

Route::middleware('can:admin')->group(function () {
    Route::get('/admin/posts', [AdminPostController::class, 'index']);
    Route::get('/admin/posts/create', [AdminPostController::class, 'create']);
    Route::post('/admin/posts', [AdminPostController::class, 'store']);
    Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('/admin/posts/{post}/edit', [AdminPostController::class, 'update']);
    Route::delete('/admin/posts/{post}/delete', [AdminPostController::class, 'destroy']);
});
