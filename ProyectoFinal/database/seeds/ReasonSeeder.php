<?php

use Illuminate\Database\Seeder;
use App\reason;

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

        reason::create([
            'name-reason' => 'Terrorismo'
        ]);
        reason::create([
            'name-reason' => 'Infracción de derechos'
        ]);
        reason::create([
            'name-reason' => 'Spam'
        ]);
        reason::create([
            'name-reason' => 'Contenido violento'
        ]);
        reason::create([
            'name-reason' => 'Contenido sexual'
        ]);
        reason::create([
            'name-reason' => 'Incumplimiento'
        ]);
        
        /*DB::table('reasons')->insert([
        	['name-reason' => 'Terrorismo'],
        	['name-reason' => 'Infracción de derechos'],
        	['name-reason' => 'Spam'],
        	['name-reason' => 'Contenido violento'],
        	['name-reason' => 'Contenido sexual'],
        	['name-reason' => 'Incumplimiento']
        ]);*/
    }
}
