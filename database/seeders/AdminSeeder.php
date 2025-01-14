<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB:: table('admin')->insert (
        [
            'Admin_Id' => '1',
            'Name' => 'Haziq',
            'Email' => 'muhammadhaziqsumagi@gmail.com',
            'Password' => Hash::make('12345678'),
            'Phone' => '010-3612386',
            // 'isBanned' => '0',
            'Street_1' => 'Pontian',
            'Postcode' => '82000',
            'City' => 'Pontian',
            'State' => 'Johor',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            

        ]);
    }

}