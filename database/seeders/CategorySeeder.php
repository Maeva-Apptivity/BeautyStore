<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tableau contenant mes noms de categorie
        $categories = [
            'SkinCare',
            'Makeup',
            'HairCare',
            'Fragrance',
            'Eco-Friendly'
        ];

        // Vérification avant création des catégories et des slugs
        foreach($categories as $category){
            Category::firstOrCreate([
                'name'=> $category,
                'slug'=> Str::slug($category)
            ]);
        }
    }
}
