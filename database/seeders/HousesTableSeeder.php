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
                'name' => 'Белый домик №1',
                'housetype_id' => '1',                
                'featured_image' => 'white-featured.jpg',
                'galery_images' => 'white-1.jpg, white-2.jpg, white-3.jpg',                                
            ],
            [
                'name' => 'Коричневый домик №1',
                'housetype_id' => '2',
                'featured_image' => 'brown-featured1.jpg',
                'galery_images' => 'brown1-1.jpg, brown1-2.jpg, brown1-3.jpg, brown1-4.jpg, brown1-5.jpg',                                
            ],
            [
                'name' => 'Коричневый домик №2',
                'housetype_id' => '2',
                'featured_image' => 'brown-featured2.jpg',
                'galery_images' => 'brown2-1.jpg, brown2-2.jpg, brown2-3.jpg, brown2-4.jpg, brown2-5.jpg',                                
            ],
            [
                'name' => 'Коричневый домик №3',
                'housetype_id' => '2',
                'featured_image' => 'brown-featured3.jpg',
                'galery_images' => 'brown3-1.jpg, brown3-2.jpg, brown3-3.jpg, brown3-4.jpg, brown3-5.jpg',                                
            ], 
            [
                'name' => 'Витражный домик №1',
                'housetype_id' => '3',
                'featured_image' => 'stained-glass-featured1.jpg',
                'galery_images' => 'stained-glass-1-1.jpg, stained-glass-1-2.jpg, stained-glass-1-3.jpg',                                
            ], 
            [
                'name' => 'Витражный домик №2',
                'housetype_id' => '3',
                'featured_image' => 'stained-glass-featured2.jpg',
                'galery_images' => 'stained-glass-2-1.jpg, stained-glass-2-2.jpg, stained-glass-2-3.jpg',                                
            ],
            [
                'name' => 'Лавандовый домик №1',
                'housetype_id' => '4',
                'featured_image' => 'lavanda-featured.jpg',
                'galery_images' => 'lavanda-1.jpg, lavanda-2.jpg, lavanda-3.jpg',                                
            ], 
            [
                'name' => 'Оливковый домик №1',
                'housetype_id' => '5',
                'featured_image' => 'olive-featured.jpg',
                'galery_images' => 'olive-1.jpg, olive-2.jpg, olive-3.jpg, olive-4.jpg',                                
            ],            
            [
                'name' => 'Васильковый домик №1',
                'housetype_id' => '6',
                'featured_image' => 'vasilk.jpg',
                'galery_images' => 'vasilk-1.jpg, vasilk-2.jpg, vasilk-3.jpg',                                
            ],         
        ]);
    }
}
