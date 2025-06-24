<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Payment::create([
            'booking_id' => 1,
            'user_id' => 1,
            'amount' => 700.00,
            'payment_date' => '2025-07-01',
            'paymentMethod' => 'creditcard',
            'payment_status' => 'completed',
            'cardNumber' => '4111111111111111',
            'expiration_date' => '12/26',
            'CVC' => '123',
            'cardHolder' => 'Ahmed Ali',
        ]);

        Payment::create([
            'booking_id' => 2,
            'user_id' => 2,
            'amount' => 500.00,
            'payment_date' => '2025-07-05',
            'paymentMethod' => 'paypal',
            'payment_status' => 'pending',
            'cardNumber' => 'N/A',
            'expiration_date' => 'N/A',
            'CVC' => 'N/A',
            'cardHolder' => 'Sara Mohamed',
        ]);

        Payment::create([
            'booking_id' => 3,
            'user_id' => 1,
            'amount' => 600.00,
            'payment_date' => '2025-07-10',
            'paymentMethod' => 'creditcard',
            'payment_status' => 'failed',
            'cardNumber' => '4000123412341234',
            'expiration_date' => '11/25',
            'CVC' => '456',
            'cardHolder' => 'Ahmed Ali',
        ]);
    }
}
