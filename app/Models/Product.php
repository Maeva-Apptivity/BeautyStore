<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    protected static function booted()
    {
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    // un produit appartient une seule catégorie

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //  un produit appartient a une seul marque
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function carts():HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
