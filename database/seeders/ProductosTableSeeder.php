<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Role;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               // Verificar si el rol 'admin' ya existe
               if (!Role::where('name', 'admin')->exists()) {
                Role::create(['name' => 'admin']);
                 }
    
                // Verificar si el rol 'cliente' ya existe
                if (!Role::where('name', 'cliente')->exists()) {
                    Role::create(['name' => 'cliente']);
                }

        $faker = Faker::create();

        // Obtener una URL de imagen aleatoria de Lorem Picsum
        $imageUrl = "1701136116_4375141_logo_xbox_icon.png";

        // Insertar datos de prueba en la tabla 'productos'
        DB::table('productos')->insert([
            'descripcion' => $faker->sentence,
            'precio' => $faker->randomNumber(2),
            'nombre' => $faker->word,
            'stock' => $faker->randomNumber(2),
            'imagen' => $imageUrl, // Generar un nombre de archivo aleatorio
        ]);

        // Puedes agregar más registros según sea necesario
    }
   
}

