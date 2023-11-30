<?php

namespace Database\Factories;
use App\Models\Productos;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageUrl = "1701130303_51ZYHm1fhyL._AC_UF1000,1000_QL80_.jpg";

        return [
            'descripcion' => $this->faker->sentence,
            'precio' => $this->faker->randomNumber(2),
            'nombre' => $this->faker->word,
            'stock' => $this->faker->randomNumber(2),
            'imagen' => $imageUrl,
        ];
    }
}
