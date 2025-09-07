@extends('layouts.layouts')
@section('content')



    <div class="container">
        <h1 class="page-title">All Products</h1>

        <div class="products-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    <a href="{{route('product.show', $product->slug)}}" class="product-link">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <p class="product-price">{{($product->price) }}€</p>
                    </a>
                    <button class="add-to-bag">Add to Bag</button>
                </div>
            @endforeach
        </div>
    </div>

@endsection