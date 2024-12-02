@extends('theme.admin.theme')
@section('title', 'Categories')
@section('description', 'Trendiest ecommerce website')

@section('content')
<!-- Breadcrumb start -->
<div class="row m-1">
    <div class="col-12 ">
        <h4 class="main-title">Brands</h4>
        <ul class="app-line-breadcrumbs mb-3">
            <li class="">
                <a href="#" class="f-s-14 f-w-500">
                    <span>
                        <i class="ph-duotone  ph-table f-s-16"></i>Brands
                    </span>
                </a>
            </li>
            <li class="active">
                <a href="#" class="f-s-14 f-w-500">Create Brands</a>
            </li>
        </ul>
    </div>
</div>
<!-- Breadcrumb end -->
<!-- Left Side: Product Information -->
<div class="col-md-8">
    <!-- Product Information Section -->
    <div class="card">
        <div class="card-header">
            <h5>Add new brand</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter brand name" required>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
</div>
@endsection