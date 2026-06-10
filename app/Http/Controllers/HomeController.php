<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $categories = Category::with('brands')->get();
        $bestSellers = Product::with(['brand', 'category'])
            ->withSum('carts as sold_count', 'quantity')
            ->orderByDesc('sold_count')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        return view('home', compact('categories', 'bestSellers'));
    }
}
