<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */

     public function run()
     {
        $this->call([
          UsuarioSeeder::class
        ]);
        
         // Crea 10 usuarios utilizando el factory
         User::factory(10)->create();
     }
     
}
