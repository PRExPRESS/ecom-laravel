<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Order;
use App\Models\Previlages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

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



        try {


            $hashedPassword = bcrypt($validated['password']);
            $validated['password'] = $hashedPassword;

            $user = User::create($validated);

            $url = $request->url();

            if (strpos($url, 'admin') !== false) {
                return redirect()->route('admin.users')->with('success', 'Registration successful');
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
            $path = $request->path();
            $adminPart = explode('/', $path)[0]; 

            //dd($adminPart); 
            $user = User::where('email', $request->email)->first();


            if (!$user || !Hash::check($request->password, $user->password)) {

                throw ValidationException::withMessages([
                    'email' => ['These credentials do not match our records.'],
                ]);
            }



            Auth::login($user);

            if ($adminPart == 'admin') {
                return redirect()->route('admin.admin.dashboard')->with('success', 'Login successful');
            }


            return redirect()->route('home')->with('success', 'Login successful');
        } catch (Exception $e) {
            //dd($e->getMessage());
            return back()->with('error', $e->getMessage());
        }
    }

    // Logout function
    public function logout(Request $request)
    {
        $path = $request->path();
            $adminPart = explode('/', $path)[0]; 
        Auth::logout();

        if ($adminPart == 'admin') {
            return redirect()->route('admin.login')->with('success', 'Logout successful');
        }
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

    //admin users view
    public function viewUsers(Request $request)
    {

        if ($request->input('search') != null) {
            $search = $request->input('search');
            $users = User::where('fname', 'like', '%' . $search . '%')
                ->orWhere('lname', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->paginate(10);
            return view('admin.users', compact('users'));
        }
        if ($request->input('items') != null) {
            $items = $request->input('items');
            $users = User::paginate($items);
            return view('admin.users', compact('users'));
        }

        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }



    public function store(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,editor,user',

        ]);

        $privileges = json_decode($request->privileges, true);
        // dd($privileges);
        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the new user
        try {

            $user = User::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);


            $previlageData = [];
            if ($user) {



                if (in_array($user->role, ['admin', 'editor'])) {
                    foreach ($privileges as  $priv) {
                        foreach ($priv as $key => $value) {
                            $previlageData[$key] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
                        }
                    }

                    $previlageData['user_id'] = 1;
                    //dd($previlageData);

                    Previlages::create($previlageData);
                }
            }






            return redirect()->route('admin.admin.users')->with('success', 'User registered successfully.');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    //view user
    public function viewUser($id)
    {
        $user = User::find($id);
        return view('admin.update-user', compact('user'));
    }


    //update user
    public function updateUser(Request $request, $id)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,  
            'phone' => 'required|unique:users,phone,' . $id,  
            'password' => 'nullable|string|min:8',  
            'role' => 'required|in:admin,editor,user',
        ]);

        // Decode privileges
        $privileges = json_decode($request->privileges, true);

        // Handle validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Find the user by ID
            $user = User::findOrFail($id);

            // Update user data
            $user->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'phone' => $request->phone,
                'role' => $request->role,
                
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ]);

            // Update privileges for admin/editor roles
            if (in_array($user->role, ['admin', 'editor'])) {
                $privilegeData = [];

                // Process privileges
                foreach ($privileges as $priv) {
                    foreach ($priv as $key => $value) {
                        $privilegeData[$key] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
                    }
                }

                
                $privilegeData['user_id'] = $user->id;  

                // Update privileges in the database
                Previlages::updateOrCreate(
                    ['user_id' => $user->id],  
                    $privilegeData             
                );
            }

            
            return redirect()->route('admin.admin.users')->with('success', 'User updated successfully.');
        } catch (Exception $e) {
            
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
