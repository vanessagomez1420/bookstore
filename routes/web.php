<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Auth::routes();

Route::get('/', function () {
    return view('index');
});
Route::get( '/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('');
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register');


Route::get('authors', [AuthorController::class, 'index'])->name('author.index');
Route::group(['prefix' => 'author'], function () {
    Route::get('new', [AuthorController::class, 'create'])->name('author.create');
    Route::post('store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::put('update/{author}', [AuthorController::class, 'update'])->name('author.update');
    Route::delete('delete/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
});

Route::get('publishers', [PublisherController::class, 'index'])->name('publisher.index');
Route::group(['prefix' => 'publisher'], function () {
    Route::get('new', [PublisherController::class, 'create'])->name('publisher.create');
    Route::post('store', [PublisherController::class, 'store'])->name('publisher.store');
    Route::get('edit/{publisher}', [PublisherController::class, 'edit'])->name('publisher.edit');
    Route::put('update/{publisher}', [PublisherController::class, 'update'])->name('publisher.update');
    Route::delete('delete/{publisher}', [PublisherController::class, 'destroy'])->name('publisher.delete');
});

Route::get('genres', [GenreController::class, 'index'])->name('genre.index');
Route::group(['prefix' => 'genre'], function () {
    Route::get('new', [GenreController::class, 'create'])->name('genre.new');
    Route::post('store', [GenreController::class, 'store'])->name('genre.store');
    Route::get('edit/{genre}', [GenreController::class, 'edit'])->name('genre.edit');
    Route::put('update/{genre}', [GenreController::class, 'update'])->name('genre.update');
    Route::delete('delete/{genre}', [GenreController::class, 'destroy'])->name('genre.delete');
});

Route::get('books', [BookController::class, 'index'])->name('book.index');
Route::group(['prefix' => 'book'], function () {
    Route::get('new', [BookController::class, 'create'])->name('book.new');
    Route::post('store', [BookController::class, 'store'])->name('book.store');
    Route::get('edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('update/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('delete/{book}', [BookController::class, 'destroy'])->name('book.delete');
});






