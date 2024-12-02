@extends('theme.admin.theme')
@section('title', 'Dashboard')
@section('description', 'Trendiest ecommerce website')

@section('content')


<!-- Breadcrumb start -->
<div class="row m-1">
    <div class="col-12 ">
        <h4 class="main-title">Users</h4>
        <ul class="app-line-breadcrumbs mb-3">
            <li class="">
                <a href="#" class="f-s-14 f-w-500">
                    <span>
                        <i class="ph-duotone  ph-table f-s-16"></i>Users
                    </span>
                </a>
            </li>
            <li class="active">
                <a href="#" class="f-s-14 f-w-500">Update Users</a>
            </li>
        </ul>
    </div>
</div>
<!-- Breadcrumb end -->
<div class="container mt-5">
    <form action="/admin/users/{{ $user->id }}" method="POST" enctype="multipart/form-data"  id="admin-create-user">
        @csrf

        @method('PUT')

        <div class="row">
            <!-- Left Side: Product Information -->
            <div class="col-md-8">
                <!-- Product Information Section -->
                <div class="card">
                    <div class="card-header">
                        <h5>User Details</h5>
                        
                    </div>
                    <div class="card-body">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fname" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname"  placeholder="Enter First Name" required value="{{ $user->fname }}">
                                    </div>
                                    @error('fname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname"  placeholder="Enter Last Name" required value="{{ $user->lname }}">
                                    </div>
                                    @error('lname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required value="{{ $user->email }}">
                                    </div>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter Phone Number" required value="{{ $user->phone }}">
                                    </div>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Enter Password" >
                                    </div>
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select" id="role" name="role" required>
                                            <option value="">Select Role</option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                                            <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>User</option>
                                        </select>
                                        
                                    </div>
                                </div>
                                
                            </div>
                        
                    </div>
                </div>
                
            </div>

            <!-- Right Side: User Privileges -->
            <div class="col-md-4" id="privileges">
                <!-- Privileges Section -->
                <div class="card">
                    <div class="card-header col justify-content-between align-items-center">
                        <h5 class="col-6">User Privileges</h5>
                        <div class="form-check col-6 mt-2">
                            <input class="form-check-input" type="checkbox" id="select-all"  value="true">
                            <label class="form-check-label" for="add_product">Select all</label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Product Privileges -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="add_product"  value="true">
                                    <label class="form-check-label" for="add_product">Add Product</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_product" value="true">
                                    <label class="form-check-label" for="edit_product">Edit Product</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="delete_product"  value="true">
                                    <label class="form-check-label" for="delete_product">Delete Product</label>
                                </div>
                
                                <!-- Category Privileges -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="add_category"  value="true">
                                    <label class="form-check-label" for="add_category">Add Category</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_category"  value="true">
                                    <label class="form-check-label" for="edit_category">Edit Category</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="delete_category"  value="true">
                                    <label class="form-check-label" for="delete_category">Delete Category</label>
                                </div>
                
                                <!-- Brand Privileges -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="add_brand"  value="true">
                                    <label class="form-check-label" for="add_brand">Add Brand</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_brand"  value="true">
                                    <label class="form-check-label" for="edit_brand">Edit Brand</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="delete_brand"  value="true">
                                    <label class="form-check-label" for="delete_brand">Delete Brand</label>
                                </div>
                
                                
                
                                <!-- Order Privileges -->
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="delete_order"  value="true">
                                    <label class="form-check-label" for="delete_order">Delete Order</label>
                                </div>
                
                                <!-- User Privileges -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="add_user" value="true">
                                    <label class="form-check-label" for="add_user">Add User</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_user"  value="true">
                                    <label class="form-check-label" for="edit_user">Edit User</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="delete_user"  value="true">
                                    <label class="form-check-label" for="delete_user">Delete User</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection