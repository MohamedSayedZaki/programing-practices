<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Services\PaymentService;
use App\Services\Strategies\BankTransferStrategy;
use Illuminate\Http\Client\Request;

class PaymentController extends Controller
{
    public function __construct(private PaymentService $paymentService) {}

    public function pay(Request $request)
    {
        $this->paymentService->setStrategy(new BankTransferStrategy);
        $this->paymentService->pay($request->input('amount'));

        return response()->json(['message' => 'Payment successful']);
    }
}
