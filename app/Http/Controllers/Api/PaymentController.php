<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public $stripe;
    public function __construct(StripeService $stripe)
    {
        $this->stripe=$stripe;
    }

    public function store(Request $request, StorePaymentRequest $storePaymentRequest)
    {
        $validatedData = $storePaymentRequest->validated();

        try {

            // إنشاء Intent
            $paymentIntent = $this->stripe->createPaymentIntent(
                $request->amount,
                $request->currency,
             'Booking Payment for user id: ' . $request->user_id

            );

            // إضافة transaction_id إلى البيانات
            // $validatedData['transaction_id'] = $paymentIntent->id;

            // حفظ الدفع في قاعدة البيانات
            $payment = Payment::create($validatedData);

            return response()->json([
                'status' => true,
                'message' => 'PaymentIntent created and payment saved',
                'client_secret' => $paymentIntent->client_secret,
                'data' => new PaymentResource($payment),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Stripe error: ' . $e->getMessage(),
            ], 500);
        }
    }
}
