<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route-cart-add" content="{{ route('cart.addAjax') }}">
    <meta name="route-cart-add-detail" content="{{ route('cart.add.fromDetail') }}">
    <meta name="route-wishlist-toggle" content="{{ route('wishlist.toggle') }}">
    <title>BeautyStore</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @include('sweetalert2::index')
    <link rel="preload" href="{{ asset('assets/sakura1.webp') }}" as="image" type="image/webp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://unpkg.com">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    @vite(['resources/js/addToCart.js'])
</head>
<body>
    <x-header/>
    @yield('content')
    <x-cart-sidebar/>

    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-brand">
                <img src="{{ asset('assets/logo-dark.png') }}" class="logo" alt="BeautyStore" width="70" height="70">
                <p>Votre destination beauté & skincare.<br>Des produits soigneusement sélectionnés pour sublimer votre routine.</p>
            </div>
            <div class="footer-col">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="{{ route('homepage') }}">Accueil</a></li>
                    <li><a href="{{ route('cart.list') }}">Mon panier</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Compte</h4>
                <ul>
                    @auth
                        <li><a href="{{ route('dashboard') }}">Mon espace</a></li>
                        <li><a href="{{ route('profile.edit') }}">Mon profil</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Se connecter</a></li>
                        <li><a href="{{ route('register') }}">S'inscrire</a></li>
                    @endauth
                </ul>
            </div>
            <div class="footer-col">
                <h4>Légal</h4>
                <ul>
                    <li><a href="#">Mentions légales</a></li>
                    <li><a href="#">Confidentialité</a></li>
                    <li><a href="#">CGV</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} BeautyStore &mdash; Tous droits réservés</span>
            <span>Produit par Maeva chez Studio Apptivity</span>
        </div>
    </footer>
</body>
</html>
