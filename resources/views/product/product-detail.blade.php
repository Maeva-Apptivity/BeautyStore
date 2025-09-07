@extends('layouts.layouts')
@section('content')

<div class="product-detail">
    <div class="gallery-image">

        {{-- miniature des images  --}}
        <div class="thumbnails">
            <img src="{{$product->image}}" onclick="changeImage('{{$product->image}}')" class="thumbnail active">

            @foreach ($product->gallery_images ?? [] as $img)
                <img src="{{$img}}" alt="" onclick="changeImage('{{$img}}')" class='thumbnail'>
            @endforeach
        </div>

        <div class="main-image-container">
            {{-- lorsque le curseur survol l'image principal un zoom ce crée --}}
            <img id='mainImage'src="{{$product->image}}" class="main-image" onmousemove="zoom(event)" onmouseleave="resetZoom()">
        </div>
    </div>
    

    {{-- Bloc droit avec infos produit --}}
    <div class="product-info">

        <button class="favorite">
            <i class='bxr  bx-heart'></i> 
        </button>

        <h1>{{$product->name}}</h1>
        
        {{-- a mettre en fonctionnel --}}
        <div class="reviews">
                ★★★★☆ <span>(278 avis)</span>
        </div>

        <p class="price">{{$product->price}}€</p>

        <div class="actions">
            <button class="add-to-cart">Ajouter au panier</button>

            <div class="quantity">
                <button onclick=""> 
                    <i class='bxr  bx-minus'  ></i> 
                </button>
                <span id="qty">1</span>
                <button onclick=""> 
                    <i class='bxr  bx-plus'  ></i> 
                </button>
            </div>

        </div>

        {{-- rubrique déployable --}}
        <div class="accordion">

            <div class="accordion-item">
                <button onclick="toggleAccordion('product-description')">Description </button>
                <div class="accordion-content" id="product-description">{{$product->description}}</div>
            </div>

            <div class="accordion-item">
                <button onclick="toggleAccordion('product-composition')">Compostion</button>
                <div class="accordion-content" id="product-composition">Compo</div>
            </div>

            <div class="accordion-item">
                <button onclick="toggleAccordion('product-use')">Conseil d'utilisation</button>
                <div class="accordion-content" id="product-use">Conseils d’utilisation</div>
            </div>

        </div>
    </div>
</div>
@endsection