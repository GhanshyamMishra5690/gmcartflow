<?php 
namespace GMCartFlow\ShoppingCart\Controllers;

use App\Http\Controllers\Controller;
use GMCartFlow\ShoppingCart\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function recordPayment(Request $request)
    {
        $payment = $this->paymentService->recordPayment(
            $request->order_id,
            $request->payment_method,
            $request->amount,
            $request->transaction_id
        );

        return response()->json($payment, 201);
    }
}
