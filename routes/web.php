<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/book/create', function () {
        return view('book/create');
    });
    Route::post('/book', 'App\Http\Controllers\BookController@store');
});

Route::get('/book/{book:slug}', 'App\Http\Controllers\BookController@show')->name('book');

Route::get('/all', 'App\Http\Controllers\BookController@index')->name('all');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
