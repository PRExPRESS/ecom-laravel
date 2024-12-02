<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Order;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $loggedUser = array('fname' => $user->fname, 'lname' => $user->lname, 'email' => $user->email, 'contact' => $user->phone);

        $orders = Order::with('orderItems')->where('user_id', $user->id)->get();
       // dd($orders);
        
        return view('my-account', compact('loggedUser', 'orders'));
        
    }
    public function register(Request $request)
    {

        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required'
        ]);
        $url = $request->input('url');


        try {


            $hashedPassword = bcrypt($validated['password']);
            $validated['password'] = $hashedPassword;

            $user = User::create($validated);


            if ($user && $url) {
                return redirect()->route('login', ['url' => $url]);
            }

            return redirect()->route('login')->with('success', 'Registration successful');
        } catch (Exception $e) {
            //dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    // Login function
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        try {
            $user = User::where('email', $request->email)->first();


            if (!$user || !Hash::check($request->password, $user->password)) {

                throw ValidationException::withMessages([
                    'email' => ['These credentials do not match our records.'],
                ]);
            }



            Auth::login($user);


            return redirect()->route('home')->with('success', 'Login successful');
        } catch (Exception $e) {
            //dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    // Logout function
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    //update profile
    public function update(Request $request)
    {


        try {
            $pssword = $request->password;
            if ($pssword != '') {
                $request->validate([
                    'fname' => 'required',
                    'lname' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                    'current_password' => 'required',
                    'confirm_password' => 'required|same:password',
                    'phone' => 'required',

                ]);
                if (!Hash::check($request->current_password, Auth::user()->password)) {
                    return back()->with('error', 'Current password is incorrect');
                }
    
                $hashedPassword = bcrypt($request->password);
                $user = User::find(Auth::user()->id);
                $user->fname = $request->fname;
                $user->lname = $request->lname;
                $user->email = $request->email;
                $user->password = $hashedPassword;
                $user->phone = $request->phone;
                $user->role = 'customer';
                $user->save();
                return redirect()->route('home')->with('success', 'Profile updated successfully');
            }
            $request->validate([
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required',
                'phone' => 'required',

            ]);
            $user = User::find(Auth::user()->id);
                $user->fname = $request->fname;
                $user->lname = $request->lname;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->role = 'customer';
                $user->save();
                return redirect()->route('my-account')->with('success', 'Profile updated successfully');

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
