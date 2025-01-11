<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:: table('manager')->insert ([
            [
                'Manager_id' => '1',
                'Shop_Id' => '1',
                'Name' => 'Farah',
                'Email' => 'nurfarahclassic@gmail.com',
                'Password' => Hash::make('12345678'),
                'Phone' => '013-3879380',
                'isBanned' => '0',
                'Ban' => '0',
                'Reason' => 'unactive',
                'Street_1' => 'Batu Pahat',
                'Postcode' => '8300',
                'City' => 'Batu Pahat',
                'State' => 'Johor',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                

            ],

            
            [
                'Manager_id' => '2',
                'Shop_Id' => '1',
                'Name' => 'Haziq',
                'Email' => 'Haziq@gmail.com',
                'Password' => Hash::make('12345678'),
                'Phone' => '013-3879380',
                'isBanned' => '0',
                'Ban' => '0',
                'Reason' => 'unactive',
                'Street_1' => 'Batu Pahat',
                'Postcode' => '83120',
                'City' => 'Batu Pahat',
                'State' => 'Johor',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                

            ],

    ]);
    }
}
