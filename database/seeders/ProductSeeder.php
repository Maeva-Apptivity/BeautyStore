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
        $skincareImages = [
            'https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1571781926291-c477ebfd024b?auto=format&fit=crop&w=900&q=80',
        ];

        $makeupImages = [
            'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1512496015851-a90fb38ba796?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1522338242992-e1a54906a8da?auto=format&fit=crop&w=900&q=80',
        ];

        $haircareImages = [
            'https://images.unsplash.com/photo-1527799820374-dcf8d9d4a388?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1522338242992-e1a54906a8da?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=80',
        ];

        $fragranceImages = [
            'https://images.unsplash.com/photo-1541643600914-78b084683601?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1585386959984-a41552231658?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1619994403073-2cec844b8e63?auto=format&fit=crop&w=900&q=80',
        ];

        $ecoImages = [
            'https://images.unsplash.com/photo-1601049541289-9b1b7bbbfe19?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1556228578-8c89e6adf883?auto=format&fit=crop&w=900&q=80',
            'https://images.unsplash.com/photo-1567721913486-6585f069b332?auto=format&fit=crop&w=900&q=80',
        ];

        $product = fn (string $name, float $price, string $description, array $images): array => [
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'image' => $images[0],
            'gallery_images' => array_slice($images, 1),
        ];

        Product::whereIn('name', [
            'Brume Tonique Rose',
            'Blush Crème Pêche',
            'Masque Nutrition Intense',
            'Spray Thermoprotecteur',
            'Parfum Solide Ambre',
            'Huile Sèche Satinée',
            'Savon Surgras Amande',
            'Baume Lèvres Vegan',
        ])->delete();

        // Tableau de produits contenant la marque, le prix, l'image et sa description.
        $productsData = [
            // Skincare
            'Luminéa' => [
                $product('Crème Hydratante Éclat', 32.99, 'Crème de jour hydratante à l\'acide hyaluronique pour un teint éclatant.', $skincareImages),
                $product('Sérum Anti-Âge', 49.50, 'Sérum concentré en rétinol et vitamine C pour lutter contre les signes de l\'âge.', array_merge(array_slice($skincareImages, 2), array_slice($skincareImages, 0, 2))),
                $product('Nettoyant Doux', 18.75, 'Nettoyant visage doux au pH neutre pour une peau nette sans irritation.', array_merge(array_slice($skincareImages, 3), array_slice($skincareImages, 0, 3))),
                $product('Masque Nuit Repulpant', 38.90, 'Masque de nuit nourrissant qui aide la peau à retrouver confort, souplesse et luminosité au réveil.', array_merge(array_slice($skincareImages, 1), array_slice($skincareImages, 0, 1))),
            ],

            // Makeup
            'Glamora' => [
                $product('Fond de Teint Mat', 35.99, 'Fond de teint matifiant longue tenue 16h.', $makeupImages),
                $product('Palette Éclat', 52.00, 'Palette de fards à paupières nude et poudrés.', array_merge(array_slice($makeupImages, 1), array_slice($makeupImages, 0, 1))),
                $product('Mascara Volume+', 26.50, 'Mascara volume intense waterproof.', array_merge(array_slice($makeupImages, 2), array_slice($makeupImages, 0, 2))),
                $product('Rouge Velours', 24.90, 'Rouge à lèvres crémeux au fini velours, confortable et pigmenté dès le premier passage.', array_merge(array_slice($makeupImages, 3), array_slice($makeupImages, 0, 3))),
            ],

            // HairCare
            'Silk & Pure' => [
                $product('Shampoing Lissant', 22.99, 'Shampoing lissant brésilien à la kératine.', $haircareImages),
                $product('Après-Shampoing Repair', 24.50, 'Après-shampoing réparateur pour aider à lisser les pointes fourchues.', array_merge(array_slice($haircareImages, 1), array_slice($haircareImages, 0, 1))),
                $product('Huile Capillaire', 29.99, 'Huile capillaire multi-usages pour apporter brillance et nutrition.', array_merge(array_slice($haircareImages, 2), array_slice($haircareImages, 0, 2))),
            ],

            // Fragrance
            'Essentia' => [
                $product('Eau de Parfum Florale', 89.99, 'Eau de parfum florale romantique et persistante.', $fragranceImages),
                $product('Body Mist Fraîcheur', 32.50, 'Body mist léger pour parfumer la peau au quotidien.', array_merge(array_slice($fragranceImages, 1), array_slice($fragranceImages, 0, 1))),
                $product('Lotion Corporelle', 28.99, 'Lotion corporelle parfumée hydratante 24h.', array_merge(array_slice($fragranceImages, 2), array_slice($fragranceImages, 0, 2))),
            ],

            // Eco-Friendly
            'BioGlow' => [
                $product('Déodorant Naturel', 16.99, 'Déodorant naturel sans aluminium avec 48h de protection.', $ecoImages),
                $product('Crème Visage Bio', 29.50, 'Crème visage bio certifiée vegan et cruelty-free.', array_merge(array_slice($ecoImages, 1), array_slice($ecoImages, 0, 1))),
                $product('Gommage Écologique', 24.99, 'Gommage écologique aux coques de noix recyclées.', array_merge(array_slice($ecoImages, 2), array_slice($ecoImages, 0, 2))),
            ],
        ];

        foreach ($productsData as $brandName => $products) {
            $brand = Brand::where('name', $brandName)->first();
            
            foreach ($products as $product) {
                Product::updateOrCreate(
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
