<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    
    public function definition(): array
    {
        // Variable qui récupere l'ensemble de mes catégories
        $categories = Category::all();

        // Variable qui stock mes marques filtrer par catégorie
        $brandsByCategory = [

            // Nom des catégories
            'Skincare' => [
                // Nom des marques
                'Luminéa', 'Dermavie', 'PureGlow', 'SkinHarmony', 'Éclat Sublime',
                'Hydralis', 'VelvetSkin', 'Naturéa', 'Auréal', 'Rosélis'
            ],
            'Makeup' => [
                'Glamora', 'ChicLook', 'BellaCrème', 'LuxeLips', 'DivineTouch',
                'VelvetPalette', 'MatteMuse', 'PrismaLash', 'BlushFairy', 'OpalGlow'
            ],
            'HairCare' => [
                'Silk & Pure', 'Follicare', 'NourishLocks', 'VitalHair', 'AuroraTress',
                'Bouclévia', 'HairElixir', 'Kératéa', 'VelvetRoots', 'PhytoLuxe'
            ],
            'Fragrance' => [
                'Essentia', 'L\'Élégance', 'Mystéria', 'VanillaBloom', 'NoirSens',
                'Fleur d\'Éden', 'Océanique', 'AmbreLuxe', 'CitrusVibe', 'RoseNoire'
            ],
            'Eco-Friendly' => [
                'BioGlow', 'GreenEssence', 'PureVéa', 'EcoLisse', 'NaturOsmose'
            ]
        ];

        $category = $categories->random();  //selectionne une category aléatoire
        $categoryName = $category->name;    //variable qui récurpere le nom de la catégorie

        // variable qui va récupérer le nom de la category qui est associée au tableau brandbycategory
        // combiné avec un expression ternaire qui va eviter les erreur en retournant un tableau vide
        $brands = $brandsByCategory[$categoryName] ?? [];

        return [
            'name' => $this->faker->unique()->randomElement($brands),
            'category_id' => $category->id,
        ];
    }
}
