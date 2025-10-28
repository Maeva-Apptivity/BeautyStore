<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // fonction pour lister les articles du panier
    public function index (){

        // si utilisateur connecté = récupération du panier via la base de données
        if (auth()->check()){
            $cartItems = Cart::with('product')
                        ->where ('user_id',auth()->id())
                        ->get();
        }else{
        // invité = récupération du panier via la session
            $guestCart = session()->get('cart',[]);
            $cartItems = collect($guestCart);
        }

        return view('cart.cart-list', compact('cartItems'));
    }

    // Fonction ajax pour ajouter les produits au panier en fonction de l'état de connexion de l'utilisateur

    public function addAjax (Request $request){

        $product = Product::findOrFail($request->id);

        // si l'utilisateur est connecté son panier sera enregistrée en base de données
        if(auth()->check()){

            $user = auth()->user();

            // verifie si le produit est déja en panier
            $existingCartItem = Cart::where('user_id',$user->id)
                    ->where('product_id', $product->id)
                    ->first();

            // Incrémenter si le produit existe déja en panier
            if($existingCartItem){

                $existingCartItem->quantity += 1;
                $existingCartItem->save();

            }else{
                // sinon crée le produit dans le panier

                Cart::Create([
                    'user_id'=> $user->id,
                    'product_id'=> $product->id,
                    'quantity'=> 1,
                ]);
            }

            // Calcul le nombre total d'articles présent dan le panier
            $totalItemsCount = Cart::where('user_id', $user->id)->sum('quantity');
        
        }else{
            // gestion du panier invité
            $guestCart = session()->get('cart',[]);

            if(isset($guestCart[$product->id])){
                //  si produit déja présent incrémenté
                $guestCart[$product->id]['quantity'] += 1;

            }else{
                // ajouter au panier 
                $guestCart[$product->id] = [
                    'name' => $product->name,
                    'price'=> $product->price,
                    'image'=> $product->image,
                    'quantity'=> 1,
                ];
            }

            session()->put('cart',$guestCart);

            // calcul le nombre total d'articles present dans le panier de l'invité
            $totalItemsCount = collect($guestCart)->sum('quantity');
        }

        return response()->json([
            'success'=> true,
            'name'=> $product->name,
            'price'=> $product->price,
            'image'=> $product->image,
            'cartCount'=> $totalItemsCount,
        ]);
    }

    public function getCartCount(){
        
        if(auth()->check()){
            $itemsCount = Cart::where('user_id',auth()->id())->sum('quantity');

        }else{
            $guestCart = session()->get('cart',[]);
            $itemsCount = collect($guestCart)->sum('quantity');
        }
        return response()->json(['count' => $itemsCount]);
    }
}
