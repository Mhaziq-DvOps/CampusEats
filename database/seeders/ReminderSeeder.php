<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReminderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:: table('notifications')->insert ([
            [
                'id' => '1',
                'status' => '0',
                'subject' => 'CampusEats- Booking Reminder',
                'data' => 'You have made a booking on Farah Classic.',
                'footer' => 'Thank You For Ordering With CampusEats',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            ]
        );
    }
}
