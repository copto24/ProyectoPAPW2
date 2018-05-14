<?php

use Illuminate\Database\Seeder;
use App\department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();


        department::create([
            'name-department' => 'Electronicos'
        ]);
        department::create([
            'name-department' => 'Peliculas'
        ]);
        department::create([
            'name-department' => 'Ropa'
        ]);
        department::create([
            'name-department' => 'Deporte'
        ]);
        department::create([
            'name-department' => 'Hogar'
        ]);
        department::create([
            'name-department' => 'Musica'
        ]);
        department::create([
            'name-department' => 'Juguetes'
        ]);
        department::create([
            'name-department' => 'Libros'
        ]);
        department::create([
            'name-department' => 'Oficina'
        ]);
        department::create([
            'name-department' => 'Salud'
        ]);
        
        /*
        DB::table('departments')->insert([
        	['name-department' => 'Electronicos'],
        	['name-department' => 'Peliculas'],
        	['name-department' => 'Ropa'],
        	['name-department' => 'Deporte'],
        	['name-department' => 'Hogar'],
        	['name-department' => 'Musica'],
        	['name-department' => 'Juguetes'],
        	['name-department' => 'Libros'],
        	['name-department' => 'Oficina'],
        	['name-department' => 'Salud']
        ]);*/
    }
}
