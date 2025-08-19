<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    
    public function definition(): array
    {
        // Variable contenant mes categories definit
        $names=[
            'Skincare',
            'Makeup',
            'Haircare',
            'Fragrance',
            'Eco-Friendly',
        ];

        return [
            // Recupération des elements contenu dans ma variable en unique pour eviter les doublons
            'name' => $this->faker->unique()->randomElement($names),
        ];
    }
}
