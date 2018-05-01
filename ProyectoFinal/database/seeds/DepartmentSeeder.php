<?php

use Illuminate\Database\Seeder;

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
        ]);
    }
}
