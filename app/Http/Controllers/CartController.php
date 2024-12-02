<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Exception;
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
            'size' =>'required',
            'image' => 'required'
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
                'size' => $validated['size'],
                'image' => $validated['image']

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

    //checkout
    public function checkout(Request $request){
        $user = auth()->user();
        $cart = session()->get('cart');
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        try {
            //code...
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $total,
                'status' => 'pending'

            ]);

            $orderItems = [];
            foreach ($cart as $item) {
                $orderItems[] = [
                    'order_id' => $order->id,
                    'product_id' => $item['item_id'],
                    'size_id' => $item['size'],
                    'color_id' => $item['color'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ];
            }
            //dd($orderItems);
            OrderItem::insert($orderItems);
            
            session()->forget('cart');
            return redirect()->route('my-account')->with('success', 'Order created successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
        
    }
    
}
