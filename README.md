# BeautyStore

E-commerce de produits de beauté développé avec Laravel 12, Tailwind CSS et Alpine.js.

## Fonctionnalités

- Catalogue produits avec filtres par catégorie et marque
- Panier d'achat (ajout AJAX, mise à jour quantité, suppression)
- Liste de favoris (wishlist)
- Authentification classique (Laravel Breeze) et via Google (Socialite)
- Gestion du profil utilisateur avec avatar
- Page d'erreur 404 personnalisée

## Stack technique

| Couche | Technologie |
|---|---|
| Backend | PHP 8.2 / Laravel 12 |
| Frontend | Blade, Tailwind CSS v3, Alpine.js |
| Base de données | SQLite (dev) |
| Build | Vite |
| Auth sociale | Laravel Socialite (Google) |

## Prérequis

- PHP >= 8.2
- Composer
- Node.js >= 18 & npm

## Installation

```bash
# 1. Cloner le dépôt
git clone <url-du-repo> BeautyStore
cd BeautyStore

# 2. Installer les dépendances PHP
composer install

# 3. Installer les dépendances JS
npm install

# 4. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 5. Lancer les migrations et les seeders
php artisan migrate --seed

# 6. Compiler les assets
npm run build
```

## Lancer en développement

```bash
# Terminal 1 — serveur Laravel
php artisan serve

# Terminal 2 — assets en watch
npm run dev
```

L'application est accessible sur `http://localhost:8000`.

## Authentification Google

Dans le fichier `.env`, renseigner les clés OAuth :

```env
GOOGLE_CLIENT_ID=your-client-id
GOOGLE_CLIENT_SECRET=your-client-secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

## Structure des routes principales

| Route | Description |
|---|---|
| `GET /` | Page d'accueil |
| `GET /products` | Liste de tous les produits |
| `GET /products/{slug}` | Détail d'un produit |
| `GET /category/{slug}` | Produits par catégorie |
| `GET /brand/{slug}` | Produits par marque |
| `GET /cart` | Panier |
| `GET /favoris` | Liste de favoris |
| `GET /dashboard` | Tableau de bord (auth requis) |
| `GET /profile` | Profil utilisateur (auth requis) |

## Structure du projet

```
app/
├── Http/Controllers/
│   ├── CartController.php
│   ├── CategoryController.php
│   ├── GoogleAuthController.php
│   ├── HomeController.php
│   ├── ProductController.php
│   ├── ProfileController.php
│   └── WishlistController.php
└── Models/
    ├── Brand.php
    ├── Cart.php
    ├── Category.php
    ├── Product.php
    ├── User.php
    └── Wishlist.php
```

## Tests

```bash
php artisan test
```
