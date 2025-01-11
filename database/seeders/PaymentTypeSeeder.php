<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_type')->insert([
            [
            'PM_Id' => '1',
            'Name' => 'Cash',
            'Image' => 'cash.png',
            ],

            [
            'PM_Id' => '2',
            'Name' => 'PayPal',
            'Image' => 'paypal.png',
            ],

            [
            'PM_Id' => '3',
            'Name' => 'Stripe',
            'Image' => 'Stripe.png',
            ],
    
        ]);
    }
}
