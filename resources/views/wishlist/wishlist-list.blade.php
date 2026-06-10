@extends('layouts.layouts')
@section('content')

<div class="cart-page">
    <h2 class="cart-page-title">
        <i class='bx bx-heart'></i> Mes favoris
    </h2>

    @auth
        @forelse ($wishlistItems as $item)
            <div class="cart-item">
                <img src="{{ $item->product->displayImage() }}" alt="{{ $item->product->name }}" width="90" height="90">
                <div class="cart-item-info">
                    <p class="cart-item-name">
                        <a href="{{ route('product.show', $item->product->slug) }}">{{ $item->product->name }}</a>
                    </p>
                    <p class="cart-item-price">{{ number_format($item->product->price, 2, ',', ' ') }} €</p>
                </div>
                <div class="cart-item-controls">
                    <button
                        type="button"
                        class="add-to-cart-btn"
                        data-id="{{ $item->product->id }}"
                        data-name="{{ $item->product->name }}"
                        data-price="{{ $item->product->price }}"
                        data-image="{{ $item->product->displayImage() }}"
                    >Ajouter au panier</button>
                </div>
                <form action="{{ route('wishlist.remove', $item->id) }}" method="POST" class="remove-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-btn">Retirer</button>
                </form>
            </div>
        @empty
            <div class="cart-empty">
                <i class='bx bx-heart'></i>
                <h3>Aucun favori pour l'instant</h3>
                <p>Ajoutez des produits à vos favoris pour les retrouver facilement.</p>
                <a href="{{ route('product.list') }}" class="checkout-btn">Découvrir nos produits</a>
            </div>
        @endforelse

    @else
        @forelse ($wishlistItems as $product)
            <div class="cart-item">
                <img src="{{ $product->displayImage() }}" alt="{{ $product->name }}" width="90" height="90">
                <div class="cart-item-info">
                    <p class="cart-item-name">
                        <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                    </p>
                    <p class="cart-item-price">{{ number_format($product->price, 2, ',', ' ') }} €</p>
                </div>
                <div class="cart-item-controls">
                    <button
                        type="button"
                        class="add-to-cart-btn"
                        data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        data-image="{{ $product->displayImage() }}"
                    >Ajouter au panier</button>
                </div>
                <form action="{{ route('wishlist.remove', $product->id) }}" method="POST" class="remove-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-btn">Retirer</button>
                </form>
            </div>
        @empty
            <div class="cart-empty">
                <i class='bx bx-heart'></i>
                <h3>Aucun favori pour l'instant</h3>
                <p>Ajoutez des produits à vos favoris pour les retrouver facilement.</p>
                <a href="{{ route('product.list') }}" class="checkout-btn">Découvrir nos produits</a>
            </div>
        @endforelse

        @if($wishlistItems->isNotEmpty())
            <div class="cart-footer">
                <a href="{{ route('login') }}" class="checkout-btn">Se connecter pour sauvegarder mes favoris</a>
            </div>
        @endif
    @endauth
</div>

@endsection
