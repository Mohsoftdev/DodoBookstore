<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\UsersController;
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
Route::get('/categories/{category}', [CategoriesController::class, 'result'])->name('category.books','{category}');
Route::get('/categories', [CategoriesController::class, 'list'])->name('categories.list');


Route::get('/publishers', [PublishersController::class, 'list'])->name('publishers.list');
Route::get('/publishers/search', [PublishersController::class, 'search'])->name('gallery.publishers.search');

Route::get('/authors', [AuthorsController::class, 'list'])->name('authors.list');
Route::get('/authors/search', [AuthorsController::class, 'search'])->name('gallery.authors.search');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/books', [BooksController::class, 'index'])->name('admin.books.index');
Route::get('/admin/books/create', [BooksController::class, 'create'])->name('books.create');
Route::post('/admin/books', [BooksController::class, 'store'])->name('books.store');
Route::get('/admin/books/{book}', [BooksController::class, 'show'])->name('books.show','{book}');
Route::get('/admin/books/{book}/edit', [BooksController::class, 'edit'])->name('admin.books.edit');
Route::patch('/admin/books/{book}', [BooksController::class, 'update'])->name('books.update','{book}');
Route::delete('/admin/books/{book}', [BooksController::class, 'destroy'])->name('admin.books.destroy','{book}');

Route::get('/admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [CategoriesController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
Route::patch('/admin/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update','{category}');
Route::delete('/admin/categories/{category}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy','{category}');

Route::get('/admin/publishers', [PublishersController::class, 'index'])->name('admin.publishers.index');
Route::get('/admin/publishers/create', [PublishersController::class, 'create'])->name('admin.publishers.create');
Route::post('/admin/publishers', [PublishersController::class, 'store'])->name('admin.publishers.store');
Route::get('/admin/publishers/{publisher}/edit', [PublishersController::class, 'edit'])->name('admin.publishers.edit');
Route::patch('/admin/publishers/{publisher}', [PublishersController::class, 'update'])->name('publishers.update','{publisher}');
Route::delete('/admin/publishers/{publisher}', [PublishersController::class, 'destroy'])->name('admin.publishers.destroy','{publisher}');


Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users.index');
Route::patch('/admin/users/{user}', [UsersController::class, 'update'])->name('users.update','{publisher}');
Route::delete('/admin/users/{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy','{publisher}');

Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.add');


Route::get('/', [GallaryController::class, 'index'])->name('Home_Page');


