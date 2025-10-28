@extends('layouts.layouts')
@section('content')

<link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
<div class="product-detail">
    <div class="gallery-image">

        {{-- GALLERY D'IMAGES  --}}
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
    

    {{-- INFOS PRODUITS--}}
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
            @if (Auth::check())
                <button 
                    class="add-to-cart-btn" data-id="{{ $product->id }}" "
                    data-id="{{$product->id}}"
                    data-name="{{$product->name}}"
                    data-price="{{$product->price}}"
                    data-image="{{$product->image}}">
                    Ajouter à ma routine</button>
            @else
                <button class="add-to-cart-btn" data-id="{{ $product->id }}" ">Ajouter à ma routine</button>
            @endif

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

        {{-- RUBRTIQUE DÉPLOYABLE --}}
        <div class="accordion">

            <div class="accordion-item">
                <button class="accordion-button">
                    Description
                    <i class='bxr  bx-chevron-down'  ></i> 
                </button>
                <div class="accordion-content">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-button">
                    Composition
                    <i class='bxr  bx-chevron-down'  ></i> 
                </button>
                <div class="accordion-content">
                    Compo
                </div>
            </div>

            <div class="accordion-item">
                <button class="accordion-button">
                    Conseil d'utilisation
                    <i class='bxr  bx-chevron-down'  ></i> 
                </button>
                <div class="accordion-content">
                    Conseils d’utilisation
                </div>
            </div>
    </div>
</div>

@endsection