@props(['products' => collect()])

{{-- Section best sellers avec les produits les plus vendus --}}
<section class="best-sellers-section" aria-labelledby="best-sellers-title">
    <div class="container best-sellers-container">
        <div class="best-sellers-heading">
            <span class="best-sellers-eyebrow">Sélection du moment</span>
            <h2 class="best-sellers-title" id="best-sellers-title">Best Sellers</h2>
            <a href="{{ route('product.list') }}" class="best-sellers-link">Voir tout</a>
        </div>

        @if ($products->count() > 0)
            <div class="best-sellers-grid">
                @foreach ($products as $product)
                    @php($productImage = $product->displayImage())
                    <article class="product-card best-seller-card">
                        <a href="{{ route('product.show', $product->slug) }}" class="product-link">
                            <div class="product-image-wrapper best-seller-image-wrapper">
                                <span class="best-seller-badge">Top {{ $loop->iteration }}</span>
                                <img
                                    src="{{ $productImage }}"
                                    alt="{{ $product->name }}"
                                    class="product-image"
                                    width="260"
                                    height="260"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>
                            <p class="product-meta">{{ $product->brand->name ?? $product->category->name ?? 'BeautyStore' }}</p>
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <p class="product-price">{{ $product->price }}€</p>
                        </a>

                        <button
                            type="button"
                            class="add-to-cart-btn"
                            data-id="{{ $product->id }}"
                            data-name="{{ $product->name }}"
                            data-price="{{ $product->price }}"
                            data-image="{{ $productImage }}"
                        >
                            Ajouter à ma routine
                        </button>
                    </article>
                @endforeach
            </div>
        @else
            <div class="best-sellers-empty">
                <h3>Les coups de coeur arrivent bientôt</h3>
                <p>Ajoutez vos premiers produits pour faire apparaître la sélection.</p>
            </div>
        @endif
    </div>
</section>
