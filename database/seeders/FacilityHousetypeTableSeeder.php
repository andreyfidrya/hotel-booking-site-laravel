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
                'facility_id' => '11',
                'housetype_id' => '2',                               
            ], 
            [
                'facility_id' => '10',
                'housetype_id' => '2',                               
            ],
            [
                'facility_id' => '9',
                'housetype_id' => '2',                               
            ],
            [
                'facility_id' => '8',
                'housetype_id' => '2',                               
            ],
            [
                'facility_id' => '7',
                'housetype_id' => '2',                               
            ],
            [
                'facility_id' => '6',
                'housetype_id' => '2',                               
            ],
            [
                'facility_id' => '5',
                'housetype_id' => '2',                               
            ],
            [
                'facility_id' => '4',
                'housetype_id' => '2',                               
            ],
            [
                'facility_id' => '3',
                'housetype_id' => '2',                               
            ],
            [
                'facility_id' => '2',
                'housetype_id' => '2',                               
            ],
            [
                'facility_id' => '1',
                'housetype_id' => '2',                               
            ],           
        ]);
    }
}

