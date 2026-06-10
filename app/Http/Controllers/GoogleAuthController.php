<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Recherche d'un utilisateur existant
            $user = User::where('email', $googleUser->getEmail())->first();

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
                    'avatar'     => $googleUser->getAvatar(),
                    'password'   => bcrypt(Str::random(16)),
                ]);
                
                $isNewUser = true;
            } elseif (!$user->google_id) {
                // Si l'utilisateur existe déjà mais sans google_id, on met à jour
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                ]);
            } elseif (!$user->avatar && $googleUser->getAvatar()) {
                $user->update(['avatar' => $googleUser->getAvatar()]);
            }

            // Connexion
            Auth::login($user);

            // Message de succès pour SweetAlert
            $message = $isNewUser 
                ? 'Compte créé et connecté avec succès !' 
                : 'Connexion réussie !';

            return redirect()->intended('/')->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors([
                'google' => 'Erreur lors de la connexion avec Google',
            ])->with('error', 'Erreur lors de la connexion avec Google');
        }
    }
}
