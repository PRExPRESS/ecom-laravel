<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Brand;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('brand', 'category')->paginate(10);
        $categories = Category::all();
        $brands = Brand::all();

        

        //dd($products);

        return view('shop', compact('products', 'categories', 'brands'));
    }

    // best seller
    public function home(){
        $products = Product::with('brand', 'category')->paginate(6);
        return view('home', compact('products'));
    }


    

    //get single product by id
    public function product(Request $request){
        $id = $request->input('id');
        $product = Product::with('brand', 'category')->find($id);
        $reviews = Review::join('users', 'reviews.user_id', '=', 'users.id')->where('product_id', $id)->get();
        return view('product', compact('product', 'reviews'));
    }

    //search product by name
    public function search(Request $request){
        $name = $request->input('text');
        
        $products = Product::with('brand', 'category')->where('name', 'like', '%' . $name . '%')->paginate(10);
        $categories = Category::all();
        $brands = Brand::all();
        //dd($products);
        return view('shop', compact('products', 'categories', 'brands'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            // Validate incoming request data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:products,slug',
                'category_id' => 'required|exists:categories,id',
                'brand_id' => 'required|exists:brands,id',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'colors' => 'required|string',
                'sizes' => 'required|string',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'status' => 'required|string',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images/products', 'public');
            }

            // Create new product
            $product = new Product();
            $product->name = $validated['name'];
            $product->slug = $validated['slug'];
            $product->category_id = $validated['category_id'];
            $product->brand_id = $validated['brand_id'];
            $product->image = $imagePath ?? null;
            $product->colors = $validated['colors'];
            $product->sizes = $validated['sizes'];
            $product->description = $validated['description'];
            $product->price = $validated['price'];
            $product->stock = $validated['stock'];
            $product->status = $validated['status'];
            $product->save();

            
            return redirect()->route('admin.admin.products.index')->with('success', 'Product created successfully.');
        } catch (Exception $e) {
            
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to create product. Please try again.');
        }
    }

    //admin product
    public function adminProduct(){
        $products = Product::with('brand', 'category')->paginate(10);
        return view('admin.prodcuts', compact('products'));
    }

    //delete product
    public function delete($id){
        
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.admin.products.index')->with('success', 'Product deleted successfully.');
    }

    //view product
    public function viewProduct($id){
        $product = Product::with('brand', 'category')->find($id);
        return view('admin.view-product', compact('product'));
    }
}
