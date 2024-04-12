<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::get('/', [PageController::class, 'welcome'])->name('welcome.pages');
Route::get('/legals', [PageController::class, 'legals'])->name('legals.pages');
Route::get('/about', [PageController::class, 'about'])->name('about.pages');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/allposts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/dashboard/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/dashboard/create', [PostController::class, 'store'])->name('posts.store');
    Route::get('/dashboard/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/dashboard/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('dashboard/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('dashboard/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('dashboard/categories/create', [CategoryController::class, 'store'])->name('categories.store');
Route::get('dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('dasboard/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/dashboard/categories/{category}/edit', [CategoryController::class, 'destroy'])->name('categories.destroy');

});



require __DIR__.'/auth.php';



