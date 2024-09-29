<?php 
namespace GMCartFlow\ShoppingCart\Controllers;

use App\Http\Controllers\Controller;
use GMCartFlow\ShoppingCart\Services\PaymentMethodService;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    protected $paymentMethodService;

    public function __construct(PaymentMethodService $paymentMethodService)
    {
        $this->paymentMethodService = $paymentMethodService;
    }

    public function index()
    {
        return response()->json($this->paymentMethodService->getAllMethods(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'details' => 'nullable|string|max:255',
        ]);

        $paymentMethod = $this->paymentMethodService->createMethod($data);

        return response()->json($paymentMethod, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'provider' => 'sometimes|string|max:255',
            'details' => 'sometimes|string|max:255',
        ]);

        $paymentMethod = $this->paymentMethodService->updateMethod($id, $data);

        return response()->json($paymentMethod, 200);
    }

    public function destroy($id)
    {
        $this->paymentMethodService->deleteMethod($id);

        return response()->json(['message' => 'Payment method deleted'], 200);
    }
}
