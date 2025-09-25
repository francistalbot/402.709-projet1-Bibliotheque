<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre as Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $user = Auth::user();
        $total = \Cart::getTotal();
        $items = \Cart::getContent();
        return view('cart',compact('items','total','user'));
    }

    public function addCart($productId)
    {
        $product = Product::findOrFail($productId);
        
        \Cart::add(array(
            'id' => $productId,
            'name' => $product->titre,
            'price' => $product->prix,
            'quantity' => 1,
            'associatedModel' => $product
        ));

        return redirect()->route('cart')->with('success','L\'article a été ajouté au panier');
    }

    public function addQuantity($productId)
    {
        \Cart::update($productId,[
            'quantity' => +1
        ]);

        return back()->with('success','La quantité a été augmentée');
    }

    public function decreaseQuantity($productId)
    {
        \Cart::update($productId,[
            'quantity'=> -1
        ]);

        return back()->with('success','la quantité d\'articles a été diminuée');
    }

    public function removeItem($productId)
    {
        \Cart::remove($productId);
        return back()->with('success','l\'article a été retiré du panier');
    }

    public function clearCart()
    {
        \Cart::clear();
        return back()->with('success','Il n\'y a aucun article dans votre panier');
    }

    public function applyCoupon(Request $request) { 
        $code = strtoupper($request->input('code')); 
        $coupons = [ 
            'SAVE15' => ['type' => 'percent', 'value' => 15], 
            'LESS10' => ['type' => 'fixed',   'value' => 10], 
        ]; 

        if (!array_key_exists($code, $coupons)) { 
            return back()->with('status', 'Coupon invalide.'); 
        } 

        $cart = $this->loadCart(); 
        
        $cart = $this->applyDiscount($cart, $coupons[$code]['type'], $coupons[$code]['value']); 
        
        $this->saveCart($cart); 

        return back()->with('status', 'Coupon appliqué avec succès.'); 
    }
}
