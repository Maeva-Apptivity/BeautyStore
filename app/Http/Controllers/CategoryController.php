<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index ()
    {
        // Charge les category avec les marques
        $categories=Category::with('brands')->get();
        return view('home',compact('categories'));

    }
    public function getBrands ($slug)
    {
        //récupération des category avec le slug
        $category = Category::where('slug',$slug)->firstOrfail();
        //récupération des marque avec l'id de la category
        $brands = Brand::where('category_id', $category->id)->get();
        //récupération de toutes les categories
        $categories = Category::all(); 
    
        return view('home',compact('categories', 'brands', 'category'));
    }

    // // public function show($slug)
    // // {
    // //     // Recherche le slug attribué a la catégorie
    // //     $category = Category::where('slug',$slug)->firstOrFail();
    // //     $brands = Brand::where('category_id', $category->id)->get();
    // //     $categories = Category::all();

    // //     return view('home', compact('brands', 'category', 'categories'));
    // // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
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
    // public function show()
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
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
