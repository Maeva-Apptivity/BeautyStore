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
                    'image' => 'skincare/luminea-creme-hydratante.jpg',
                    //  'gallery_images' => [
                    //     'products/nettoyant-1.jpg',
                    //     'products/nettoyant-2.jpg'
                    // ]
                ],
                [
                    'name' => 'Sérum Anti-Âge',
                    'price' => 49.50,
                    'description' => 'Sérum concentré en rétinol et vitamine C pour lutter contre les signes de l\'âge',
                    'image' => 'skincare/luminea-serum-anti-age.jpg'
                ],
                [
                    'name' => 'Nettoyant Doux',
                    'price' => 18.75,
                    'description' => 'Nettoyant visage doux au pH neutre pour une peau nette sans irritation',
                    'image' => 'skincare/luminea-nettoyant.jpg'
                ]
            ],
            'Dermavie' => [
                [
                    'name' => 'Crème Réparatrice',
                    'price' => 28.99,
                    'description' => 'Crème réparatrice à la centella asiatica pour peaux sensibles',
                    'image' => 'skincare/dermavie-creme-reparatrice.jpg'
                ],
                [
                    'name' => 'Gel Aloe Vera',
                    'price' => 22.50,
                    'description' => 'Gel 99% aloe vera pur pour apaiser et hydrater instantanément',
                    'image' => 'skincare/dermavie-gel-aloe.jpg'
                ],
                [
                    'name' => 'Masque Nourrissant',
                    'price' => 34.99,
                    'description' => 'Masque overnight enrichi en beurre de karité et huiles nourrissantes',
                    'image' => 'skincare/dermavie-masque-nourrissant.jpg'
                ]
            ],
            'PureGlow' => [
                [
                    'name' => 'Sérum Vitamine C',
                    'price' => 42.00,
                    'description' => 'Sérum éclat 20% vitamine C stable pour un teint radieux',
                    'image' => 'skincare/pureglow-serum-vitaminec.jpg'
                ],
                [
                    'name' => 'Crème de Nuit',
                    'price' => 38.50,
                    'description' => 'Crème de nuit régénérante aux peptides et antioxydants',
                    'image' => 'skincare/pureglow-creme-nuit.jpg'
                ],
                [
                    'name' => 'Gommage Doux',
                    'price' => 24.99,
                    'description' => 'Gommage enzymatique aux particules fines pour une exfoliation douce',
                    'image' => 'skincare/pureglow-gommage.jpg'
                ]
            ],
            'SkinHarmony' => [
                [
                    'name' => 'Nettoyant Moussant',
                    'price' => 21.99,
                    'description' => 'Nettoyant moussant purifiant à l\'huile de tea tree',
                    'image' => 'skincare/skinharmony-nettoyant.jpg'
                ],
                [
                    'name' => 'Crème SPF 30',
                    'price' => 29.50,
                    'description' => 'Crème hydratante avec protection solaire SPF 30 quotidienne',
                    'image' => 'skincare/skinharmony-spf30.jpg'
                ],
                [
                    'name' => 'Sérum Hydratation Intense',
                    'price' => 45.00,
                    'description' => 'Sérum hydratation intense à l\'acide hyaluronique 3 poids moléculaires',
                    'image' => 'skincare/skinharmony-serum-hydratation.jpg'
                ]
            ],

            // Makeup
            'Glamora' => [
                [
                    'name' => 'Fond de Teint Mat',
                    'price' => 35.99,
                    'description' => 'Fond de teint matifiant longue tenue 16h',
                    'image' => 'makeup/glamora-fond-teint.jpg'
                ],
                [
                    'name' => 'Palette Éclat',
                    'price' => 52.00,
                    'description' => 'Palette de fards à paupières nude et poudrés',
                    'image' => 'makeup/glamora-palette.jpg',
                    'gallery_images' => ['makeup/glamora-palette-1.jpg', 'makeup/glamora-palette-2.jpg']
                ],
                [
                    'name' => 'Mascara Volume+',
                    'price' => 26.50,
                    'description' => 'Mascara volume intense waterproof',
                    'image' => 'makeup/glamora-mascara.jpg'
                ]
            ],
            'ChicLook' => [
                [
                    'name' => 'Rouge À Lèvres Velours',
                    'price' => 28.99,
                    'description' => 'Rouge à lèvres velours mat longue tenue',
                    'image' => 'makeup/chiclook-rouge-levres.jpg'
                ],
                [
                    'name' => 'Anti-Cernes',
                    'price' => 24.50,
                    'description' => 'Anti-cernes couvrant et hydratant',
                    'image' => 'makeup/chiclook-anti-cernes.jpg'
                ],
                [
                    'name' => 'Poudre Libre',
                    'price' => 32.00,
                    'description' => 'Poudre libre matifiante finition naturelle',
                    'image' => 'makeup/chiclook-poudre.jpg'
                ]
            ],
            'BellaCrème' => [
                [
                    'name' => 'Highlighter Doré',
                    'price' => 29.99,
                    'description' => 'Highlighter poudre doré effet glow naturel',
                    'image' => 'makeup/bellacreme-highlighter.jpg'
                ],
                [
                    'name' => 'Base Maquillage',
                    'price' => 27.50,
                    'description' => 'Base maquillage lissante et blur effet',
                    'image' => 'makeup/bellacreme-base.jpg'
                ],
                [
                    'name' => 'Gloss Brillant',
                    'price' => 22.99,
                    'description' => 'Gloss non collant effet miroir',
                    'image' => 'makeup/bellacreme-gloss.jpg'
                ]
            ],
            'LuxeLips' => [
                [
                    'name' => 'Rouge À Lèvres Liquide',
                    'price' => 31.50,
                    'description' => 'Rouge à lèvres liquide mat transfert proof',
                    'image' => 'makeup/luxelips-rouge-liquide.jpg'
                ],
                [
                    'name' => 'Crayon Lipliner',
                    'price' => 19.99,
                    'description' => 'Crayon lipliner précision longue tenue',
                    'image' => 'makeup/luxelips-lipliner.jpg'
                ],
                [
                    'name' => 'Baume Teinté',
                    'price' => 23.00,
                    'description' => 'Baume à lèvres teinté soin et couleur',
                    'image' => 'makeup/luxelips-baume.jpg'
                ]
            ],
            'DivineTouch' => [
                [
                    'name' => 'Fard À Paupières',
                    'price' => 25.99,
                    'description' => 'Fard à paupières mono effet métallisé',
                    'image' => 'makeup/divinetouch-fard.jpg'
                ],
                [
                    'name' => 'Correcteur',
                    'price' => 23.50,
                    'description' => 'Correcteur haute couvrance multi-usages',
                    'image' => 'makeup/divinetouch-correcteur.jpg'
                ],
                [
                    'name' => 'Spray Fixant',
                    'price' => 28.00,
                    'description' => 'Spray fixant maquillage 16h de tenue',
                    'image' => 'makeup/divinetouch-spray.jpg'
                ]
            ],

            // HairCare
            'Silk & Pure' => [
                [
                    'name' => 'Shampoing Lissant',
                    'price' => 22.99,
                    'description' => 'Shampoing lissant brésilien à la kératine',
                    'image' => 'haircare/silk-shampoing.jpg'
                ],
                [
                    'name' => 'Après-Shampoing Repair',
                    'price' => 24.50,
                    'description' => 'Après-shampoing réparateur pointes fourchues',
                    'image' => 'haircare/silk-apres-shampoing.jpg'
                ],
                [
                    'name' => 'Huile Capillaire',
                    'price' => 29.99,
                    'description' => 'Huile capillaire multi-usages brillance et nutrition',
                    'image' => 'haircare/silk-huile.jpg'
                ]
            ],
            'Follicare' => [
                [
                    'name' => 'Shampoing Fortifiant',
                    'price' => 26.99,
                    'description' => 'Shampoing fortifiant anti-chute et croissance',
                    'image' => 'haircare/follicare-shampoing.jpg'
                ],
                [
                    'name' => 'Sérum Croissance',
                    'price' => 38.50,
                    'description' => 'Sérum croissance cheveux aux huiles essentielles',
                    'image' => 'haircare/follicare-serum.jpg'
                ],
                [
                    'name' => 'Masque Kératine',
                    'price' => 32.00,
                    'description' => 'Masque reconstructeur à la kératine pure',
                    'image' => 'haircare/follicare-masque.jpg'
                ]
            ],
            'NourishLocks' => [
                [
                    'name' => 'Shampoing Hydratation',
                    'price' => 23.99,
                    'description' => 'Shampoing ultra-hydratant à l\'aloe vera',
                    'image' => 'haircare/nourishlocks-shampoing.jpg'
                ],
                [
                    'name' => 'Baume Sans Rinçage',
                    'price' => 21.50,
                    'description' => 'Baume sans rinçage démêlant et protecteur',
                    'image' => 'haircare/nourishlocks-baume.jpg'
                ],
                [
                    'name' => 'Spray Protecteur',
                    'price' => 25.99,
                    'description' => 'Spray protecteur thermique jusqu\'à 230°C',
                    'image' => 'haircare/nourishlocks-spray.jpg'
                ]
            ],
            'Bouclévia' => [
                [
                    'name' => 'Shampoing Définissant',
                    'price' => 24.99,
                    'description' => 'Shampoing définissant boucles sans sulfates',
                    'image' => 'haircare/bouclevia-shampoing.jpg',
                    'gallery_images' => ['haircare/bouclevia-shampoing-1.jpg', 'haircare/bouclevia-shampoing-2.jpg']
                ],
                [
                    'name' => 'Masque Boucles',
                    'price' => 29.50,
                    'description' => 'Masque nutritif intensif pour boucles définies',
                    'image' => 'haircare/bouclevia-masque.jpg'
                ],
                [
                    'name' => 'Gel Coiffant Curly',
                    'price' => 18.75,
                    'description' => 'Gel coiffant définissant boucles sans cruauté',
                    'image' => 'haircare/bouclevia-gel.jpg'
                ]
            ],
            'HairElixir' => [
                [
                    'name' => 'Shampoing Démêlant',
                    'price' => 22.50,
                    'description' => 'Shampoing démêlant ultra-doux cheveux frisés',
                    'image' => 'haircare/hairelixir-shampoing.jpg'
                ],
                [
                    'name' => 'Huile Sèche',
                    'price' => 27.99,
                    'description' => 'Huile sèche légère effet brillant sans gras',
                    'image' => 'haircare/hairelixir-huile.jpg'
                ],
                [
                    'name' => 'Lait Capillaire',
                    'price' => 23.00,
                    'description' => 'Lait capillaire hydratant et disciplinant',
                    'image' => 'haircare/hairelixir-lait.jpg'
                ]
            ],

            // Fragrance
            'Essentia' => [
                [
                    'name' => 'Eau de Parfum Florale',
                    'price' => 89.99,
                    'description' => 'Eau de parfum florale romantique et persistante',
                    'image' => 'fragrance/essentia-parfum.jpg'
                ],
                [
                    'name' => 'Body Mist Fraîcheur',
                    'price' => 32.50,
                    'description' => 'Body mist fraîcheur quotidienne légère',
                    'image' => 'fragrance/essentia-mist.jpg'
                ],
                [
                    'name' => 'Lotion Corporelle',
                    'price' => 28.99,
                    'description' => 'Lotion corporelle parfumée hydratante 24h',
                    'image' => 'fragrance/essentia-lotion.jpg'
                ]
            ],
            'Mystéria' => [
                [
                    'name' => 'Parfum Boisé',
                    'price' => 95.00,
                    'description' => 'Parfum boisé oriental notes mystérieuses',
                    'image' => 'fragrance/mysteria-boise.jpg'
                ],
                [
                    'name' => 'Roll-On Sensuel',
                    'price' => 35.99,
                    'description' => 'Roll-on parfumé pratique notes sensuelles',
                    'image' => 'fragrance/mysteria-rollon.jpg'
                ],
                [
                    'name' => 'Savon Parfumé',
                    'price' => 18.50,
                    'description' => 'Savon artisanal parfumé longue durée',
                    'image' => 'fragrance/mysteria-savon.jpg'
                ]
            ],
            'VanillaBloom' => [
                [
                    'name' => 'Eau de Toilette Vanille',
                    'price' => 65.99,
                    'description' => 'Eau de toilette vanille gourmande et réconfortante',
                    'image' => 'fragrance/vanillabloom-toilette.jpg'
                ],
                [
                    'name' => 'Crème Main Gourmande',
                    'price' => 22.00,
                    'description' => 'Crème mains parfumée vanille nourrissante',
                    'image' => 'fragrance/vanillabloom-creme.jpg'
                ],
                [
                    'name' => 'Bombe de Bain',
                    'price' => 15.99,
                    'description' => 'Bombe de bain effervescente parfum vanille',
                    'image' => 'fragrance/vanillabloom-bombe.jpg'
                ]
            ],
            'Fleur d\'Éden' => [
                [
                    'name' => 'Parfum Romantique',
                    'price' => 78.50,
                    'description' => 'Parfum romantique floral bouquet printanier',
                    'image' => 'fragrance/fleureden-parfum.jpg'
                ],
                [
                    'name' => 'Sérum Cheveux Parfumé',
                    'price' => 34.99,
                    'description' => 'Sérum cheveux parfumé brillant et disciplinant',
                    'image' => 'fragrance/fleureden-serum.jpg'
                ],
                [
                    'name' => 'Gel Douche',
                    'price' => 19.99,
                    'description' => 'Gel douche luxueux parfumé soin hydratant',
                    'image' => 'fragrance/fleureden-gel.jpg'
                ]
            ],

            // Eco-Friendly
            'BioGlow' => [
                [
                    'name' => 'Déodorant Naturel',
                    'price' => 16.99,
                    'description' => 'Déodorant naturel sans aluminium 48h protection',
                    'image' => 'ecofriendly/bioglow-deodorant.jpg'
                ],
                [
                    'name' => 'Crème Visage Bio',
                    'price' => 29.50,
                    'description' => 'Crème visage bio certifiée vegan et cruelty-free',
                    'image' => 'ecofriendly/bioglow-creme.jpg'
                ],
                [
                    'name' => 'Gommage Écologique',
                    'price' => 24.99,
                    'description' => 'Gommage écologique aux coques de noix recyclées',
                    'image' => 'ecofriendly/bioglow-gommage.jpg'
                ]
            ],
            'GreenEssence' => [
                [
                    'name' => 'Shampoing Solide',
                    'price' => 18.50,
                    'description' => 'Shampoing solide zéro déchet cheveux normaux',
                    'image' => 'ecofriendly/greenessence-shampoing.jpg'
                ],
                [
                    'name' => 'Dentifrice Zéro Déchet',
                    'price' => 12.99,
                    'description' => 'Dentifrice solide zéro déchet au charbon actif',
                    'image' => 'ecofriendly/greenessence-dentifrice.jpg'
                ],
                [
                    'name' => 'Huile Corps Vegan',
                    'price' => 27.00,
                    'description' => 'Huile corps vegan multi-usages bio',
                    'image' => 'ecofriendly/greenessence-huile.jpg'
                ]
            ],
            'PureVéa' => [
                [
                    'name' => 'Savon Artisanal',
                    'price' => 14.99,
                    'description' => 'Savon artisanal fait main surgras',
                    'image' => 'ecofriendly/purevea-savon.jpg'
                ],
                [
                    'name' => 'Masque Argile Purifiant',
                    'price' => 22.50,
                    'description' => 'Masque argile verte purifiant peau grasse',
                    'image' => 'ecofriendly/purevea-masque.jpg'
                ],
                [
                    'name' => 'Spray Corporel',
                    'price' => 19.99,
                    'description' => 'Spray corporel rafraîchissant aux huiles essentielles',
                    'image' => 'ecofriendly/purevea-spray.jpg'
                ]
            ]
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
                        // 'gallery_images' => $product['gallery_images'] ?? null
                    ]
                );
            }
        }
    }
}
