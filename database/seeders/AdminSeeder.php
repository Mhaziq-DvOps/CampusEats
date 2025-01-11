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
            'Name' => 'Admin',
            'Email' => 'admin@gmail.com',
            'Password' => Hash::make('12345678'),
            'Phone' => '013-3879380',
            // 'isBanned' => '0',
            'Street_1' => 'Batu Pahat',
            'Postcode' => '8300',
            'City' => 'Batu Pahat',
            'State' => 'Johor',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            

        ]);
    }

}