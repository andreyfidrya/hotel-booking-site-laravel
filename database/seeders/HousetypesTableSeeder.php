<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HousetypesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('housetypes')->insert([
            [
                'name' => 'Коричневый домик',
                'description' => 'Коричневый домик для гостей в два этажа разместит на своей территории семью или компанию друзей из 4 человек. Большая спальная комната оборудована удобной двуспальной кроватью и диваном, где могут разместиться два ребенка. В гостиной с уютным камином, стоит диван, который может стать спальным местом еще для двоих человек.',
                'capacity' => '4',
                'area' => '60',
                'price_per_extra_person' => '500',
                'price_on_business_days' => '4000',
                'price_on_weekends' => '4000',                
            ],            
        ]);
    }
}
