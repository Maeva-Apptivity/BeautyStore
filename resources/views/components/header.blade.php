<header class="header">
        <a href="{{ route('homepage') }}" class="logo-link" aria-label="Accueil BeautyStore">
            <img src="{{ asset('assets/logo-dark.png') }}" class="logo" alt="BeautyStore" width="80" height="80">
        </a>
        <input type="checkbox" id="check">
        <label for="check" class="icons" aria-label="Ouvrir le menu">
            <i class='bx bx-menu' id="menu-icon"></i>
            <i class='bx bx-x' id="close-icon"></i>
        </label>

        <nav class="navbar">
        <a href="{{ route('homepage') }}" style="--i:0;">Home</a>
        <a href="" style="--i:1;">Search</a>
        <a href="" style="--i:2;">Favoris</a>
        

        <a href="{{ route('cart.list') }}" style="--i:3;" class="cart-icon-link" aria-label="Voir le panier">
            <img src="{{ asset('assets/shopping-bag.png') }}" alt="" class="nav-icon" width="40" height="40">
            <span class="cart-count" id="cartCount">
                {{ auth()->check() ? \App\Models\Cart::where('user_id', auth()->id())->sum('quantity') : 0 }}
            </span>

        </a>

            @auth
                @php
                    $user = auth()->user();
                    $userName = trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? ''))
                        ?: ($user->name ?? $user->email ?? 'Utilisateur');
                    $userInitials = collect(explode(' ', $userName))
                        ->filter()
                        ->take(2)
                        ->map(fn ($part) => \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($part, 0, 1)))
                        ->implode('');
                    $userImage = $user->avatar
                        ?? $user->image
                        ?? $user->profile_photo_url
                        ?? null;

                    if ($userImage && ! \Illuminate\Support\Str::startsWith($userImage, ['http://', 'https://', '/'])) {
                        $userImage = asset('storage/' . ltrim($userImage, '/'));
                    }
                @endphp

                {{-- Si l'utilisateur est connecté lien vers le dashboard --}}
                <a href="{{ route('dashboard') }}" style="--i:4;" title="Mon espace" class="user-account-link" aria-label="Mon espace">
                    @if ($userImage)
                        <img src="{{ $userImage }}" alt="Photo de profil de {{ $userName }}" class="user-avatar" width="40" height="40">
                    @else
                        <span class="user-avatar user-avatar-fallback" aria-hidden="true">{{ $userInitials ?: 'U' }}</span>
                    @endif
                </a>
            @else
                {{-- si l'utilisateur n'est pas connécté lien vers login/register --}}
                <a href="{{ route('login') }}" style="--i:4;" title="Se connecter / S'inscrire">
                    <i class="bx bxs-user-x text-red-500"></i>
                </a>
            @endauth
            
        </nav>
        
</header>
