<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BizHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('business_hour')->insert([[
            'Day_Id'=>'1',
            'Day_Of_Week'=> 'Sunday',
            'Start_Time'=> '08:30:00',
            'End_Time'=> '22:30:00',
            'Status'=> '1',
        ],
        [
            'Day_Id'=>'2',
            'Day_Of_Week'=> 'Monday',
            'Start_Time'=> '08:30:00',
            'End_Time'=> '22:30:00',
            'Status'=> '1',
        ],
        [
            'Day_Id'=>'3',
            'Day_Of_Week'=> 'Tuesday',
            'Start_Time'=> '08:30:00',
            'End_Time'=> '22:30:00',
            'Status'=> '1',
        ],
        [
            'Day_Id'=>'4',
            'Day_Of_Week'=> 'Wednesday',
            'Start_Time'=> '08:30:00',
            'End_Time'=> '22:30:00',
            'Status'=> '1',
        ],
        [
            'Day_Id'=>'5',
            'Day_Of_Week'=> 'Thursday',
            'Start_Time'=> '08:30:00',
            'End_Time'=> '22:30:00',
            'Status'=> '1',
        ],
        [
            'Day_Id'=>'6',
            'Day_Of_Week'=> 'Friday',
            'Start_Time'=> '08:30:00',
            'End_Time'=> '22:30:00',
            'Status'=> '1',
        ],
        [
            'Day_Id'=>'7',
            'Day_Of_Week'=> 'Saturday',
            'Start_Time'=> '08:30:00',
            'End_Time'=> '22:30:00',
            'Status'=> '1',
        ],]);
    }
    }

