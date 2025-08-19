<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Appel des models pour crée les fausses données

        // User::factory()->create([
        //     'first_name' => 'Test',
        //     'last_name' => 'User',
        //     'email' => 'test@example.com',
        // ]);

        // fonction pour appelé directement les factory 
        $this->call([
            CategorySeeder::class, // 1. Crée les catégories
            BrandSeeder::class,    // 2. Crée les marques
            ProductSeeder::class   // 3. Crée les produits 
        ]);
    }
    
}
