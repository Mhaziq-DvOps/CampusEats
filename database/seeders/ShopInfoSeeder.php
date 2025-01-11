<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShopInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shop')->insert([
            [
                'Shop_Id'=> '1',
                'S_Category'=> 'Food and Beverage',
                'S_Name'=> 'Farah Classic',
                'S_Image'=> 'FarahBanner.png',
                'S_Banner'=> 'FarahShopBanner.png',
                'S_Description'=> 'Good Food For Good Mood',
                'Dine_In'=> '1',
                'Delivery'=> '1',
                'Pick_Up'=> '1',
                'S_Status'=> '0',
                'S_Table'=>'1642650778-.png',
            ],
           ]); 
    }
}
