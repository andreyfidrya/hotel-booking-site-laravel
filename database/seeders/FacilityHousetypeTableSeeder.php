<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilityHousetypeTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('facility_housetype')->insert([
            [
                'facility_id' => '23',
                'housetype_id' => '1',                               
            ], 
            [
                'facility_id' => '24',
                'housetype_id' => '1',                               
            ],
            [
                'facility_id' => '25',
                'housetype_id' => '1',                               
            ],
            [
                'facility_id' => '26',
                'housetype_id' => '1',                               
            ],
            [
                'facility_id' => '27',
                'housetype_id' => '1',                               
            ],
            [
                'facility_id' => '28',
                'housetype_id' => '1',                               
            ],
            [
                'facility_id' => '29',
                'housetype_id' => '1',                               
            ],
            [
                'facility_id' => '30',
                'housetype_id' => '1',                               
            ],
            [
                'facility_id' => '31',
                'housetype_id' => '1',                               
            ],
            [
                'facility_id' => '32',
                'housetype_id' => '1',                               
            ],
            [
                'facility_id' => '33',
                'housetype_id' => '1',                               
            ],           
        ]);
    }
}

