<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory;

    protected $fillable =[
        'name',
        'image',
    ];

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
