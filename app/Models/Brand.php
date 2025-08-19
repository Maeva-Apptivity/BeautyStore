<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory;

    protected $fillable =[
        'category_id',
        'name',
        'slug',
        'image',
    ];

    // Création de ma fonction pour générer automatiquement le slug a chaque création et modification
    protected static function booted()
    {
        // fonction pour crée le slug
        static::creating(function($brand){
            $brand->slug = Str::slug($brand->name);
        });

        // fonction pour modifie le slug si le nom a changer
        static::updating(function($brand){
            $brand->slug = Str::slug($brand->name);
        });
    }

    // une marque a une seule catégorie 
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    // une marque a plusieur produits
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
