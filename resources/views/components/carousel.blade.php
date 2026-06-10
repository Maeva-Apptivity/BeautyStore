@php
    $slides = [
        ['name' => 'sakura1', 'alt' => 'Rituel beauté aux fleurs de sakura'],
        ['name' => 'fresh', 'alt' => 'Routine skincare fraîche et lumineuse'],
        ['name' => 'sakura2', 'alt' => 'Produits cosmétiques inspirés du sakura'],
        ['name' => 'cosmetic', 'alt' => 'Sélection de soins BeautyStore'],
        ['name' => 'sakura3', 'alt' => 'Ambiance florale pour produits beauté'],
        ['name' => 'clear', 'alt' => 'Soin visage à la texture légère'],
    ];
@endphp

<section class="slider" aria-label="Sélections BeautyStore">
    <div class="list">
        @foreach ($slides as $index => $slide)
            <div class="item">
                <picture>
                    <source srcset="{{ asset('assets/' . $slide['name'] . '.webp') }}" type="image/webp">
                    <img
                        src="{{ asset('assets/' . $slide['name'] . '.jpg') }}"
                        alt="{{ $slide['alt'] }}"
                        width="1600"
                        height="700"
                        @if ($index === 0) fetchpriority="high" @else loading="lazy" decoding="async" @endif
                    >
                </picture>
            </div>
        @endforeach
    </div>

    <div class="buttons">
        <button id="prev" type="button" aria-label="Image précédente"><i class="bx bx-chevron-left bx-lg"></i></button>
        <button id="next" type="button" aria-label="Image suivante"><i class="bx bx-chevron-right bx-lg"></i></button>
    </div>

    <ul class="dots" aria-label="Navigation du carousel">
        @foreach ($slides as $index => $slide)
            <li class="{{ $index === 0 ? 'active' : '' }}">
                <button type="button" aria-label="Afficher l'image {{ $index + 1 }}"></button>
            </li>
        @endforeach
    </ul>
</section>

<script src="{{ asset('carousel.js') }}" defer></script>
