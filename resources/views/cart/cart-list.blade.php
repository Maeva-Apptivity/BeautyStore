@extends('layouts.layouts')
@section('content')
@include('components/pop-up-deleteItem')

<div class="cart-page">
    <h2 class="cart-page-title">
        <i class='bx bx-shopping-bag'></i> Votre panier
    </h2>

    @auth
        @forelse ($cartItems as $cartItem)
            <div class="cart-item">
                <img src="{{ $cartItem->product->displayImage() }}" alt="{{ $cartItem->product->name }}" width="90" height="90">
                <div class="cart-item-info">
                    <p class="cart-item-name">{{ $cartItem->product->name }}</p>
                    <p class="cart-item-price">{{ number_format($cartItem->product->price, 2, ',', ' ') }} €</p>
                </div>
                <div class="cart-item-controls">
                    <form action="{{ route('cart.quantity.decrease', $cartItem->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="qty-btn" aria-label="Diminuer la quantité">
                            <i class='bx bx-minus'></i>
                        </button>
                    </form>
                    <span class="qty-value">{{ $cartItem->quantity }}</span>
                    <form method="POST" action="{{ route('cart.quantity.increase', $cartItem->id) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="qty-btn" aria-label="Augmenter la quantité">
                            <i class='bx bx-plus'></i>
                        </button>
                    </form>
                </div>
                <form action="{{ route('cart.item.remove', $cartItem->id) }}" method="POST" class="remove-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-btn">Supprimer</button>
                </form>
            </div>
        @empty
            <div class="cart-empty">
                <i class='bx bx-shopping-bag'></i>
                <h3>Votre panier est vide</h3>
                <p>Découvrez nos produits et ajoutez vos favoris à votre routine.</p>
                <a href="{{ route('homepage') }}" class="checkout-btn">Découvrir nos produits</a>
            </div>
        @endforelse

        @if($cartItems->count() > 0)
            <div class="cart-footer">
                <p class="cart-total">
                    Total :
                    <span>{{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2, ',', ' ') }} €</span>
                </p>
                <button class="checkout-btn">Passer la commande</button>
            </div>
        @endif

    @else

        @forelse ($cartItems as $id => $cartItem)
            <div class="cart-item">
                <img src="{{ $cartItem['image'] }}" alt="{{ $cartItem['name'] }}" width="90" height="90">
                <div class="cart-item-info">
                    <p class="cart-item-name">{{ $cartItem['name'] }}</p>
                    <p class="cart-item-price">{{ number_format($cartItem['price'], 2, ',', ' ') }} €</p>
                </div>
                <div class="cart-item-controls">
                    <form method="POST" action="{{ route('cart.quantity.decrease', $id) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="qty-btn" aria-label="Diminuer la quantité">
                            <i class='bx bx-minus'></i>
                        </button>
                    </form>
                    <span class="qty-value">{{ $cartItem['quantity'] }}</span>
                    <form method="POST" action="{{ route('cart.quantity.increase', $id) }}">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="qty-btn" aria-label="Augmenter la quantité">
                            <i class='bx bx-plus'></i>
                        </button>
                    </form>
                </div>
                <form method="POST" class="remove-form" action="{{ route('cart.item.remove', $id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-btn">Supprimer</button>
                </form>
            </div>
        @empty
            <div class="cart-empty">
                <i class='bx bx-shopping-bag'></i>
                <h3>Votre panier est vide</h3>
                <p>Découvrez nos produits et ajoutez vos favoris à votre routine.</p>
                <a href="{{ route('homepage') }}" class="checkout-btn">Découvrir nos produits</a>
            </div>
        @endforelse

        @if($cartItems->isNotEmpty())
            <div class="cart-footer">
                <p class="cart-total">
                    Total :
                    <span>{{ number_format($cartItems->sum(fn($i) => $i['price'] * $i['quantity']), 2, ',', ' ') }} €</span>
                </p>
                <a href="{{ route('login') }}" class="checkout-btn">Se connecter pour payer</a>
            </div>
        @endif

    @endauth
</div>

@endsection
