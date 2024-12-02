<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
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


    public function filters(Request $request){
        $categories = $request->input('category');
        $price_min = $request->input('price-min');
        $price_max = $request->input('price-max');
        $brands = $request->input('brand');
        $availability = $request->input('availability');

        $query = Product::query();

        if ($categories) {
            $query->whereIn('category_id', $categories);
        }

        if ($price_min && $price_max) {
            $query->whereBetween('price', [$price_min, $price_max]);
        }

        if ($brands) {
            $query->whereIn('brand_id', $brands);
        }

        if ($availability) {
            $query->where('status', $availability);
        }

        $products = $query->with('brand', 'category')->paginate(10);

        $_categories = Category::all();
        $_brands = Brand::all();
        

        return view('shop', compact('products'))
        ->with('categories', $_categories)
        ->with('brands', $_brands);
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
