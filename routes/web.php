<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    return view('pages.index', [
        'title' => 'Rich Nature'
    ]);
});

Route::get('lang/{locale}', function($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }

    return redirect()->back();
});

Route::prefix('cart')->name('cart.')->group(function() {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::get('/get', [CartController::class, 'get'])->name('get');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::post('/store', [CartController::class, 'store'])->name('store');
});

Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

Route::prefix('user')->name('user.')->middleware(['auth'])->group(function() {
    Route::get('/history', [UserController::class, 'history'])->name('history');
    Route::get('/contacts', [UserController::class, 'contacts'])->name('contacts');
    Route::get('/get/orders', [UserController::class, 'getOrders'])->name('get-orders');
    // Route::post('/set/cart', [UserController::class, 'setCart'])->name('set-cart');
    Route::get('/get/addresses', [UserController::class, 'getAddresses'])->name('get-addresses');
});

Route::prefix('payment')->name('payment.')->middleware(['cors'])->group(function() {
    Route::get('/', [PaymentController::class, 'robokassa'])->name('robokassa');
    Route::get('/success', [PaymentController::class, 'success'])->name('robokassa-success');
    Route::get('/fail', [PaymentController::class, 'fail'])->name('robokassa-fail');
    Route::post('/result', [PaymentController::class, 'result'])->name('robokassa-result');
});
