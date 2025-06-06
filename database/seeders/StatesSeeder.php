<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['state_code' => 'ap', 'state_name' => 'Andhra Pradesh'],
            ['state_code' => 'ar', 'state_name' => 'Arunachal Pradesh'],
            ['state_code' => 'as', 'state_name' => 'Assam'],
            ['state_code' => 'br', 'state_name' => 'Bihar'],
            ['state_code' => 'cg', 'state_name' => 'Chhattisgarh'],
            ['state_code' => 'ga', 'state_name' => 'Goa'],
            ['state_code' => 'gj', 'state_name' => 'Gujarat'],
            ['state_code' => 'hr', 'state_name' => 'Haryana'],
            ['state_code' => 'hp', 'state_name' => 'Himachal Pradesh'],
            ['state_code' => 'jh', 'state_name' => 'Jharkhand'],
            ['state_code' => 'ka', 'state_name' => 'Karnataka'],
            ['state_code' => 'kl', 'state_name' => 'Kerala'],
            ['state_code' => 'mp', 'state_name' => 'Madhya Pradesh'],
            ['state_code' => 'mh', 'state_name' => 'Maharashtra'],
            ['state_code' => 'mn', 'state_name' => 'Manipur'],
            ['state_code' => 'ml', 'state_name' => 'Meghalaya'],
            ['state_code' => 'mz', 'state_name' => 'Mizoram'],
            ['state_code' => 'nl', 'state_name' => 'Nagaland'],
            ['state_code' => 'or', 'state_name' => 'Odisha'],
            ['state_code' => 'pb', 'state_name' => 'Punjab'],
            ['state_code' => 'rj', 'state_name' => 'Rajasthan'],
            ['state_code' => 'sk', 'state_name' => 'Sikkim'],
            ['state_code' => 'tn', 'state_name' => 'Tamil Nadu'],
            ['state_code' => 'tg', 'state_name' => 'Telangana'],
            ['state_code' => 'tr', 'state_name' => 'Tripura'],
            ['state_code' => 'up', 'state_name' => 'Uttar Pradesh'],
            ['state_code' => 'ut', 'state_name' => 'Uttarakhand'],
            ['state_code' => 'wb', 'state_name' => 'West Bengal'],
        ];

        DB::table('states')->insert($states);
    }
}