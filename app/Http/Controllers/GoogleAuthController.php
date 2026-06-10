<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            try {
                $googleUser = Socialite::driver('google')->user();
            } catch (InvalidStateException $e) {
                $googleUser = Socialite::driver('google')->stateless()->user();
            }

            // Recherche d'un utilisateur existant
            $user = User::where('email', $googleUser->getEmail())->first();
            $avatar = $this->avatarColumnExists() ? $googleUser->getAvatar() : null;

            $isNewUser = false;

            if (!$user) {
                // Découper le nom complet en prénom + nom
                $fullName = $googleUser->getName();
                $parts = explode(' ', $fullName, 2);

                $user = User::create([
                    'first_name' => $parts[0] ?? '',
                    'last_name'  => $parts[1] ?? '',
                    'email'      => $googleUser->getEmail(),
                    'google_id'  => $googleUser->getId(),
                    'password'   => bcrypt(Str::random(16)),
                ] + ($avatar ? ['avatar' => $avatar] : []));
                
                $isNewUser = true;
            } elseif (!$user->google_id) {
                // Si l'utilisateur existe déjà mais sans google_id, on met à jour
                $user->update(array_filter([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $avatar,
                ]));
            } elseif ($avatar && !$user->avatar) {
                $user->update(['avatar' => $avatar]);
            }

            // Connexion
            Auth::login($user);

            // Message de succès pour SweetAlert
            $message = $isNewUser 
                ? 'Compte créé et connecté avec succès !' 
                : 'Connexion réussie !';

            return redirect()->route('homepage')->with('success', $message);

        } catch (\Exception $e) {
            Log::error('Erreur lors de la connexion avec Google', [
                'message' => $e->getMessage(),
                'exception' => get_class($e),
            ]);

            return redirect()->route('login')->withErrors([
                'google' => 'Erreur lors de la connexion avec Google',
            ])->with('error', 'Erreur lors de la connexion avec Google');
        }
    }

    private function avatarColumnExists(): bool
    {
        return Schema::hasColumn('users', 'avatar');
    }
}
