<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use Gloudemans\Shoppingcart\Facades\Cart;
use app\Models\Product;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [HomePageController::class, 'index'])->name('HomePage');

Route::get('/shop', [ShopController::class, 'index'])->name('Shop.index');


Route::get('/shop/{product}', [ShopController::class, 'show'])->name('Shop.show');

Route::get('/cart', [CartController::class, 'index'])->name('Cart.index');

Route::post('/cart', [CartController::class, 'store'])->name('Cart.store');

Route::get('empty', function(){
    Cart::destroy();
});

Route::view('/checkout', 'checkout');

Route::view('/thankyou', 'thankyou');
