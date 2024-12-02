@extends('theme.theme')
@section('title', 'My Account')
@section('description', 'Trendiest ecommerce website')

@section('content')
<!-- page-title -->
{{-- <pre>
    {{ print_r($orders->toArray()[0]) }}
</pre> --}}
@php
    $orderArray = $orders->toArray();
@endphp
<div class="tf-page-title">
    <div class="container-full">
        <div class="heading text-center">My Account</div>
    </div>
</div>
<!-- /page-title -->

<!-- page-cart -->
<section class="flat-spacing-11">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="wrap-sidebar-account">
                    <ul class="my-account-nav">
                        <li><span class="my-account-nav-item active">Dashboard</span></li>
                        <li><a href="#" class="my-account-nav-item">Orders</a></li>
                        
                        <li><a href="#" class="my-account-nav-item">Account Details</a></li>
                        
                        <li><a href="#" class="my-account-nav-item">Logout</a></li>
                    </ul>
                </div>
            </div>
            {{-- dashboard --}}
            <div class="col-lg-9 dashboard">
                <div class="my-account-content account-dashboard">
                    <div class="mb_60">
                        <h5 class="fw-5 mb_20">Hello {{ $loggedUser['fname'] }}</h5>
                        <p>
                            From your account dashboard you can view your <a class="text_primary" href="my-account-orders.html">recent orders</a>, manage your <a class="text_primary" href="my-account-address.html">shipping and billing address</a>, and <a class="text_primary" href="my-account-edit.html">edit your password and account details</a>.
                        </p>
                    </div>
                </div>
            </div>
            {{-- orders --}}
            <div class="col-lg-9 orders">
                <div class="my-account-content account-order">
                    <div class="wrap-account-order">
                        <table>
                            <thead>
                                <tr>
                                    <th class="fw-6">Order</th>
                                    <th class="fw-6">Date</th>
                                    <th class="fw-6">Status</th>
                                    <th class="fw-6">Total</th>
                                    <th class="fw-6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderArray as $order)
                                <tr class="tf-order-item">
                                    <td>
                                        #{{ $order['id'] }}
                                    </td>
                                    <td>
                                        {{ explode('T', $order['created_at'])[0] }}
                                    </td>
                                    <td>
                                        {{ $order['status'] }}
                                    </td>
                                    <td>
                                        ${{ $order['total_price'] }}
                                    </td>
                                    <td>
                                        <a href="#" class="tf-btn btn-fill animate-hover-btn rounded-0 justify-content-center">
                                            <span>View</span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- address --}}

            {{-- account details --}}
            <div class="col-lg-9 account-details">
                <div class="my-account-content account-edit">
                    <div class="">
                        <form class="" action="/update-profile" method="POST" id="form-password-change" action="#">
                            @method('PUT')
                            @csrf
                            
                            <div class="tf-field style-1 mb_15">
                                <input class="tf-field-input tf-input" placeholder=" " value="{{ $loggedUser['fname'] }}" type="text" id="property1" name="fname">
                                <label class="tf-field-label fw-4 text_black-2" for="property1">First name</label>
                            </div>
                            <div class="tf-field style-1 mb_15">
                                <input class="tf-field-input tf-input" placeholder=" " value="{{ $loggedUser['lname'] }}" type="text" id="property2" name="lname">
                                <label class="tf-field-label fw-4 text_black-2" for="property2">Last name</label>
                            </div>
                            <div class="tf-field style-1 mb_15">
                                <input class="tf-field-input tf-input" placeholder=" " value="{{ $loggedUser['email'] }}" type="email" id="property3" name="email">
                                <label class="tf-field-label fw-4 text_black-2" for="property3">Email</label>
                            </div>
                            <div class="tf-field style-1 mb_15">
                                <input class="tf-field-input tf-input" placeholder=" " value="{{ $loggedUser['contact'] }}" type="tel" id="property3" name="phone">
                                <label class="tf-field-label fw-4 text_black-2" for="property3">Phone</label>
                            </div>
                            <h6 class="mb_20">Password Change</h6>
                            <div class="tf-field style-1 mb_30">
                                <input class="tf-field-input tf-input" placeholder=" " type="password" id="property4" name="current_password">
                                <label class="tf-field-label fw-4 text_black-2" for="property4">Current password</label>
                            </div>
                            <div class="tf-field style-1 mb_30">
                                <input class="tf-field-input tf-input" placeholder=" " type="password" id="property5" name="password">
                                <label class="tf-field-label fw-4 text_black-2" for="property5">New password</label>
                            </div>
                            <div class="tf-field style-1 mb_30">
                                <input class="tf-field-input tf-input" placeholder=" " type="password" id="property6" name="confirm_password">
                                <label class="tf-field-label fw-4 text_black-2" for="property6">Confirm password</label>
                            </div>
                            <div class="mb_20">
                                <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- page-cart -->
@endsection