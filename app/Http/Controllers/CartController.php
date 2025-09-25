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
        $subtotal = \Cart::getSubTotal();
        $conditions = \Cart::getConditions();
        $value = \Cart::getCondition('discount') ? \Cart::getCondition('discount')->getValue() : 0;
        return view('cart', compact('items', 'total', 'user', 'subtotal', 'value'));
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

        return redirect()->route('cart')->with('success', 'L\'article a été ajouté au panier');
    }

    public function addQuantity($productId)
    {
        \Cart::update($productId, [
            'quantity' => +1
        ]);

        return back()->with('success', 'La quantité a été augmentée');
    }

    public function decreaseQuantity($productId)
    {
        \Cart::update($productId, [
            'quantity' => -1
        ]);

        return back()->with('success', 'la quantité d\'articles a été diminuée');
    }

    public function removeItem($productId)
    {
        \Cart::remove($productId);
        return back()->with('success', 'l\'article a été retiré du panier');
    }

    public function clearCart()
    {
        \Cart::clear();
        \Cart::clearCartConditions();
        return back()->with('success', 'Il n\'y a aucun article dans votre panier');
    }

    // application d'un code promo
    private function applyDiscount(array $cart, string $type, float $value)
    {
        //dd($cart, $type, $value);
        if ($type === 'percent') {
            $discount = '-'.($value).'%';
            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'discount',
                'type' => 'percent',
                'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                'value' => $discount
            ));
        } else {
            $discount = '-'.$value;
             $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'discount',
                'type' => 'fixed',
                'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
                'value' => $discount
            ));
        }
        \Cart::condition($condition);
       
    }


    public function applyCoupon(Request $request)
    {
        $code = strtoupper($request->input('code'));
        $productId = $request->input('product_id');
        $coupons = [
            'SAVE15' => ['type' => 'percent', 'value' => 15],
            'LESS10' => ['type' => 'fixed',   'value' => 10],
        ];

        if (!array_key_exists($code, $coupons)) {
            return back()->with('status', 'Coupon invalide.');
        }

        $cart = $this->loadCart();

        $this->applyDiscount($cart, $coupons[$code]['type'], $coupons[$code]['value']);

 
        //$this->saveCart($cart); 

        return back()->with('success', 'Coupon appliqué avec succès.');
    }

    private function loadCart(): array
    {
        $items = \Cart::getContent();
        $subtotal = \Cart::getSubTotal();
        return [
            'items' => $items,
            'subtotal' => $subtotal,
            'discount' => 0,
            'total' => $subtotal,
        ];
    }

    private function saveCart(array $cart): void
    {
        // Ici, vous pouvez enregistrer les détails du panier dans la session ou la base de données
        session(['cart' => $cart]);
    }
}
