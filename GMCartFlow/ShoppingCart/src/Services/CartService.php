<?php 
namespace GMCartFlow\ShoppingCart\Services;

use GMCartFlow\ShoppingCart\Models\Cart;
use GMCartFlow\ShoppingCart\Models\CartItem;

class CartService
{
    public function getCart($userId, $sessionId)
    {
        return Cart::firstOrCreate(
            ['user_id' => $userId, 'session_id' => $sessionId],
            ['status' => 'active']
        );
    }

    public function addToCart($cartId, $productId, $quantity, $price)
    {
        $cartItem = CartItem::firstOrCreate(
            ['cart_id' => $cartId, 'product_id' => $productId],
            ['quantity' => $quantity, 'price' => $price, 'subtotal' => $quantity * $price]
        );

        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->quantity += $quantity;
            $cartItem->subtotal = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        }

        return $cartItem;
    }

    public function removeFromCart($cartId, $productId)
    {
        return CartItem::where('cart_id', $cartId)
                       ->where('product_id', $productId)
                       ->delete();
    }
}
