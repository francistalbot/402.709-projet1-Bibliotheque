<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\CartController;

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
Route::get('/nouveautes', [HomeController::class, 'nouveautes'])->name('nouveautes');
Route::get('/messages', [HomeController::class, 'showMessages'])->name('messages.index');
Route::post('/messages', [HomeController::class, 'storeMessage'])->name('messages.store');

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

Auth::routes();

Route::get('/payment/stripe/form/{price}', [StripePaymentController::class, 'showForm'])->name('stripe.form'); 
Route::post('/payment/stripe/pay', [StripePaymentController::class, 'pay'])->name('stripe.pay');

Route::get('cart',[CartController::class,'cart'])->name('cart');
Route::get('add-cart/{productId}',[CartController::class,'addCart'])->name('add.cart');

Route::get('add-quantity/{productId}',[CartController::class,'addQuantity'])->name('add.quantity');

Route::get('decrease-quantity/{productId}',[CartController::class,'decreaseQuantity'])->name('decrease.quantity');

Route::get('remove-item/{productId}',[CartController::class,'removeItem'])->name('remove.item');

Route::get('clear',[CartController::class,'clearCart'])->name('clear');

Route::post('/coupon/apply', [CartController::class, 'applyCoupon'])->name('coupon.apply');

Route::post('/stripe/refund/{paymentIntentId}', [StripePaymentController::class, 'refund'])->name('stripe.refund');
Route::get('/stripe/payments', [StripePaymentController::class, 'paymentHistory'])->middleware(['auth', 'admin'])->name('stripe.payments');

