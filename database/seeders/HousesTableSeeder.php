<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HousesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('houses')->insert([
            [
                'name' => 'Коричневый домик №1',
                'housetype_id' => '1',
                'description' => 'Вітражний будиночок запрошує розміститися 4-м гостям.  На першому поверсі розташований комфортний 2-х місний диван, а на поверсі під дахом 2-х спальне велике ліжко. На прибудинковій території бази відпочинку є місце для відпочинку та ігор на свіжому повітрі. Мангал із столом та лавками  знаходиться за будинком і є в розпоряджені гостя.',
                'featured_image' => 'brown-featured.jpg',
                'galery_images' => 'brown-1.jpg, brown-2.jpg, brown-3.jpg, brown-4.jpg, brown-5.jpg',                                
            ],            
        ]);
    }
}
