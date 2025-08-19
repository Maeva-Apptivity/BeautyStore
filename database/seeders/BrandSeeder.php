<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run()
    {

        // tableau des marques par catégory 
        $brandsByCategory = [
            'SkinCare' => [
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

        // Boucle qui vas parcourir le tableau brandsBycategory
        foreach ($brandsByCategory as $categoryName => $brands) {
            // récupère depuis la base de données la catégorie
                $category = Category::where('name', $categoryName)->first();

            // Boucle qui parcourt la liste de marques 
                foreach ($brands as $brand) {
                    // verification avant insertion de la marque et de son slug dans la base de données
                    Brand::firstOrCreate([
                        'name'=> $brand,
                        'slug'=> Str::slug($brand),
                        'category_id'=> $category->id,
                    ]);
                }
            }
        }
    }

