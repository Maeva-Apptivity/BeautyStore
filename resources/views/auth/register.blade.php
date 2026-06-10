<x-guest-layout>
    <div class="auth-card-header">
        <p class="auth-eyebrow">Bienvenue</p>
        <h1>Créer un compte</h1>
        <p>Rejoignez BeautyStore pour suivre vos envies et commander plus rapidement.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="auth-grid">
            <div class="auth-field">
                <x-input-label for="first_name" :value="__('Prénom')" class="auth-label" />
                <x-text-input id="first_name" class="auth-input" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="given-name" />
                <x-input-error :messages="$errors->get('first_name')" class="auth-error" />
            </div>

            <div class="auth-field">
                <x-input-label for="last_name" :value="__('Nom')" class="auth-label" />
                <x-text-input id="last_name" class="auth-input" type="text" name="last_name" :value="old('last_name')" required autocomplete="family-name" />
                <x-input-error :messages="$errors->get('last_name')" class="auth-error" />
            </div>
        </div>

        <div class="auth-field">
            <x-input-label for="email" :value="__('Email')" class="auth-label" />
            <x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="auth-error" />
        </div>

        <div class="auth-field">
            <x-input-label for="password" :value="__('Mot de passe')" class="auth-label" />

            <x-text-input id="password" class="auth-input"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="auth-error" />
        </div>

        <div class="auth-field">
            <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="auth-label" />

            <x-text-input id="password_confirmation" class="auth-input"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="auth-error" />
        </div>

        <x-primary-button class="auth-submit">
            {{ __("S'inscrire") }}
        </x-primary-button>
    </form>

    <p class="auth-footer-text">
        Déjà inscrit ?
        <a href="{{ route('login') }}" class="auth-link">Se connecter</a>
    </p>
</x-guest-layout>
