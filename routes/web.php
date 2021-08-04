<?php

use App\Models\User;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubOrderController;
use App\Http\Controllers\ProductOrderController;

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
//     return view('welcome');
// });

Route::redirect('/', '/home');

// Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/distributeur', [HomeController::class, 'distributeur'])->name('distributeur');


Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::resource('products', ProductController::class);

// Route::get('/add-to-cart/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/buy', [CartController::class, 'buy'])->name('cart.buyNow');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/proceed', [CartController::class, 'checkout2'])->name('cart.proceed');
Route::get('/cart/apply-coupon', [CartController::class, 'coupon'])->name('cart.coupon')->middleware('auth');

Route::resource('orders', OrderController::class)->middleware('auth');

Route::resource('shops',ShopController::class)->middleware('auth');


Route::get('paypal/checkout/{order}', [PayPalController::class, 'getExpressCheckout'])->name('paypal.checkout');
Route::get('paypal/checkout-success/{order}', [PayPalController::class, 'getExpressCheckoutSuccess'])->name('paypal.success');
Route::get('paypal/checkout-cancel', [PayPalController::class, 'cancelPage'])->name('paypal.cancel');


Route::group(['prefix' => 'admin'], function () {

    Voyager::routes();

    Route::get('/order/pay/{suborder}', [SubOrderController::class, 'pay'])->name('order.pay');


});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('users', function () {
    return view('pages.profile');
})->middleware(['auth'])->name('profile');

// Route::get('users/{id}/orders', function ($id) {
//     $items = User::find($id)->orders;
//     return view('pages.orders', compact('items'));
// })->middleware(['auth'])->name('user.orders');

Route::get('users/orders', [ProductOrderController::class, 'index'])->middleware(['auth'])->name('users.orders');
Route::get('users/orders/{order}', [ProductOrderController::class, 'show'])->middleware(['auth'])->name('users.orders_show');
Route::post('users/orders/{order}', [ProductOrderController::class, 'delete'])->middleware(['auth'])->name('users.orders_delete');

Route::redirect('/dashboard', 'users/orders');

Route::get('paygate', function () {
    $token = 1234;
    $total = Cart::total();
    $arr = explode(",", $total);
    $total = intval($arr[0] . "" . explode(".", $arr[1])[0]);
    $identifier = uniqid('honea');
    $params = "token={$token}&amount={$total}&identifier={$identifier}";
    // dd($params);
    header('Location: https://paygateglobal.com/v1/page?{$params}');
    exit();
});

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
