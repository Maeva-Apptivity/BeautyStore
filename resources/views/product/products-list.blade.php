@extends('layouts.layouts')

@section('content')
<div class="container">
    <h1 class="page-title">
        @if(!empty($search))
            Résultats pour « {{ $search }} »
        @else
            {{ $brand->name ?? 'Tous nos produits' }}
        @endif
    </h1>

    @php
        $wishlistIds = auth()->check()
            ? \App\Models\Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray()
            : array_keys(session()->get('wishlist', []));
    @endphp

    <div class="products-grid">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                @php($productImage = $product->displayImage())
                <div class="product-card">
                    <button
                        type="button"
                        class="wishlist-toggle-btn {{ in_array($product->id, $wishlistIds) ? 'active' : '' }}"
                        data-id="{{ $product->id }}"
                        aria-label="Ajouter aux favoris"
                    >
                        <i class="{{ in_array($product->id, $wishlistIds) ? 'bx bxs-heart' : 'bx bx-heart' }}"></i>
                    </button>

                    <a href="{{ route('product.show', $product->slug) }}" class="product-link">
                        <div class="product-image-wrapper">
                            <img src="{{ $productImage }}" alt="{{ $product->name }}" class="product-image" width="260" height="260" loading="lazy" decoding="async">
                        </div>
                        <p class="product-meta">{{ $product->brand->name ?? $product->category->name ?? 'BeautyStore' }}</p>
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <p class="product-price">{{ $product->price }}€</p>
                    </a>

                    <button
                        type="button"
                        class="add-to-cart-btn"
                        data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        data-image="{{ $productImage }}"
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
