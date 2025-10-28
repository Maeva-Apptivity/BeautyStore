@extends('layouts.layouts')
@section('content')
<h2>Votre panier</h2>

@if(auth()->check())
    @foreach ($cartItems as $cart)
        <div class="cart-item">
            <img src="{{ $cart->product->image }}" width="80">
            <p>{{ $cart->product->name }}</p>
            <p>{{ $cart->product->price }} €</p>
            <p>Quantité : {{ $cart->quantity }}</p>
        </div>
    @endforeach
@else
    @foreach ($cartItems as $id => $cart)
        <div class="cart-item">
            <img src="{{ $cart['image'] }}" width="80">
            <p>{{ $cart['name'] }}</p>
            <p>{{ $cart['price'] }} €</p>
            <p>Quantité : {{ $cart['quantity'] }}</p>
        </div>
    @endforeach
@endif

@if(auth()->check())
    <button>Payer</button>
@else
    <a href="{{ route('login') }}" class="btn btn-primary">Se connecter pour payer</a>
@endif



@endsection