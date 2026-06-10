@extends('layouts.layouts')
@section('content')

<div class="profile-page">
    <h2 class="cart-page-title">
        <i class='bx bx-user-circle'></i> Paramètres du profil
    </h2>

    <div class="profile-sections">

        {{-- Informations du profil --}}
        <div class="profile-card">
            <div class="profile-card-header">
                <i class='bx bx-edit'></i>
                <div>
                    <h3>Informations du profil</h3>
                    <p>Mettez à jour votre nom et votre adresse e-mail.</p>
                </div>
            </div>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" class="profile-form">
                @csrf
                @method('patch')

                <div class="profile-field">
                    <label for="name" class="profile-label">Nom</label>
                    <input id="name" name="name" type="text" class="profile-input @error('name') is-error @enderror"
                        value="{{ old('name', $user->name) }}" required autocomplete="name">
                    @error('name')
                        <span class="profile-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="profile-field">
                    <label for="email" class="profile-label">Adresse e-mail</label>
                    <input id="email" name="email" type="email" class="profile-input @error('email') is-error @enderror"
                        value="{{ old('email', $user->email) }}" required autocomplete="email">
                    @error('email')
                        <span class="profile-error">{{ $message }}</span>
                    @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <p class="profile-verify-notice">
                            Votre adresse e-mail n'est pas vérifiée.
                            <button form="send-verification" class="profile-link-btn">
                                Renvoyer l'e-mail de vérification
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="profile-success">Un lien de vérification a été envoyé.</p>
                        @endif
                    @endif
                </div>

                <div class="profile-form-footer">
                    <button type="submit" class="profile-submit">Enregistrer les modifications</button>
                    @if (session('status') === 'profile-updated')
                        <span class="profile-success">Profil mis à jour.</span>
                    @endif
                </div>
            </form>
        </div>

        {{-- Modifier le mot de passe --}}
        <div class="profile-card">
            <div class="profile-card-header">
                <i class='bx bx-lock-alt'></i>
                <div>
                    <h3>Modifier le mot de passe</h3>
                    <p>Utilisez un mot de passe long et unique pour protéger votre compte.</p>
                </div>
            </div>

            <form method="post" action="{{ route('password.update') }}" class="profile-form">
                @csrf
                @method('put')

                <div class="profile-field">
                    <label for="update_password_current_password" class="profile-label">Mot de passe actuel</label>
                    <input id="update_password_current_password" name="current_password" type="password"
                        class="profile-input @error('current_password', 'updatePassword') is-error @enderror"
                        autocomplete="current-password">
                    @error('current_password', 'updatePassword')
                        <span class="profile-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="profile-field">
                    <label for="update_password_password" class="profile-label">Nouveau mot de passe</label>
                    <input id="update_password_password" name="password" type="password"
                        class="profile-input @error('password', 'updatePassword') is-error @enderror"
                        autocomplete="new-password">
                    @error('password', 'updatePassword')
                        <span class="profile-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="profile-field">
                    <label for="update_password_password_confirmation" class="profile-label">Confirmer le mot de passe</label>
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                        class="profile-input @error('password_confirmation', 'updatePassword') is-error @enderror"
                        autocomplete="new-password">
                    @error('password_confirmation', 'updatePassword')
                        <span class="profile-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="profile-form-footer">
                    <button type="submit" class="profile-submit">Mettre à jour le mot de passe</button>
                    @if (session('status') === 'password-updated')
                        <span class="profile-success">Mot de passe mis à jour.</span>
                    @endif
                </div>
            </form>
        </div>

        {{-- Supprimer le compte --}}
        <div class="profile-card profile-card-danger">
            <div class="profile-card-header">
                <i class='bx bx-trash'></i>
                <div>
                    <h3>Supprimer le compte</h3>
                    <p>Une fois supprimé, toutes vos données seront définitivement effacées.</p>
                </div>
            </div>

            <button type="button" class="profile-danger-btn" onclick="document.getElementById('delete-modal').classList.add('active')">
                Supprimer mon compte
            </button>
        </div>

    </div>

    <div class="profile-back">
        <a href="{{ route('dashboard') }}" class="dashboard-btn dashboard-btn-secondary">
            <i class='bx bx-arrow-back'></i> Retour au tableau de bord
        </a>
    </div>
</div>

{{-- Modal de confirmation de suppression --}}
<div id="delete-modal" class="profile-modal-overlay" onclick="if(event.target===this) this.classList.remove('active')">
    <div class="profile-modal">
        <h3>Supprimer votre compte ?</h3>
        <p>Cette action est irréversible. Toutes vos données seront définitivement supprimées. Entrez votre mot de passe pour confirmer.</p>

        <form method="post" action="{{ route('profile.destroy') }}" class="profile-form">
            @csrf
            @method('delete')

            <div class="profile-field">
                <label for="delete_password" class="profile-label">Mot de passe</label>
                <input id="delete_password" name="password" type="password"
                    class="profile-input @error('password', 'userDeletion') is-error @enderror"
                    placeholder="Votre mot de passe">
                @error('password', 'userDeletion')
                    <span class="profile-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="profile-modal-actions">
                <button type="button" class="dashboard-btn dashboard-btn-secondary"
                    onclick="document.getElementById('delete-modal').classList.remove('active')">
                    Annuler
                </button>
                <button type="submit" class="profile-danger-btn">Supprimer définitivement</button>
            </div>
        </form>
    </div>
</div>

@endsection
