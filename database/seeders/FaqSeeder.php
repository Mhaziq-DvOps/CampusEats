<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faq')->insert(
            [
            'Faq_id' => '1',
            'Faq_Category' => 'General',
            'Faq_Question' => 'What is CampusEats?',
            'Faq_Answer' => 'CampusEats is an online shopping platform based in Malaysia that gather many shops from various industry backgrounds.'
            ],

            [
                'Faq_id' => '2',
                'Faq_Category' => 'Order',
                'Faq_Question' => 'Can I cancel my order?',
                'Faq_Answer' => 'Once you have completed the payment for the order, you can not cancel the order.'
                ],
    
        );
    }
}
