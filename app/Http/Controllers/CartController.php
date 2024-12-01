<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $validated = $request->validate([
            'item_id' => 'required',
            'item_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'color' =>'required',
            'size' =>'required'
        ]);

        $cart = session()->get('cart');

        if(isset($cart[$validated['item_id']])){
            $cart[$validated['item_id']]['quantity'] += $validated['quantity'];
        }else{
            $cart[$validated['item_id']] = [
                'item_id' => $validated['item_id'],
                'item_name' => $validated['item_name'],
                'price' => $validated['price'],
                'quantity' => $validated['quantity'],
                'color' => $validated['color'],
                'size' => $validated['size']
            ];
        }
        session()->put('cart', $cart);
        return response()->json(['status' => 'success']);
    }

    //get cart items count
    public function getCartCount(){
        if(!session()->has('cart')) return response()->json(['count' => 0]);
        $cart = session()->get('cart');
        return response()->json(['count' => count($cart)]);
    }

    //get cart items
    public function getCartItems(){
        $cart = session()->get('cart', []);
        return response()->json(['items' => $cart]);
    }

    //update cart
    public function update(Request $request)
    {
        $item_id = $request->product_id;
        $quantity = $request->quantity;
    
        $cart = session()->get('cart', []);
    
        
        if (isset($cart[$item_id])) {
            
            if ($quantity > 0) {
                
                $cart[$item_id]['quantity'] = $quantity;
            } else {
                
                unset($cart[$item_id]);
            }
    
            // Update the cart in the session
            session()->put('cart', $cart);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Cart updated successfully',
                'cart' => $cart,
            ]);
        }
    
        return response()->json([
            'status' => 'error',
            'message' => 'Product not found in cart',
        ]);
    }
    
}
