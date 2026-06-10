<x-guest-layout>
    <div class="auth-card-header">
        <p class="auth-eyebrow">Dernière étape</p>
        <h1>Vérifiez votre e-mail</h1>
        <p>Nous venons de vous envoyer un lien de vérification. Cliquez dessus pour activer votre compte.</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="auth-status">
            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
        </div>
    @endif

    <div class="auth-actions-split">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button class="auth-submit auth-submit-inline">
                {{ __('Renvoyer le lien') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="auth-link-button">
                {{ __('Se déconnecter') }}
            </button>
        </form>
    </div>
</x-guest-layout>
