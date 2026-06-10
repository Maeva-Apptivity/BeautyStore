<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;

use function Laravel\Prompts\alert;

class ProductController extends Controller
{
    // Affiche tous les produits
    public function index(Request $request)
    {
        $query = Product::with(['brand', 'category'])->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('brand', fn ($b) => $b->where('name', 'like', "%{$search}%"));
            });
        }

        $products = $query->paginate(12)->withQueryString();
        $search = $request->search;
        return view('product.products-list', compact('products', 'search'));
    }

    // Affiche un produit en détail
    public function show($slug)
    {
        $product = Product::with(['brand', 'category'])->where('slug', $slug)->firstOrFail();
        return view('product.product-detail', compact('product'));
    }

    public function getProductsByBrand($slug)
    {
        $brand = Brand::where('slug',$slug)->firstOrFail();
        
        $products = $brand->products()->with(['brand', 'category'])->orderBy('created_at','desc')->paginate(12);
        return view('product.products-list',compact('products','brand'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
