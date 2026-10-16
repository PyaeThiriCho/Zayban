<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('shop-item/{id}', [App\Http\Controllers\FrontController::class, 'shopItem'])->name('shop.item');

Route::get('items-category/{category_id}', [App\Http\Controllers\FrontController::class, 'itemCategory'])->name('items.category');

Route::get('item-carts', [App\Http\Controllers\FrontController::class, 'cart'])->name('items.cart');
// Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.index');

Route::post('order-now', [App\Http\Controllers\FrontController::class, 'orderNow'])->name('order.now');

//Route Group
Route::group(['middleware'=>['auth','admin_or_staff'],'prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('index');
    Route::resource('items', App\Http\Controllers\Admin\ItemController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('payments', App\Http\Controllers\Admin\PaymentController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);

    Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'orders'])->name('orders');
    Route::get('orderAccept', [App\Http\Controllers\Admin\OrderController::class, 'orderAccept'])->name('order.accept');
    Route::get('orderComplete', [App\Http\Controllers\Admin\OrderController::class, 'orderComplete'])->name('order.complete');

    Route::get('orders/{voucherNo}', [App\Http\Controllers\Admin\OrderController::class, 'orderDetail'])->name('order.detail');

    Route::put('orders/{voucherNo}', [App\Http\Controllers\Admin\OrderController::class, 'statusUpdate'])->name('order.status');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
