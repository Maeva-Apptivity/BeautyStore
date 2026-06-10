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
            <a href="{{ route('homepage') }}" style="--i:0;">Accueil</a>

            <button class="nav-search-btn" id="searchToggle" style="--i:1;" aria-label="Rechercher" type="button">
                <i class='bx bx-search'></i>
            </button>

            <a href="{{ route('wishlist.index') }}" style="--i:2;" class="wishlist-icon-link" aria-label="Mes favoris">
                <i class='bx bx-heart'></i>
                <span class="wishlist-count" id="wishlistCount">
                    @auth
                        {{ \App\Models\Wishlist::where('user_id', auth()->id())->count() }}
                    @else
                        {{ count(session()->get('wishlist', [])) }}
                    @endauth
                </span>
            </a>

            <a href="{{ route('cart.list') }}" style="--i:3;" class="cart-icon-link" aria-label="Voir le panier">
                <img src="{{ asset('assets/shopping-bag.png') }}" alt="" class="nav-icon cart-bag-icon" width="40" height="40">
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

                <a href="{{ route('dashboard') }}" style="--i:4;" title="Mon espace" class="user-account-link" aria-label="Mon espace">
                    @if ($userImage)
                        <img src="{{ $userImage }}" alt="Photo de profil de {{ $userName }}" class="user-avatar" width="40" height="40">
                    @else
                        <span class="user-avatar user-avatar-fallback" aria-hidden="true">{{ $userInitials ?: 'U' }}</span>
                    @endif
                </a>
            @else
                <a href="{{ route('login') }}" style="--i:4;" title="Se connecter / S'inscrire">
                    <i class="bx bxs-user-x text-red-500"></i>
                </a>
            @endauth
        </nav>

        <div class="search-overlay" id="searchOverlay" aria-hidden="true">
            <form action="{{ route('product.list') }}" method="GET" class="search-form">
                <i class='bx bx-search search-form-icon'></i>
                <input
                    type="text"
                    name="search"
                    id="searchInput"
                    placeholder="Rechercher un produit, une marque..."
                    class="search-input"
                    autocomplete="off"
                >
                <button type="button" id="searchClose" class="search-close-btn" aria-label="Fermer la recherche">
                    <i class='bx bx-x'></i>
                </button>
            </form>
        </div>
</header>
