<x-guest-layout>
    <div class="auth-card-header">
        <p class="auth-eyebrow">Bon retour</p>
        <h1>Connexion</h1>
        <p>Connectez-vous pour retrouver votre panier, vos favoris et votre routine beauté.</p>
    </div>

    <x-auth-session-status class="auth-status" :status="session('status')" />

    <a href="{{ route('google.login') }}" class="auth-google-button">
        <span class="auth-google-mark">G</span>
        Se connecter avec Google
    </a>

    <div class="auth-separator">
        <span>ou</span>
    </div>

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="auth-field">
            <x-input-label for="email" :value="__('Email')" class="auth-label" />
            <x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="votre@email.com" />
            <x-input-error :messages="$errors->get('email')" class="auth-error" />
        </div>

        <div class="auth-field">
            <x-input-label for="password" :value="__('Mot de passe')" class="auth-label" />
            <x-text-input id="password" class="auth-input" type="password" name="password" required autocomplete="current-password" placeholder="Votre mot de passe" />
            <x-input-error :messages="$errors->get('password')" class="auth-error" />
        </div>

        <div class="auth-row">
            <label for="remember_me" class="auth-checkbox">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Se souvenir de moi</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="auth-link">Mot de passe oublié ?</a>
            @endif
        </div>

        <x-primary-button class="auth-submit">
            {{ __('Se connecter') }}
        </x-primary-button>
    </form>

    <p class="auth-footer-text">
        Pas encore de compte ?
        <a href="{{ route('register') }}" class="auth-link">Créer un compte</a>
    </p>
</x-guest-layout>
