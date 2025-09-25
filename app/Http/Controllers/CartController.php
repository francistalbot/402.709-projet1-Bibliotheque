<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre as Product;

class CartController extends Controller
{
    public function cart()
    {
        $total = \Cart::getTotal();
        $items = \Cart::getContent();
        return view('cart',compact('items','total'));
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

        return redirect()->route('cart')->with('success','Item has been addeed to the cart');
    }

    public function addQuantity($productId)
    {
        \Cart::update($productId,[
            'quantity' => +1
        ]);

        return back()->with('success','Quantity has been increased');
    }

    public function decreaseQuantity($productId)
    {
        \Cart::update($productId,[
            'quantity'=> -1
        ]);

        return back()->with('success','item quantity has been decreased');
    }

    public function removeItem($productId)
    {
        \Cart::remove($productId);
        return back()->with('success','item has been removed from the cart');
    }

    public function clearCart()
    {
        \Cart::clear();
        return back()->with('success','There is no item in your cart');
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
