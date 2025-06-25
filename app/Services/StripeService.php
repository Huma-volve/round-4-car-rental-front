<?php

namespace App\Services;

use Stripe\PaymentIntent;
use Stripe\Stripe;

class StripeService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.Secret_key'));
    }

    public function createPaymentIntent($amount, $currency = 'usd', $description)
    {
        return PaymentIntent::create([
            'amount' => $amount * 100,
            'currency' => $currency,
            'payment_method_types'=>['card'],
            'description' => $description,
        ]);
    }
}
