<x-guest-layout>
    <div class="auth-card-header">
        <p class="auth-eyebrow">Accès au compte</p>
        <h1>Mot de passe oublié</h1>
        <p>Indiquez votre email et nous vous enverrons un lien pour créer un nouveau mot de passe.</p>
    </div>

    <x-auth-session-status class="auth-status" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="auth-form">
        @csrf

        <div class="auth-field">
            <x-input-label for="email" :value="__('E-mail')" class="auth-label" />
            <x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="auth-error" />
        </div>

        <x-primary-button class="auth-submit">
            {{ __('Envoyer le lien') }}
        </x-primary-button>
    </form>

    <p class="auth-footer-text">
        Vous avez retrouvé votre mot de passe ?
        <a href="{{ route('login') }}" class="auth-link">Se connecter</a>
    </p>
</x-guest-layout>
