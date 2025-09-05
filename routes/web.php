<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


Route::prefix('livres')->group(function () {
    Route::get('/', [LivreController::class, 'index'])->name('livres.index');
    Route::get('/create', [LivreController::class, 'create'])->name('livres.create');
    Route::post('/', [LivreController::class, 'store'])->name('livres.store');
    Route::get('/{livre}', [LivreController::class, 'show'])->name('livres.show');
    Route::get('/{livre}/edit', [LivreController::class, 'edit'])->name('livres.edit');
    Route::put('/{livre}', [LivreController::class, 'update'])->name('livres.update');
    Route::delete('/{livre}', [LivreController::class, 'destroy'])->name('livres.destroy');
});
Route::prefix('authors')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/{author}', [AuthorController::class, 'show'])->name('authors.show');
    Route::get('/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('/{author}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
});
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


Route::get('/payment/form', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment/pay', [PaymentController::class, 'pay'])->name('payment.pay'); 
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success'); 
Route::get('/payment/error', [PaymentController::class, 'error'])->name('payment.error');
