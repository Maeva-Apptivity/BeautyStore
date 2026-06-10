@php
    $categoryVisuals = [
        'SkinCare' => [
            'image' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&w=900&q=80',
            'subtitle' => 'Soins visage, hydratation et glow naturel',
        ],
        'Makeup' => [
            'image' => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=80',
            'subtitle' => 'Teint, lèvres et palettes pour sublimer chaque look',
        ],
        'HairCare' => [
            'image' => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=900&q=80',
            'subtitle' => 'Rituels cheveux doux, brillants et nourris',
        ],
        'Fragrance' => [
            'image' => 'https://images.unsplash.com/photo-1541643600914-78b084683601?auto=format&fit=crop&w=900&q=80',
            'subtitle' => 'Parfums, brumes et sillages élégants',
        ],
        'Eco-Friendly' => [
            'image' => 'https://images.unsplash.com/photo-1601049541289-9b1b7bbbfe19?auto=format&fit=crop&w=900&q=80',
            'subtitle' => 'Beauté engagée, formules clean et gestes responsables',
        ],
    ];
@endphp

<ul class="category-list">
    @foreach ($categories as $category)
        @php
            $visual = $categoryVisuals[$category->name] ?? [
                'image' => 'https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=900&q=80',
                'subtitle' => 'Une sélection beauté pensée pour votre routine',
            ];
        @endphp
        <li class="category-item">
            <span>{{$category->name}}</span>

            <!-- Le dropdown est bien à l’intérieur du LI -->
            <div class="dropdown">
                <div class="dropdown-content">
                    <div class="dropdown-header">
                        <div>
                            <p class="dropdown-eyebrow">Univers beauté</p>
                            <h2>{{$category->name}}</h2>
                            <p>{{$visual['subtitle']}}</p>
                        </div>
                        <img src="{{ $visual['image'] }}" alt="{{ $category->name }}" class="category-visual" width="260" height="170" loading="lazy" decoding="async">
                    </div>
                    <div class="brands-grid"> 
                        @foreach ($category->brands as $brand)
                            <div class="brand-card">
                                <a href="{{ route('product.by.brand', $brand->slug) }}" class="brand-link">
                                    <img src="{{ $brand->logo }}" alt="Logo {{ $brand->name }}" class="brand-logo" width="80" height="80" loading="lazy" decoding="async">
                                    <span class="brand-name">{{ $brand->name }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="view-all">
                        <a href="{{route('product.list')}}">Voir tous les produits</a>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
<script src="{{ asset('dropdown.js') }}" defer></script>
