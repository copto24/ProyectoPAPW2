<?php

use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reasons')->delete();

        DB::table('reasons')->insert([
        	['name-reason' => 'Terrorismo'],
        	['name-reason' => 'Infracción de derechos'],
        	['name-reason' => 'Spam'],
        	['name-reason' => 'Contenido violento'],
        	['name-reason' => 'Contenido sexual'],
        	['name-reason' => 'Incumplimiento']
        ]);
    }
}
