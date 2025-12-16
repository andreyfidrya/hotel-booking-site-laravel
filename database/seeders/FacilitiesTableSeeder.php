<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitiesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('facilities')->insert([
            [
                'name' => 'Бесплатный WI-FI',                
            ],
            [
                'name' => 'Холодильник',                
            ],
             [
                'name' => 'Телевизор LCD',                
            ],
             [
                'name' => 'Кондиционер',                
            ],
             [
                'name' => 'Столик с лавочками +BBQ',                
            ],
             [
                'name' => 'Полотенца',                
            ],
             [
                'name' => 'Косметические принадлежности',                
            ],
             [
                'name' => 'Душевая кабина 1 санузел',                
            ],
             [
                'name' => 'Спальня: 1 большая двухспальная кровать 1 диван-кровать',                
            ],
             [
                'name' => 'Гостинная: 1 диван-кровать',                
            ],
             [
                'name' => 'кухня',                
            ],
        ]);
    }
}
