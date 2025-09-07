@extends('layouts.layouts')

@section('content')
<h1>{{ $brand->name }} dans {{ $category->name }}</h1>

<div class="products-grid">
    @forelse ($products as $product)
        <div class="product-card">
            <a href="{{ route('product.show', $product->slug) }}" class="product-link">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->price }}€</p>
            </a>
            <button class="add-to-cart">Add to Bag</button>
        </div>
    @empty
        <p>Aucun produit disponible pour cette marque.</p>
    @endforelse
</div>
@endsection
