<?php 
namespace GMCartFlow\ShoppingCart\Controllers;

use App\Http\Controllers\Controller;
use GMCartFlow\ShoppingCart\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        $cart = $this->cartService->getCart(auth()->id(), $request->session()->getId());
        $cartItem = $this->cartService->addToCart($cart->id, $request->product_id, $request->quantity, $request->price);

        return response()->json($cartItem, 200);
    }

    public function removeFromCart(Request $request)
    {
        $cart = $this->cartService->getCart(auth()->id(), $request->session()->getId());
        $this->cartService->removeFromCart($cart->id, $request->product_id);

        return response()->json(['message' => 'Item removed from cart'], 200);
    }
}
