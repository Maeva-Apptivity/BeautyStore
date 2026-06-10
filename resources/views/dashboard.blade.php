@extends('layouts.layouts')

@section('content')
@php
    $user = auth()->user();
    $userName = trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? ''))
        ?: ($user->name ?? 'votre espace');
    $cartItemsCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
@endphp

<main class="dashboard-page">
    <section class="dashboard-hero">
        <div class="dashboard-hero-content">
            <p class="dashboard-eyebrow">Mon espace BeautyStore</p>
            <h1>Bonjour {{ $userName }}</h1>
            <p>
                Retrouvez votre routine, votre panier et vos informations de compte dans un espace simple et doux.
            </p>
            <div class="dashboard-actions">
                <a href="{{ route('product.list') }}" class="dashboard-btn dashboard-btn-primary">
                    <i class='bx bx-store'></i>
                    Découvrir les produits
                </a>
                <a href="{{ route('profile.edit') }}" class="dashboard-btn dashboard-btn-secondary">
                    <i class='bx bx-user'></i>
                    Modifier mon profil
                </a>
            </div>
        </div>
        <div class="dashboard-profile-card">
            <span class="dashboard-card-label">Compte connecté</span>
            <strong>{{ $user->email }}</strong>
            <span>{{ $user->email_verified_at ? 'E-mail vérifié' : 'E-mail à vérifier' }}</span>
        </div>
    </section>

    <section class="dashboard-grid" aria-label="Raccourcis de mon compte">
        <article class="dashboard-card">
            <div class="dashboard-card-icon">
                <i class='bx bx-shopping-bag'></i>
            </div>
            <div>
                <span class="dashboard-card-label">Panier</span>
                <h2>{{ $cartItemsCount }} article{{ $cartItemsCount > 1 ? 's' : '' }}</h2>
                <p>Consultez les produits ajoutés à votre routine beauté.</p>
            </div>
            <a href="{{ route('cart.list') }}" class="dashboard-card-link">Voir mon panier</a>
        </article>

        <article class="dashboard-card">
            <div class="dashboard-card-icon">
                <i class='bx bx-heart'></i>
            </div>
            <div>
                <span class="dashboard-card-label">Favoris</span>
                <h2>Ma sélection</h2>
                <p>Gardez vos envies skincare et maquillage à portée de main.</p>
            </div>
            <a href="{{ route('homepage') }}" class="dashboard-card-link">Explorer la boutique</a>
        </article>

        <article class="dashboard-card">
            <div class="dashboard-card-icon">
                <i class='bx bx-cog'></i>
            </div>
            <div>
                <span class="dashboard-card-label">Profil</span>
                <h2>Mes informations</h2>
                <p>Mettez à jour vos coordonnées et sécurisez votre compte.</p>
            </div>
            <a href="{{ route('profile.edit') }}" class="dashboard-card-link">Gérer mon profil</a>
        </article>
    </section>

    <section class="dashboard-signout">
        <div>
            <h2>Besoin de faire une pause ?</h2>
            <p>Vous pourrez retrouver votre espace BeautyStore à tout moment.</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dashboard-btn dashboard-btn-secondary">
                <i class='bx bx-log-out'></i>
                Se déconnecter
            </button>
        </form>
    </section>
</main>
@endsection
