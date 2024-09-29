<?php 
use GMCartFlow\ShoppingCart\Controllers\CartController;
use GMCartFlow\ShoppingCart\Controllers\OrderController;
use GMCartFlow\ShoppingCart\Controllers\PaymentController;

Route::middleware('auth')->group(function () {
    // Cart Routes
    Route::post('/cart/add', [CartController::class, 'addToCart']);
    Route::post('/cart/remove', [CartController::class, 'removeFromCart']);

    // Order Routes
    Route::post('/order/create', [OrderController::class, 'createOrder']);

    // Payment Routes
    Route::post('/payment/record', [PaymentController::class, 'recordPayment']);

    // Payment Method Routes
    Route::get('/payment-methods', [PaymentMethodController::class, 'index']);
    Route::post('/payment-methods', [PaymentMethodController::class, 'store']);
    Route::put('/payment-methods/{id}', [PaymentMethodController::class, 'update']);
    Route::delete('/payment-methods/{id}', [PaymentMethodController::class, 'destroy']);
});