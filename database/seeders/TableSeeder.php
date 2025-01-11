<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('restaurant_table')->insert([
            [
            'T_Id' => '1',
            'Shop_Id' => '1',
            'T_Pax' => '6',
            ],
            [
            'T_Id' => '2',
            'Shop_Id' => '1',
            'T_Pax' => '6',
            ],
            [
            'T_Id' => '3',
            'Shop_Id' => '1',
            'T_Pax' => '6',
            ],
            [
                'T_Id' => '4',
                'Shop_Id' => '1',
                'T_Pax' => '6',
            ],
            [
                'T_Id' => '5',
                'Shop_Id' => '1',
                'T_Pax' => '6',
            ],
            [
                'T_Id' => '6',
                'Shop_Id' => '1',
                'T_Pax' => '4',
            ],
            [
                'T_Id' => '7',
                'Shop_Id' => '1',
                'T_Pax' => '4',
            ],
            [
                'T_Id' => '8',
                'Shop_Id' => '1',
                'T_Pax' => '6',
                ]
        ]);
    }
}
