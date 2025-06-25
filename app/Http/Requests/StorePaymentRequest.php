<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
              'amount' => 'required|numeric',
            'payment_method' => 'required|in:credit card,paypal',
            'payment_status' => 'required|in:pending,completed,failed',
            'currency' => 'required|string|max:3',
            'card_number' => 'required|string',
            'card_type' => 'required|string',
            'cvc' => 'required|string|max:4',
            'Expration_date' => 'required|date',
            'card_holder_name' => 'required|string|max:255',
            'booking_id' => 'required|exists:bookings,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
