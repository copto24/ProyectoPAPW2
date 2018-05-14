<?php

use Illuminate\Database\Seeder;
use App\country;

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

        country::create([
            'name-country' => 'México'
        ]);
        country::create([
            'name-country' => 'Estados Unidos'
        ]);
        country::create([
            'name-country' => 'Canadá'
        ]);
        country::create([
            'name-country' => 'Brasil'
        ]);
        country::create([
            'name-country' => 'Argentina'
        ]);
        country::create([
            'name-country' => 'Chile'
        ]);
        country::create([
            'name-country' => 'Panamá'
        ]);
        country::create([
            'name-country' => 'Perú'
        ]);
        country::create([
            'name-country' => 'Nicaragua'
        ]);
        country::create([
            'name-country' => 'Honduras'
        ]);



       /* DB::table('countries')->insert([
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
        ]);*/

    }
}
