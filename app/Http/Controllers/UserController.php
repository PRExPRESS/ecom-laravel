<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $loggedUser = array('fname' => $user->fname, 'lname' => $user->lname, 'email' => $user->email, 'contact' => $user->phone);

        $orders = Order::with('orderItems')->where('user_id', $user->id)->get();
        
        return view('my-account', compact('loggedUser', 'orders'));
        
    }
}
