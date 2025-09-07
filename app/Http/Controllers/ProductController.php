<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;

use function Laravel\Prompts\alert;

class ProductController extends Controller
{
    // Affiche tous les produits
    public function index()
    {
        // récupère les produits par ordre décroissant du plus récent au plus ancien
        $products = Product::latest()->get();
        return view('product.products-list',compact('products'));
    }

    // Affiche un produit en détail
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('product.product-detail', compact('product'));
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
