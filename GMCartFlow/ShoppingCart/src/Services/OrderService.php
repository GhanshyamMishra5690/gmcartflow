<?php 
namespace GMCartFlow\ShoppingCart\Services;

use GMCartFlow\ShoppingCart\Models\Cart;
use GMCartFlow\ShoppingCart\Models\Order;
use GMCartFlow\ShoppingCart\Models\OrderItem;

class OrderService
{
    public function createOrder($cart)
    {
        $order = Order::create([
            'user_id' => $cart->user_id,
            'cart_id' => $cart->id,
            'order_number' => uniqid('ORDER-'),
            'total_amount' => $cart->items->sum('subtotal'),
            'status' => 'pending'
        ]);

        foreach ($cart->items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'subtotal' => $item->subtotal
            ]);
        }

        return $order;
    }
}
