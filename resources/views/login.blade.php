@extends('theme.theme')
@section('title', 'Login')
@section('description', 'Trendiest ecommerce shop')

@section('content')

@if(session('success'))
<div class="position-fixed top-0 z-1 end-0 alert-wrap" >
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
@if(session('error'))
<div class="position-fixed top-0 z-1 end-0 alert-wrap" >
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<!-- page-title -->
<div class="tf-page-title style-2">
    <div class="container-full">
        <div class="heading text-center">Log in</div>
    </div>
</div>
<!-- /page-title -->

<section class="flat-spacing-10">
    <div class="container">
        <div class="tf-grid-layout lg-col-2 tf-login-wrap">
            <div class="tf-login-form">
                <div id="recover">
                    <h5 class="mb_24">Reset your password</h5>
                    <p class="mb_30">We will send you an email to reset your password</p>
                    <div>
                        <form class="" id="" action="#" method="post" accept-charset="utf-8" data-mailchimp="true">
                            <div class="tf-field style-1 mb_15">
                                <input class="tf-field-input tf-input" placeholder="" type="email" id="" name="email">
                                <label class="tf-field-label fw-4 text_black-2" for="">Email *</label>
                            </div>
                            <div class="mb_20">
                                <a href="#login" class="tf-btn btn-line">Cancel</a>
                            </div>
                            <div class="">
                                <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Reset password</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="login">
                    <h5 class="mb_36">Log in</h5>
                    <div>
                        <form id="login-form" action="/login" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="tf-field style-1 mb_15">
                                <input class="tf-field-input tf-input" placeholder="" type="email" id="property3" name="email">
                                <label class="tf-field-label fw-4 text_black-2" for="property3">Email *</label>
                                <!-- Error message for email -->
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="tf-field style-1 mb_30">
                                <input class="tf-field-input tf-input" placeholder="" type="password" id="property4" name="password">
                                <label class="tf-field-label fw-4 text_black-2" for="property4">Password *</label>
                                <!-- Error message for password -->
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="mb_20">
                                <a href="#recover" class="tf-btn btn-line">Forgot your password?</a>
                            </div>
                            <div class="">
                                <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Log in</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="tf-login-content">
                <h5 class="mb_36">I'm new here</h5>
                <p class="mb_20">Sign up for early Sale access plus tailored new arrivals, trends and promotions. To opt out, click unsubscribe in our emails.</p>
                <a href="/register" class="tf-btn btn-line">Register<i class="icon icon-arrow1-top-left"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection