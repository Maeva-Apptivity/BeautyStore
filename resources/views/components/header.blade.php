<header class="header">
        <a href="{{ route('homepage') }}" class="logo-link" aria-label="Accueil BeautyStore">
            <img src="{{ asset('assets/logo-dark.png') }}" class="logo" alt="BeautyStore" width="80" height="80">
        </a>
        <input type="checkbox" id="check">
        <label for="check" class="icons" aria-label="Ouvrir le menu">
            <i class='bxr  bx-menu'  id="menu-icon"></i> 
            <i class='bxr  bxs-x'  id="close-icon"></i> 
        </label>

        <nav class="navbar">
        <a href="{{ route('homepage') }}" style="--i:0;">Home</a>
        <a href="" style="--i:1;">Search</a>
        <a href="" style="--i:2;">Favoris</a>
        

        <a href="{{ route('cart.list') }}" style="--i:3;" class="cart-icon-link" aria-label="Voir le panier">
            <img src="{{ asset('assets/shopping-bag.png') }}" alt="" width="40" height="40">
            <span class="cart-count" id="cartCount">
                {{ auth()->check() ? \App\Models\Cart::where('user_id', auth()->id())->sum('quantity') : 0 }}
            </span>

        </a>

            @auth
                {{-- Si l'utilisateur est connecté lien vers le dasboard --}}
                <a href="{{ route('dashboard') }}" style="--i:4;" title="Mon espace">
                    <i class="bx bxs-user-check text-green-500"></i>
                </a>
            @else
                {{-- si l'utilisateur n'est pas connécté lien vers login/register --}}
                <a href="{{ route('login') }}" style="--i:4;" title="Se connecter / S'inscrire">
                    <i class="bx bxs-user-x text-red-500"></i>
                </a>
            @endauth
            
        </nav>
        
</header>
