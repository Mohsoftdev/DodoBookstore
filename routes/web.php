<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GallaryController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [GallaryController::class, 'index']);
Route::get('/search', [GallaryController::class, 'search'])->name('search');
Route::get('/books/{book}', [BooksController::class, 'details'])->name('book.details');
Route::get('/categories/{category}', [CategoriesController::class, 'result'])->name('category.books');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/homepage', function () {
        return view('dashboard');
    })->name('Home_Page');
});
