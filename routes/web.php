<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\PublishersController;
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

Route::get('/categories/search', [CategoriesController::class, 'search'])->name('gallery.categories.search');
Route::get('/categories/{category}', [CategoriesController::class, 'result'])->name('category.books');
Route::get('/categories', [CategoriesController::class, 'list'])->name('categories.list');


Route::get('/publishers', [PublishersController::class, 'list'])->name('publishers.list');
Route::get('/publishers/search', [PublishersController::class, 'search'])->name('gallery.publishers.search');

Route::get('/authors', [AuthorsController::class, 'list'])->name('authors.list');
Route::get('/authors/search', [AuthorsController::class, 'search'])->name('gallery.authors.search');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/books', [BooksController::class, 'index'])->name('admin.books.index');
Route::get('/admin/books/create', [BooksController::class, 'create'])->name('books.create');
Route::post('/admin/Books', [BooksController::class, 'store'])->name('books.store');
Route::get('/admin/books/{book}', [BooksController::class, 'show'])->name('books.show');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', [GallaryController::class, 'index'])->name('Home_Page');
});
