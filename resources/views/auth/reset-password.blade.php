<x-guest-layout>
    <div class="auth-card-header">
        <p class="auth-eyebrow">Sécurité</p>
        <h1>Nouveau mot de passe</h1>
        <p>Choisissez un mot de passe pour protéger votre espace BeautyStore.</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}" class="auth-form">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="auth-field">
            <x-input-label for="email" :value="__('Email')" class="auth-label" />
            <x-text-input id="email" class="auth-input" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="auth-error" />
        </div>

        <div class="auth-field">
            <x-input-label for="password" :value="__('Mot de passe')" class="auth-label" />
            <x-text-input id="password" class="auth-input" type="password" name="password" required autocomplete="new-password" />
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
            {{ __('Réinitialiser') }}
        </x-primary-button>
    </form>
</x-guest-layout>
