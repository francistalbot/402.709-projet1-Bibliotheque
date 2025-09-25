<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/nouveautes', [HomeController::class, 'nouveautes'])->name('nouveautes');

Route::get('/messages', [MessageController::class, 'index'])->middleware(['auth', 'admin'])->name('messages.index');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::put('/messages/{id}', [MessageController::class, 'update'])->middleware(['auth', 'admin'])->name('messages.update');
Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->middleware(['auth', 'admin'])->name('messages.destroy');

Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');

Route::prefix('livres')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/create', [LivreController::class, 'create'])->name('livres.create');
    Route::post('/', [LivreController::class, 'store'])->name('livres.store');
    Route::get('/{livre}/edit', [LivreController::class, 'edit'])->name('livres.edit');
    Route::put('/{livre}', [LivreController::class, 'update'])->name('livres.update');
    Route::delete('/{livre}', [LivreController::class, 'destroy'])->name('livres.destroy');
});
Route::get('/livres/{livre}', [LivreController::class, 'show'])->name('livres.show')->where('livre', '[0-9]+');
Route::prefix('authors')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/{author}', [AuthorController::class, 'show'])->name('authors.show');
    Route::get('/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('/{author}', [AuthorController::class, 'update'])->name('authors.update');
    Route::delete('/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
});
Route::prefix('categories')->middleware(['auth', 'admin'])->group(function () {
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

Route::get('/password/reset', function () {
    return view('auth.passwords.email');
})->name('password.request');

Route::post('/password/email', function () {
    $message = "Vous receverez un mail de réinitialisation si votre adresse est enregistrée dans notre système.";
    return redirect()->route('login')->with('success', $message);
})->name('password.email');

Route::get('/password/change', [HomeController::class, 'showChangePasswordForm'])->middleware('auth')->name('password.change');
Route::post('/password/change', [HomeController::class, 'changePassword'])->middleware('auth')->name('password.update');
Route::get('cart',[CartController::class,'cart'])->middleware('auth')->name('cart');
Route::get('add-cart/{productId}',[CartController::class,'addCart'])->middleware('auth')->name('add.cart');

Route::get('add-quantity/{productId}',[CartController::class,'addQuantity'])->middleware('auth')->name('add.quantity');

Route::get('decrease-quantity/{productId}',[CartController::class,'decreaseQuantity'])->middleware('auth')->name('decrease.quantity');

Route::get('remove-item/{productId}',[CartController::class,'removeItem'])->middleware('auth')->name('remove.item');

Route::get('clear',[CartController::class,'clearCart'])->middleware('auth')->name('clear');

Route::post('/coupon/apply', [CartController::class, 'applyCoupon'])->name('coupon.apply');

Route::post('/stripe/refund/{paymentIntentId}', [StripePaymentController::class, 'refund'])->middleware(['auth', 'admin'])->name('stripe.refund');
Route::get('/refund/{paymentIntentId}', [StripePaymentController::class, 'refundForm'])->middleware(['auth', 'admin'])->name('form.refund');
Route::get('/stripe/payments', [StripePaymentController::class, 'paymentHistory'])->middleware(['auth', 'admin'])->name('stripe.payments');

