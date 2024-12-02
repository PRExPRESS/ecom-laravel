@extends('theme.admin.theme')
@section('title', 'Dashboard')
@section('description', 'Trendiest ecommerce website')

@section('content')

    @php
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
    @endphp
    <!-- Breadcrumb start -->
    <div class="row m-1">
        <div class="col-12 ">
            <h4 class="main-title">Products</h4>
            <ul class="app-line-breadcrumbs mb-3">
                <li class="">
                    <a href="#" class="f-s-14 f-w-500">
                        <span>
                            <i class="ph-duotone  ph-table f-s-16"></i>Products
                        </span>
                    </a>
                </li>
                <li class="active">
                    <a href="#" class="f-s-14 f-w-500">Create Product</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb end -->
    <div class="container mt-5">


        <div class="row">
            <!-- Left Side: Product Information -->
            <div class="col-md-8">
                <!-- Product Information Section -->
                <div class="card">
                    <div class="card-header">
                        <h5>Add new product</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/admin/products/create" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <!-- Product Information Section -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Product Slug" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Category</label>
                                            <select class="form-select" id="category_id" name="category_id" required>
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="brand_id" class="form-label">Brand</label>
                                            <select class="form-select" id="brand_id" name="brand_id" required>
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Product Image</label>
                                            <input type="file" class="form-control" id="image" name="image" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="colors" class="form-label">Colors</label>
                                            <input type="text" class="form-control" id="colors" name="colors" placeholder="Enter Product Colors" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sizes" class="form-label">Sizes</label>
                                            <input type="text" class="form-control" id="sizes" name="sizes" placeholder="Enter Product Sizes" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter Product Description" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="Enter Product Price" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter Stock Quantity" required>
                                        </div>
                                    </div>
                                    <input type="hidden" name="status" value="available">
                                </div>
                        
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>

            </div>


        </div>



    </div>

@endsection
