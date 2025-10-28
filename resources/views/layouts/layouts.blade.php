<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="route-cart-add" content="{{ route('cart.addAjax') }}">
    <title>BeautyStore</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @include('sweetalert2::index')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite(['resources/js/cart.js'])




</head>
<body>
    <x-header/>
    @yield('content')
    <x-cart-sidebar/>




</body>
</html>