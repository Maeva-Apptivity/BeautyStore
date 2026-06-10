<x-guest-layout>
    <div class="auth-card-header">
        <p class="auth-eyebrow">Vérification</p>
        <h1>Confirmer l'accès</h1>
        <p>Cette zone est sécurisée. Confirmez votre mot de passe pour continuer.</p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="auth-form">
        @csrf

        <div class="auth-field">
            <x-input-label for="password" :value="__('Mot de passe')" class="auth-label" />

            <x-text-input id="password" class="auth-input"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="auth-error" />
        </div>

        <x-primary-button class="auth-submit">
            {{ __('Confirmer') }}
        </x-primary-button>
    </form>
</x-guest-layout>
