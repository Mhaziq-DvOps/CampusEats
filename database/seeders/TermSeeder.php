<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        DB::table('terms')->insert([[
            'T_Id'=>'1',
            'T_Topics'=>'SECTION 1 - ONLINE RESTAURANT TERMS',
            'T_Contents'=> 'By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.',
        ],
        [
            'T_Id'=>'2',
            'T_Topics'=>'SECTION 2 - GENERAL CONDITIONS',
            'T_Contents'=> 'We reserve the right to refuse service to anyone for any reason at any time.  You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.',
        ],
        [
            'T_Id'=>'3',
            'T_Topics'=>'SECTION 3 - CampusEats WEBSITE & ACCOUNTS',
            'T_Contents'=> 'By signing up and creating a website on CampusEats, you are held responsible for maintaining the security of your account, website and information as well responsible for any activities that occur within your account in connection with your website. You may not commit fraud by stating that you or your business are/is something it’s not. CampusEats maintains the right to change and remove any information that it considers inappropriate or unlawful. It is your responsibility to notify CampusEats about any unauthorized use of your account or website. CampusEats is not liable for any acts or omissions by You, including any damages of any kind that have incurred as a result of these acts or omissions.',
        ],]);
    }
}
