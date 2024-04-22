<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [PageController::class, 'welcome'])->name('welcome.pages');
Route::get('/legals', [PageController::class, 'legals'])->name('legals.pages');
Route::get('/about', [PageController::class, 'about'])->name('about.pages');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/allposts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/dashboard/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/dashboard/create', [PostController::class, 'store'])->name('posts.store');
    Route::get('/dashboard/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/dashboard/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/dashboard/{post}/edit', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/filter', [PostController::class, 'filterByCategory'])->name('posts.filterByCategory');
    
    Route::get('dashboard/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('dashboard/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('dashboard/categories/create', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('dashboard/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/dashboard/categories/{category}/edit', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});



Route::middleware(['auth', IsAdmin::class])->group(function () {

    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/{user}/edit', [UserController::class, 'update'])->name('users.update');
    Route::delete('/user/{user}/edit', [UserController::class, 'destroy'])->name('users.destroy');
    
});



require __DIR__.'/auth.php';











