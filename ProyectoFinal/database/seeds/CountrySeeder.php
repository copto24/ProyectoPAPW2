<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('countries')->delete();

        DB::table('countries')->insert([
        	['name-country' => 'México'],
        	['name-country' => 'Estados Unidos'],
        	['name-country' => 'Canadá'],
        	['name-country' => 'Brasil'],
        	['name-country' => 'Argentina'],
        	['name-country' => 'Chile'],
        	['name-country' => 'Panamá'],
        	['name-country' => 'Perú'],
        	['name-country' => 'Nicaragua'],
        	['name-country' => 'Honduras']
        ]);

    }
}
