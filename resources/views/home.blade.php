@extends('layouts.layouts')

@section('content')

    <x-category-list :categories="$categories" />
    <x-carousel/>
    <x-bestSellers/>
    
@endsection