<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            [
            'P_Id'=> '1',
            'Cat_id'=> '1',
            'P_Name'=> 'Nasi Goreng Kampung',
            'P_Price'=> '4.50',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Nasi, Ikan Bilis, Kangkung',
            'L_Description'=> 'Nasi yang digoreng dengan ikan bilis dan kangkung ',
            'P_Duration'=> '10',
            'P_Image'=> '1641308834-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '2',
            'Cat_id'=> '1',
            'P_Name'=> 'Nasi Goreng Cina',
            'P_Price'=> '5.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Nasi, Sayur Campuran, Telur',
            'L_Description'=> 'Nasi yang digoreng dengan dengan sayur campuran dan telur',
            'P_Duration'=> '10',
            'P_Image'=> '1643096292-.jpg',
            'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'

        ],
        [
            'P_Id'=> '3',
            'Cat_id'=> '1',
            'P_Name'=> 'Nasi Goreng Petai',
            'P_Price'=> '5.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Nasi, Petai, Telur',
            'L_Description'=> 'Nasi yang digoreng dengan petai dan telur',
            'P_Duration'=> '10',
            'P_Image'=> '1643096305-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '4',
            'Cat_id'=> '1',
            'P_Name'=> 'Nasi Goreng Ikan Masin',
            'P_Price'=> '5.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Nasi, Ikan Masin, Telur',
            'L_Description'=> 'Nasi yang digoreng dengan ikan masin dan telur',
            'P_Duration'=> '10',
            'P_Image'=> '1643096316-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '5',
            'Cat_id'=> '1',
            'P_Name'=> 'Nasi Goreng Pataya',
            'P_Price'=> '5.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Nasi, Sayur Campur, Telur',
            'L_Description'=> 'Nasi yang dibaluti telur',
            'P_Duration'=> '10',
            'P_Image'=> '1643096327-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '6',
            'Cat_id'=> '1',
            'P_Name'=> 'Nasi Goreng Cendawan',
            'P_Price'=> '5.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Nasi, Cendawan, Telur',
            'L_Description'=> 'Nasi yang digoreng dengan cendawan dan telur',
            'P_Duration'=> '10',
            'P_Image'=> '1643096335-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '7',
            'Cat_id'=> '1',
            'P_Name'=> 'Nasi Goreng Ayam',
            'P_Price'=> '5.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Nasi, Ayam, Telur ',
            'L_Description'=> 'Nasi yang digoreng dengan ayam dan telur',
            'P_Duration'=> '10',
            'P_Image'=> '1643097797-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '8',
            'Cat_id'=> '1',
            'P_Name'=> 'Nasi Goreng USA',
            'P_Price'=> '5.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Nasi, Ayam, Telur',
            'L_Description'=> 'Nasi goreng bersama ayam paprik',
            'P_Duration'=> '10',
            'P_Image'=> '1643097818-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '9',
            'Cat_id'=> '2',
            'P_Name'=> 'Kentang Goreng',
            'P_Price'=> '4.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Kentang',
            'L_Description'=> 'Kentang yang digoreng sempurna',
            'P_Duration'=> '10',
            'P_Image'=> '1641242970-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '10',
            'Cat_id'=> '2',
            'P_Name'=> 'Ayam Goreng',
            'P_Price'=> '3.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Ayam',
            'L_Description'=> 'Ayam special',
            'P_Duration'=> '20',
            'P_Image'=> '1643097831-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '11',
            'Cat_id'=> '2',
            'P_Name'=> 'Spaghetti Bolognese',
            'P_Price'=> '5.50',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Spaghetti, Sos Bolognese, Ayam',
            'L_Description'=> 'Spaghetti bersama sos special bolognese',
            'P_Duration'=> '10',
            'P_Image'=> '1643098024-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '12',
            'Cat_id'=> '2',
            'P_Name'=> 'Chicken Chop',
            'P_Price'=> '7.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Ayam, Sos Lada Hitam',
            'L_Description'=> 'Ayam yang digoreng bersama tepung yang lazat',
            'P_Duration'=> '10',
            'P_Image'=> '1643097902-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '13',
            'Cat_id'=> '3',
            'P_Name'=> 'Mee Goreng',
            'P_Price'=> '4.50',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Mee, Sawi, Telur',
            'L_Description'=> 'Mee yang digoreng dengan sawi dan telur',
            'P_Duration'=> '10',
            'P_Image'=> '1643098047-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '14',
            'Cat_id'=> '3',
            'P_Name'=> 'Mee Kung fu',
            'P_Price'=> '6.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Mee, Telur, Sayuran',
            'L_Description'=> 'Mee bersama kuah',
            'P_Duration'=> '10',
            'P_Image'=> '1643098063-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '15',
            'Cat_id'=> '3',
            'P_Name'=> 'Mee Sup Daging',
            'P_Price'=> '6.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Mee, Sup, Sayuran, Ayam',
            'L_Description'=> 'Mee bersama sup',
            'P_Duration'=> '10',
            'P_Image'=> '1643098080-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '16',
            'Cat_id'=> '3',
            'P_Name'=> 'Bihun Goreng',
            'P_Price'=> '4.50',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Bihun, Sawi, Telur',
            'L_Description'=> 'Bihun yang digoreng dengan sawi dan telur',
            'P_Duration'=> '10',
            'P_Image'=> '1643098155-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '17',
            'Cat_id'=> '3',
            'P_Name'=> 'Bihun Kung Fu',
            'P_Price'=> '6.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Bihun, Telur, Sayuran',
            'L_Description'=> 'Bihun bersama kuah',
            'P_Duration'=> '10',
            'P_Image'=> '1643098099-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '18',
            'Cat_id'=> '4',
            'P_Name'=> 'Teh Tarik (P)',
            'P_Price'=> '1.60',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643097547-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '19',
            'Cat_id'=> '4',
            'P_Name'=> 'Teh Tarik (S)',
            'P_Price'=> '1.70',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643097560-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '20',
            'Cat_id'=> '4',
            'P_Name'=> 'Teh O (P)',
            'P_Price'=> '1.30',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643097579-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '21',
            'Cat_id'=> '4',
            'P_Name'=> 'Teh O (S)',
            'P_Price'=> '1.40',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643097593-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '22',
            'Cat_id'=> '4',
            'P_Name'=> 'Teh O Limau (P)',
            'P_Price'=> '1.40',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643097606-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '23',
            'Cat_id'=> '4',
            'P_Name'=> 'Teh O Limau (S)',
            'P_Price'=> '1.50',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643099028-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '24',
            'Cat_id'=> '4',
            'P_Name'=> 'Milo (P)',
            'P_Price'=> '1.70',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643097636-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '25',
            'Cat_id'=> '4',
            'P_Name'=> 'Milo (S)',
            'P_Price'=> '1.80',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643097651-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '26',
            'Cat_id'=> '4',
            'P_Name'=> 'Sirap (P)',
            'P_Price'=> '1.40',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643098808-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '27',
            'Cat_id'=> '4',
            'P_Name'=> 'Sirap (S)',
            'P_Price'=> '1.60',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643097767-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
        [
            'P_Id'=> '28',
            'Cat_id'=> '4',
            'P_Name'=> 'Sirap Bandung (S)',
            'P_Price'=> '3.00',
            'P_Disc_Price'=> '0',
            'S_Description'=> 'Sedap tak terkata',
            'L_Description'=> 'Sedap sedap',
            'P_Duration'=> '10',
            'P_Image'=> '1643097778-.jpg',
                    'P_Status'=> '1',
            'features' => '[["spicy","1"],["hot","1"],["halal","1"],["vegan","0"],["meat","0"]]'
        ],
    ]);
    }
}
