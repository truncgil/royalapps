<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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
});

Route::post('/get-token', [Authentication::class, 'getToken']);




Route::middleware(['require.token'])->group(function () {

    Route::get('/logout', [Authentication::class, 'logOut']);

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/authors', [AuthorController::class, 'listAuthors']);
    Route::get('/delete-author/{id}', [AuthorController::class, 'deleteAuthor']);

    Route::get('/books', [BookController::class, 'listBooks']);
    Route::get('/books', [BookController::class, 'listBooks']);
    Route::get('/create-book', [BookController::class, 'createBook']);
    Route::post('/store-book', [BookController::class, 'storeBook']);
    Route::get('/delete-book/{id}', [BookController::class, 'deleteBook']);

    
});