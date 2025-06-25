<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user'=> [
                'name' => $this->user->name,
                'phone_number' => $this->user->phone_number,
                'city' => $this->user->city ,
                'address' => $this->user->address ,
            ],
            'amount' => $this->amount,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'currency' => $this->currency,
            'card_number' => $this->card_number,
            'card_type' => $this->card_type,
            'cvc' => $this->cvc,
            'Expration_date' => $this->Expration_date,
            'card_holder_name' => $this->card_holder_name,
            'booking' => [
                'pickup_location' => $this->booking->pickup_location,
                'dropoff_location' => $this->booking->dropoff_location,
                'pickup_date' => $this->booking->pickup_date,
                'dropoff_date' => $this->booking->dropoff_date,
                'pickup_time' => $this->booking->pickup_time,
                'dropoff_time' => $this->booking->dropoff_time,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
