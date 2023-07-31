<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\ProductsTypes\ProductsTypeController;
use App\Http\Controllers\Suppliers\SuppliersController;
use App\Http\Controllers\Customers\CustomerController;
use App\Http\Controllers\Purchase\PurchaseOrderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Register\RegisteredController;

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

Route::get('/', ['middleware' => 'auth', function () {
    return view('auth.login');
}]);

Route::group(['middleware' => ['guest']], function () {

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/purchaser-sign-up', 'purchaserRegister')->name('purchaser-sign-up');
        Route::post('/submit-purchaser-register', 'createPurchaser')->name('submit-purchaser-register');
    });
});



Auth::routes();
Route::group(['prefix' => 'accounts-pos', 'middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    /*
     * Products Types Route
     * */
    Route::controller(ProductsTypeController::class)->group(function () {
        Route::get('/products-type/show', 'index')->name('products-type');
        Route::get('/products-type/create', 'create')->name('create-products-type');
        Route::post('/products-type/submit', 'store')->name('store-product-type');
        Route::get('/products-type/edit/{id}', 'edit');
        Route::get('/products-type/delete/{id}', 'destroy');
        Route::post('/products-type/update', 'update')->name('update-products-type');
    });

    /*
     * Products Route
     * */
    Route::controller(ProductsController::class)->group(function () {
        Route::get('/products/show', 'index')->name('products-list');
        Route::get('/products/create', 'create')->name('create-product');
        Route::post('/products/submit', 'store')->name('store-product');
        Route::get('/products/edit/{id}', 'edit');
        Route::post('/product/update', 'update')->name('update-product');
        Route::get('/product/delete/{id}', 'destroy');
    });

    /*
     * Products Route
     * */
    Route::controller(SuppliersController::class)->group(function () {
        Route::get('/suppliers/show', 'index')->name('suppliers-list');
        Route::get('/suppliers/create', 'create')->name('create-suppliers');
        Route::post('/suppliers/submit', 'store')->name('store-suppliers');
        Route::get('/suppliers/edit/{id}', 'edit');
        Route::post('/suppliers/update', 'update')->name('update-suppliers');
        Route::get('/suppliers/delete/{id}', 'destroy');
    });


    /*
     * Customers Route
     * */
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers/show', 'index')->name('customers-list');
        Route::get('/customers/create', 'create')->name('create-customers');
        Route::post('/customers/submit', 'store')->name('store-customers');
        Route::get('/customers/edit/{id}', 'edit');
        Route::post('/customers/update', 'update')->name('update-customers');
        Route::get('/customers/delete/{id}', 'destroy');
    });


    /*
     * Purchase Order Route
     * */
    Route::controller(PurchaseOrderController::class)->group(function () {
        Route::get('/purchase-order/show', 'index')->name('customers-purchase-order');
        Route::get('/purchase-order/create', 'create')->name('create-purchase-order');
        Route::post('/purchase-order/submit', 'store')->name('store-purchase-order');
        Route::get('/purchase-order/edit/{id}', 'edit');
        Route::post('/purchase-order/update', 'update')->name('update-purchase-order');
        Route::get('/purchase-order/delete/{id}', 'destroy');
    });


    /*
     * Purchase Order Route
     * */
    Route::controller(RegisteredController::class)->group(function () {
        Route::get('/purchaser-list/show', 'index')->name('purchaser-list');
    });

});


