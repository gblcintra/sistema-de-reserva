<?php

use Illuminate\Database\Seeder;

class CampingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campings')->insert([
            'id' => 1,
            'seatLimit' => 450,
            'oldSeatLimit' => 450,
            'dailyValue' => 35.25,
            'oldDailyValue' => 35.25,
	        'colorMonday' => '#000000',
	        'colorTuesday' => '#000000',
	        'colorWednesday' => '#000000',
	        'colorThursday' => '#000000',
            'colorFriday' => '#000000',
            'colorSaturday' => '#000000',
            'colorSunday' => '#000000',
            'colorOuther' => '#000000',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
