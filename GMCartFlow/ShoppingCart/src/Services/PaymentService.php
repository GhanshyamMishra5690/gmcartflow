<?php 
namespace GMCartFlow\ShoppingCart\Services;

use GMCartFlow\ShoppingCart\Models\Payment;

class PaymentService
{
    public function recordPayment($orderId, $paymentMethod, $amount, $transactionId)
    {
        return Payment::create([
            'order_id' => $orderId,
            'payment_method' => $paymentMethod,
            'amount' => $amount,
            'status' => 'completed',
            'transaction_id' => $transactionId,
            'payment_date' => now()
        ]);
    }
}
