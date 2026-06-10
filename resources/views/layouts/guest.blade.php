<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BeautyStore') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('style.css') }}">
    </head>
    <body class="auth-page">
        <main class="auth-shell">
            <a href="{{ route('homepage') }}" class="auth-logo-link" aria-label="Retour à l'accueil BeautyStore">
                <img src="{{ asset('assets/logo-dark.png') }}" class="logo auth-logo" alt="BeautyStore" width="92" height="92">
            </a>

            <section class="auth-card">
                {{ $slot }}
            </section>

            <a href="{{ route('homepage') }}" class="auth-back-link">Retour à la boutique</a>

            @include('sweetalert2::index')
        </main>
    </body>
</html>
