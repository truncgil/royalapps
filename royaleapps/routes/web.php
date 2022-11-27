<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\AuthorController;
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

Route::get('/dashboard', function () {
    $value = session('token');
    return view('dashboard');
});

Route::get('/authors', [AuthorController::class, 'listAuthors']);

Route::get('/books', function () {
    return view('books');
});

Route::post('/get-token', [Authentication::class, 'getToken']);
