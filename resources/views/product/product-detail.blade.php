@extends('layouts.layouts')
@section('content')

<div class="product-detail">
    <div class="gallery-image">

        {{-- GALLERY D'IMAGES  --}}
        <div class="thumbnails">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" onclick="changeImage('{{ $product->image }}')" class="thumbnail active" width="80" height="80">

            @foreach ($product->gallery_images ?? [] as $img)
                <img src="{{ $img }}" alt="{{ $product->name }}" onclick="changeImage('{{ $img }}')" class="thumbnail" width="80" height="80" loading="lazy" decoding="async">
            @endforeach
        </div>

        <div class="main-image-container">
            {{-- lorsque le curseur survol l'image principal un zoom ce crée --}}
            <img id="mainImage" src="{{ $product->image }}" alt="{{ $product->name }}" class="main-image" onmousemove="zoom(event)" onmouseleave="resetZoom()" width="600" height="600" fetchpriority="high">
        </div>
    </div>
    

    {{-- INFOS PRODUITS--}}
    <div class="product-info">

        <button class="favorite" type="button" aria-label="Ajouter aux favoris">
            <i class='bxr  bx-heart'></i> 
        </button>

        <h1>{{$product->name}}</h1>
        
        {{-- a mettre en fonctionnel --}}
        <div class="reviews">
                ★★★★☆ <span>(278 avis)</span>
        </div>

        <p class="price">{{$product->price}}€</p>

        <div class="actions">
            <div class="quantity">
                <button type="button" onclick="changeQty(-1)"><i class="bx bx-minus"></i></button>

                <span id="qty">1</span>
                <input type="hidden" id="qtyInput" value="1">

                <button type="button" onclick="changeQty(1)"><i class="bx bx-plus"></i></button>
            </div>

            <button
                type="button"
                class="add-to-cart-btn"
                data-id="{{ $product->id }}"
                data-name="{{ $product->name }}"
                data-price="{{ $product->price }}"
                data-image="{{ $product->image }}">
                Ajouter à ma routine
            </button>
        </div>
        

        {{-- RUBRTIQUE DÉPLOYABLE --}}
        <div class="accordion">

            <div class="accordion-item">
                <button class="accordion-button" type="button">
                    Description
                    <i class='bxr  bx-chevron-down'  ></i> 
                </button>
                <div class="accordion-content">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-button" type="button">
                    Composition
                    <i class='bxr  bx-chevron-down'  ></i> 
                </button>
                <div class="accordion-content">
                    Compo
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-button" type="button">
                    Conseil d'utilisation
                    <i class='bxr  bx-chevron-down'  ></i> 
                </button>
                <div class="accordion-content">
                    Conseils d’utilisation
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function changeImage(src) {
    const mainImage = document.getElementById("mainImage");
    if (!mainImage) return;

    mainImage.src = src;
    document.querySelectorAll(".thumbnail").forEach((thumbnail) => {
        thumbnail.classList.toggle("active", thumbnail.src === new URL(src, window.location.origin).href);
    });
}

function changeQty(value) {
    let qty = document.getElementById("qty");
    let qtyInput = document.getElementById("qtyInput");
    let number = parseInt(qty.textContent);

    number += value;
    if (number < 1) number = 1;

    qty.textContent = number;
    qtyInput.value = number;
}

function zoom(event) {
    const image = event.currentTarget;
    const rect = image.getBoundingClientRect();
    const x = ((event.clientX - rect.left) / rect.width) * 100;
    const y = ((event.clientY - rect.top) / rect.height) * 100;

    image.style.transformOrigin = `${x}% ${y}%`;
    image.style.transform = "scale(1.45)";
}

function resetZoom() {
    const image = document.getElementById("mainImage");
    if (!image) return;

    image.style.transformOrigin = "center";
    image.style.transform = "scale(1)";
}

document.querySelectorAll(".accordion-button").forEach((button) => {
    button.addEventListener("click", () => {
        button.nextElementSibling?.classList.toggle("open");
    });
});
</script>

@endsection
