<?php 
namespace GMCartFlow\ShoppingCart\Controllers;

use App\Http\Controllers\Controller;
use GMCartFlow\ShoppingCart\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function createOrder(Request $request)
    {
        $cart = $this->cartService->getCart(auth()->id(), $request->session()->getId());
        $order = $this->orderService->createOrder($cart);

        return response()->json($order, 201);
    }
}
