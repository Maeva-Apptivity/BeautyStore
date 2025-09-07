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
                    'image' => 'https://source.unsplash.com/400x400/?cream,skincare',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?cosmetic,cream',
                        'https://source.unsplash.com/400x400/?face,moisturizer'
                    ]
                ],
                [
                    'name' => 'Sérum Anti-Âge',
                    'price' => 49.50,
                    'description' => 'Sérum concentré en rétinol et vitamine C pour lutter contre les signes de l\'âge',
                    'image' => 'https://source.unsplash.com/400x400/?serum,cosmetics',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?vitamin,skincare',
                        'https://source.unsplash.com/400x400/?beauty,serum'
                    ]
                ],
                [
                    'name' => 'Nettoyant Doux',
                    'price' => 18.75,
                    'description' => 'Nettoyant visage doux au pH neutre pour une peau nette sans irritation',
                    'image' => 'https://source.unsplash.com/400x400/?cleanser,skincare',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?facewash,beauty',
                        'https://source.unsplash.com/400x400/?soap,cleanser'
                    ]
                ]
            ],

            // Makeup
            'Glamora' => [
                [
                    'name' => 'Fond de Teint Mat',
                    'price' => 35.99,
                    'description' => 'Fond de teint matifiant longue tenue 16h',
                    'image' => 'https://source.unsplash.com/400x400/?foundation,makeup',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?makeup,foundation',
                        'https://source.unsplash.com/400x400/?cosmetics,liquid'
                    ]
                ],
                [
                    'name' => 'Palette Éclat',
                    'price' => 52.00,
                    'description' => 'Palette de fards à paupières nude et poudrés',
                    'image' => 'https://source.unsplash.com/400x400/?eyeshadow,palette',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?palette,makeup',
                        'https://source.unsplash.com/400x400/?eyeshadow,beauty'
                    ]
                ],
                [
                    'name' => 'Mascara Volume+',
                    'price' => 26.50,
                    'description' => 'Mascara volume intense waterproof',
                    'image' => 'https://source.unsplash.com/400x400/?mascara,makeup',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?eyes,makeup',
                        'https://source.unsplash.com/400x400/?lashes,cosmetics'
                    ]
                ]
            ],

            // HairCare
            'Silk & Pure' => [
                [
                    'name' => 'Shampoing Lissant',
                    'price' => 22.99,
                    'description' => 'Shampoing lissant brésilien à la kératine',
                    'image' => 'https://source.unsplash.com/400x400/?shampoo,hair',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?hair,product',
                        'https://source.unsplash.com/400x400/?shampoo,bottle'
                    ]
                ],
                [
                    'name' => 'Après-Shampoing Repair',
                    'price' => 24.50,
                    'description' => 'Après-shampoing réparateur pointes fourchues',
                    'image' => 'https://source.unsplash.com/400x400/?conditioner,haircare',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?haircare,product',
                        'https://source.unsplash.com/400x400/?conditioner,bottle'
                    ]
                ],
                [
                    'name' => 'Huile Capillaire',
                    'price' => 29.99,
                    'description' => 'Huile capillaire multi-usages brillance et nutrition',
                    'image' => 'https://source.unsplash.com/400x400/?hair,oilmist',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?hair,oil',
                        'https://source.unsplash.com/400x400/?serum,hair'
                    ]
                ]
            ],

            // Fragrance
            'Essentia' => [
                [
                    'name' => 'Eau de Parfum Florale',
                    'price' => 89.99,
                    'description' => 'Eau de parfum florale romantique et persistante',
                    'image' => 'https://source.unsplash.com/400x400/?perfume,floral',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?perfume,bottle',
                        'https://source.unsplash.com/400x400/?fragrance,floral'
                    ]
                ],
                [
                    'name' => 'Body Mist Fraîcheur',
                    'price' => 32.50,
                    'description' => 'Body mist fraîcheur quotidienne légère',
                    'image' => 'https://source.unsplash.com/400x400/?bodymist,fragrance',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?spray,cosmetics',
                        'https://source.unsplash.com/400x400/?mist,beauty'
                    ]
                ],
                [
                    'name' => 'Lotion Corporelle',
                    'price' => 28.99,
                    'description' => 'Lotion corporelle parfumée hydratante 24h',
                    'image' => 'https://source.unsplash.com/400x400/?bodylotion,beauty',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?lotion,cosmetics',
                        'https://source.unsplash.com/400x400/?cream,bodycare'
                    ]
                ]
            ],

            // Eco-Friendly
            'BioGlow' => [
                [
                    'name' => 'Déodorant Naturel',
                    'price' => 16.99,
                    'description' => 'Déodorant naturel sans aluminium 48h protection',
                    'image' => 'https://source.unsplash.com/400x400/?deodorant,eco',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?natural,care',
                        'https://source.unsplash.com/400x400/?eco,cosmetics'
                    ]
                ],
                [
                    'name' => 'Crème Visage Bio',
                    'price' => 29.50,
                    'description' => 'Crème visage bio certifiée vegan et cruelty-free',
                    'image' => 'https://source.unsplash.com/400x400/?organic,skincare',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?bio,cream',
                        'https://source.unsplash.com/400x400/?eco,skincare'
                    ]
                ],
                [
                    'name' => 'Gommage Écologique',
                    'price' => 24.99,
                    'description' => 'Gommage écologique aux coques de noix recyclées',
                    'image' => 'https://source.unsplash.com/400x400/?scrub,eco',
                    'gallery_images' => [
                        'https://source.unsplash.com/400x400/?gommage,skincare',
                        'https://source.unsplash.com/400x400/?eco,beauty'
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
