<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tableau de produits contenant la marque le prix l'image et sa description.
        $productsData = [
            // Skincare
            'Luminéa' => [
                [
                    'name' => 'Crème Hydratante Éclat',
                    'price' => 32.99,
                    'description' => 'Crème de jour hydratante à l\'acide hyaluronique pour un teint éclatant',
                    'image' => 'https://picsum.photos/400/400?random=1',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=2',
                        'https://picsum.photos/400/400?random=3'
                    ]
                ],
                [
                    'name' => 'Sérum Anti-Âge',
                    'price' => 49.50,
                    'description' => 'Sérum concentré en rétinol et vitamine C pour lutter contre les signes de l\'âge',
                    'image' => 'https://picsum.photos/400/400?random=4',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=5',
                        'https://picsum.photos/400/400?random=6'
                    ]
                ],
                [
                    'name' => 'Nettoyant Doux',
                    'price' => 18.75,
                    'description' => 'Nettoyant visage doux au pH neutre pour une peau nette sans irritation',
                    'image' => 'https://picsum.photos/400/400?random=7',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=8',
                        'https://picsum.photos/400/400?random=9'
                    ]
                ]
            ],

            // Makeup
            'Glamora' => [
                [
                    'name' => 'Fond de Teint Mat',
                    'price' => 35.99,
                    'description' => 'Fond de teint matifiant longue tenue 16h',
                    'image' => 'https://picsum.photos/400/400?random=10',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=11',
                        'https://picsum.photos/400/400?random=12'
                    ]
                ],
                [
                    'name' => 'Palette Éclat',
                    'price' => 52.00,
                    'description' => 'Palette de fards à paupières nude et poudrés',
                    'image' => 'https://picsum.photos/400/400?random=13',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=14',
                        'https://picsum.photos/400/400?random=15'
                    ]
                ],
                [
                    'name' => 'Mascara Volume+',
                    'price' => 26.50,
                    'description' => 'Mascara volume intense waterproof',
                    'image' => 'https://picsum.photos/400/400?random=16',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=17',
                        'https://picsum.photos/400/400?random=18'
                    ]
                ]
            ],

            // HairCare
            'Silk & Pure' => [
                [
                    'name' => 'Shampoing Lissant',
                    'price' => 22.99,
                    'description' => 'Shampoing lissant brésilien à la kératine',
                    'image' => 'https://picsum.photos/400/400?random=19',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=20',
                        'https://picsum.photos/400/400?random=21'
                    ]
                ],
                [
                    'name' => 'Après-Shampoing Repair',
                    'price' => 24.50,
                    'description' => 'Après-shampoing réparateur pointes fourchues',
                    'image' => 'https://picsum.photos/400/400?random=22',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=23',
                        'https://picsum.photos/400/400?random=24'
                    ]
                ],
                [
                    'name' => 'Huile Capillaire',
                    'price' => 29.99,
                    'description' => 'Huile capillaire multi-usages brillance et nutrition',
                    'image' => 'https://picsum.photos/400/400?random=25',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=26',
                        'https://picsum.photos/400/400?random=27'
                    ]
                ]
            ],

            // Fragrance
            'Essentia' => [
                [
                    'name' => 'Eau de Parfum Florale',
                    'price' => 89.99,
                    'description' => 'Eau de parfum florale romantique et persistante',
                    'image' => 'https://picsum.photos/400/400?random=28',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=29',
                        'https://picsum.photos/400/400?random=30'
                    ]
                ],
                [
                    'name' => 'Body Mist Fraîcheur',
                    'price' => 32.50,
                    'description' => 'Body mist fraîcheur quotidienne légère',
                    'image' => 'https://picsum.photos/400/400?random=31',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=32',
                        'https://picsum.photos/400/400?random=33'
                    ]
                ],
                [
                    'name' => 'Lotion Corporelle',
                    'price' => 28.99,
                    'description' => 'Lotion corporelle parfumée hydratante 24h',
                    'image' => 'https://picsum.photos/400/400?random=34',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=35',
                        'https://picsum.photos/400/400?random=36'
                    ]
                ]
            ],

            // Eco-Friendly
            'BioGlow' => [
                [
                    'name' => 'Déodorant Naturel',
                    'price' => 16.99,
                    'description' => 'Déodorant naturel sans aluminium 48h protection',
                    'image' => 'https://picsum.photos/400/400?random=37',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=38',
                        'https://picsum.photos/400/400?random=39'
                    ]
                ],
                [
                    'name' => 'Crème Visage Bio',
                    'price' => 29.50,
                    'description' => 'Crème visage bio certifiée vegan et cruelty-free',
                    'image' => 'https://picsum.photos/400/400?random=40',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=41',
                        'https://picsum.photos/400/400?random=42'
                    ]
                ],
                [
                    'name' => 'Gommage Écologique',
                    'price' => 24.99,
                    'description' => 'Gommage écologique aux coques de noix recyclées',
                    'image' => 'https://picsum.photos/400/400?random=43',
                    'gallery_images' => [
                        'https://picsum.photos/400/400?random=44',
                        'https://picsum.photos/400/400?random=45'
                    ]
                ]
            ],
        ];

        foreach ($productsData as $brandName => $products) {
            $brand = Brand::where('name', $brandName)->first();
            
            foreach ($products as $product) {
                Product::firstOrCreate(
                    ['name' => $product['name']], // clé de recherche
                    [
                        'slug' => Str::slug($product['name']),
                        'brand_id' => $brand->id,
                        'category_id' => $brand->category_id,
                        'price' => $product['price'],
                        'description' => $product['description'],
                        'image' => $product['image'],
                        'gallery_images' => $product['gallery_images'] ?? null,
                    ]
                );
            }
        }
    }
}