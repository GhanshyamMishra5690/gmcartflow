<?php 
namespace GMCartFlow\ShoppingCart\Services;

use GMCartFlow\ShoppingCart\Models\PaymentMethod;

class PaymentMethodService
{
    public function getAllMethods()
    {
        return PaymentMethod::all();
    }

    public function createMethod($data)
    {
        return PaymentMethod::create($data);
    }

    public function updateMethod($id, $data)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->update($data);

        return $paymentMethod;
    }

    public function deleteMethod($id)
    {
        return PaymentMethod::destroy($id);
    }
}
