<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization as FacadesLaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => FacadesLaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect']
], function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::prefix('authors')->group(function () {
        Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
        Route::get('/create', [AuthorController::class, 'create'])->name('authors.create');
        Route::post('/create', [AuthorController::class, 'store'])->name('authors.store');
        Route::get('/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
        Route::post('/{id}/edit', [AuthorController::class, 'update'])->name('authors.update');
        Route::get('/{id}/delete', [AuthorController::class, 'destroy'])->name('authors.delete');
    });

    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::get('/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/create', [BookController::class, 'store'])->name('books.store');
        Route::get('/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::post('/{id}/edit', [BookController::class, 'update'])->name('books.update');
        Route::get('/{id}/delete', [BookController::class, 'destroy'])->name('books.delete');
    });
});
