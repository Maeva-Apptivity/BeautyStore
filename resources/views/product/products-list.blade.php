@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="page-title">{{ $brand->name ?? 'Tous nos produits' }}</h1>

    <div class="products-grid">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div class="product-card">
                    <a href="{{ route('product.show', $product->slug) }}" class="product-link">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image" width="260" height="220" loading="lazy" decoding="async">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <p class="product-price">{{ $product->price }}€</p>
                    </a>

                    {{-- Bouton universel (connecté ou invité) --}}
                    <button
                        type="button"
                        class="add-to-cart-btn"
                        data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        data-image="{{ $product->image }}"
                    > Ajouter à ma routine </button>
                </div>
            @endforeach
        @else
            <div class="no-products-available">
                <h1>Aucun article disponible</h1>
                <p>Il n'y a actuellement aucun produit dans cette catégorie.</p>
            </div>
        @endif
    </div>
</div>
@endsection
