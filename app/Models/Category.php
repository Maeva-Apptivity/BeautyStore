<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    
    // Protection de mes champs
    protected $fillable = [
        'name',
        'slug',
    ];

    // Création d'une fonction qui génèrera automatiquement un slug
    protected static function booted()
    {
        // crée le slug lors de la création du nom de ma catégorie
        static::creating(function($category){
            $category->slug = Str::slug($category->name);
        });

        // modifie le slug lors de la modification du nom de ma catégorie
        static::updating(function($category){
            $category->slug = Str::slug($category->name);
        });
    }

    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }
    // Une category a plusieurs produits
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
