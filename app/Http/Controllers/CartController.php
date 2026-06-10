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
            $productImage = $product->displayImage();

            if(isset($guestCart[$product->id])){
                //  si produit déja présent incrémenté
                $guestCart[$product->id]['quantity'] += 1;

            }else{
                // ajouter au panier 
                $guestCart[$product->id] = [
                    'name' => $product->name,
                    'price'=> $product->price,
                    'image'=> $productImage,
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
            'image'=> $product->displayImage(),
            'cartCount'=> $totalItemsCount,
        ]);
    }

    public function addFromDetail(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1'
    ]);

    $product = Product::findOrFail($request->product_id);
    $qty = $request->quantity;

    if (auth()->check()) {

        $user = auth()->user();

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $qty;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $qty
            ]);
        }

        $cartCount = Cart::where('user_id', $user->id)->sum('quantity');
    } else {

        $cart = session()->get('cart', []);
        $productImage = $product->displayImage();

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $qty;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $productImage,
                'quantity' => $qty
            ];
        }

        session()->put('cart', $cart);

        $cartCount = collect($cart)->sum('quantity');
    }

    // 🔥 RÉPONSE AJAX
    return response()->json([
        'success' => true,
        'name' => $product->name,
        'price' => $product->price,
        'image' => $product->displayImage(),
        'quantity_added' => $qty,
        'cartCount' => $cartCount,
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

    // fonction pour augmenter la quantité
    public function increaseQuantity ($id){
        if (auth()->check()) {
            $cartItem = Cart::find($id);

            if($cartItem){
                $cartItem->quantity += 1;
                $cartItem->save();
            }
        } else {

            $cart = session()->get('cart',[]);
            if (isset($cart[$id])){
                $cart[$id]['quantity']+= 1;
                session()->put('cart',$cart);
            }
        }
    return redirect()->back();
    }

    // fonction pour diminuer la quantité des articles
    public function decreaseQuantity ($id){
        
        if (auth()->check()) {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            } else {
                $cartItem->delete();
            }
        }
    } else {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
            } else {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }
    }
    return redirect()->back();
}

    // fonction pour supprimer un articles
    public function removeItem($id) {

        if(auth()->check()) {
        $cartItem = \App\Models\Cart::find($id);
        if($cartItem) {
            $cartItem->delete();
        }
    } else {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    }
        return redirect()->back()->with('success', 'Article supprimé du panier avec succès !');
    }


}
