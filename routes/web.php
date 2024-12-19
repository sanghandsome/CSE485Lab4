<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/books/app', function () {
    return view('books.App');  // Trả về view app.blade.php trong thư mục books
})->name('books.app');
Route::resource('books', BookController::class);

