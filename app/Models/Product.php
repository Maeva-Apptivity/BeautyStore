<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable =[
        'category_id',
        'brand_id',
        'name',
        'slug',
        'price', 
        'description',
        'image',
        'gallery_images',  
    ];

    protected $casts =[
        'gallery_images'=> 'array',
    ];

    // un produit appartient une seule catégorie

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //  un produit appartient a une seul marque
    public function brands(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }


}
