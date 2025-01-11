<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CaptchaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('captcha')->insert([[
            'Name'=>'Customer & Manager',
            'Status'=> '1',
            'Type'=> '0',
        ],
        [
            'Name'=>'Admin',
            'Status'=> '1',
            'Type'=> '1',
        ],]);
    }
}
