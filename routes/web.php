<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', [ HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/book/create', function () {
        return view('book/create');
    });
    Route::post('/book', [ BookController::class, 'store']);

    Route::get('/book/{book:slug}/edit', [ BookController::class, 'edit']);
    Route::patch('/book/{book:slug}', [ BookController::class, 'update']);
    Route::delete('/book/{book:slug}', [ BookController::class, 'destroy']);

    Route::get('/profile/{profile:id}/edit', [ ProfileController::class, 'edit']);
    Route::patch('/profile/{profile:id}', [ProfileController::class, 'update']);
});

Route::get('/book/{book:slug}', [ BookController::class, 'show'])->name('book');

Route::get('/all', [ BookController::class, 'index'])->name('all');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
