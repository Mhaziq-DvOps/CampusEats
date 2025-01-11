<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShopCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shop_category')->insert([[
            'S_Cat_Name'=> 'Food and Beverage',
            'S_Cat_Slug' => 'food and beverage'
        ],
        [
            'S_Cat_Name'=> 'OffShore',
            'S_Cat_Slug' => 'OffShore'
        ],
        [
            'S_Cat_Name'=> 'Chain Mart',
            'S_Cat_Slug' => 'Chain Mart'
        ]]);
    }
}
