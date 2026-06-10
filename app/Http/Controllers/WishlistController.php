<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $wishlistItems = Wishlist::with('product')
                ->where('user_id', auth()->id())
                ->get();
        } else {
            $guestWishlist = session()->get('wishlist', []);
            $productIds = array_keys($guestWishlist);
            $wishlistItems = collect(Product::whereIn('id', $productIds)->get());
        }

        return view('wishlist.wishlist-list', compact('wishlistItems'));
    }

    public function toggle(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if (auth()->check()) {
            $existing = Wishlist::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->first();

            if ($existing) {
                $existing->delete();
                $inWishlist = false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                ]);
                $inWishlist = true;
            }

            $count = Wishlist::where('user_id', auth()->id())->count();
        } else {
            $wishlist = session()->get('wishlist', []);

            if (isset($wishlist[$product->id])) {
                unset($wishlist[$product->id]);
                $inWishlist = false;
            } else {
                $wishlist[$product->id] = true;
                $inWishlist = true;
            }

            session()->put('wishlist', $wishlist);
            $count = count($wishlist);
        }

        return response()->json([
            'success' => true,
            'inWishlist' => $inWishlist,
            'count' => $count,
        ]);
    }

    public function remove($id)
    {
        if (auth()->check()) {
            $item = Wishlist::where('user_id', auth()->id())
                ->where('id', $id)
                ->firstOrFail();
            $item->delete();
        } else {
            $wishlist = session()->get('wishlist', []);
            if (isset($wishlist[$id])) {
                unset($wishlist[$id]);
                session()->put('wishlist', $wishlist);
            }
        }

        return redirect()->back()->with('success', 'Article retiré des favoris.');
    }
}
