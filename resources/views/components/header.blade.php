<header class="header">
        <img src="/assets/logo-dark.png" class="logo">
        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <i class='bxr  bx-menu'  id="menu-icon"></i> 
            <i class='bxr  bxs-x'  id="close-icon"></i> 
        </label>

        <nav class="navbar">
        <a href="/" style="--i:0;">Home</a>
        <a href="" style="--i:1;">Search</a>
        <a href="" style="--i:2;">Favoris</a>
        

        <a href="{{route('cart.list')}}" style="--i:3;" class="cart-icon-link">
            <img src="/assets/shopping-bag.png" alt="">
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