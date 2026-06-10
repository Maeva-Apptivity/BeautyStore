@extends('layouts.layouts')
@section('content')
@include('components/pop-up-deleteItem')
<link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>

<h2>Votre panier</h2>

{{-- Utilisateur connectées --}}
@if(auth()->check())
    @foreach ($cartItems as $cartItem)
        <div class="cart-item">
            <img src="{{ $cartItem->product->image }}" width="80">
            <p>{{ $cartItem->product->name }}</p>
            <p>{{ $cartItem->product->price }} €</p>

            {{-- Bouton diminuer --}}
            <form action="{{route('cart.quantity.decrease',$cartItem->id)}}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit"> 
                        <i class='bx  bx-minus'  ></i> 
                </button>
            </form>

                <p>{{ $cartItem->quantity }}</p>
        
            {{-- Bouton augmenter --}}
            <form method="POST" action="{{route('cart.quantity.increase',$cartItem->id)}} >
                @csrf
                @method('PUT')
                <button type="submit"> 
                    <i class='bx  bx-plus'  ></i> 
                </button>
            </form>

            {{-- Bouton supprimer --}}
            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST" class="remove-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-btn">Supprimer</button>
            </form>
        </div>
    @endforeach
@else

{{-- Utlisateur non connecté --}}
    @foreach ($cartItems as $id => $cartItem)
        <div class="cart-item">
            <img src="{{ $cartItem['image'] }}" width="80">
            <p>{{ $cartItem['name'] }}</p>
            <p>{{ $cartItem['price'] }} €</p>

            {{-- Bouton diminuer --}}
            <form method="POST" action="{{route('cart.quantity.decrease',$id)}}">
                @csrf
                @method('PUT')
                <button type="submit"> 
                    <i class='bx  bx-minus'  ></i> 
                </button>
            </form>
                <p> {{ $cartItem['quantity'] }}</p>

            {{-- Bouton augmenter --}}
            <form method="POST" action="{{route('cart.quantity.increase',$id)}}">
                @csrf
                @method('PUT')
                <button type="submit"> 
                    <i class='bx  bx-plus'  ></i> 
                </button>
            </form>

            {{-- Bouton supprimer --}}
            <form method="POST" class="remove-form" action="{{route ('cart.item.remove',$id)}}" >
                @csrf
                @method ('DELETE')
                <button type="submit" class="remove-btn">Supprimer </button>
            </form>
        </div>
    @endforeach
@endif

    @if(auth()->check())
        <button>Payer</button>
    @else
        <a href="{{ route('login') }}" class="btn btn-primary">Se connecter pour payer</a>
    @endif

@endsection