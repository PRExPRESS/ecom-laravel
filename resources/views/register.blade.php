@extends('theme.theme')
@section('title', 'Register')
@section('description', 'Trendiest ecommerce shop')

@section('content')

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- page-title -->
<div class="tf-page-title style-2">
    <div class="container-full">
        <div class="heading text-center">Register</div>
    </div>
</div>
<!-- /page-title -->

<section class="flat-spacing-10">
    <div class="container">
        <div class="form-register-wrap">
            <div class="flat-title align-items-start gap-0 mb_30 px-0">
                <h5 class="mb_18">Register</h5>
                <p class="text_black-2">Sign up for early Sale access plus tailored new arrivals, trends and promotions. To opt out, click unsubscribe in our emails</p>
            </div>
            <div>
                <form id="register-form" action="/register" method="post" accept-charset="utf-8" data-mailchimp="true">
                    @csrf
                    <div class="tf-field style-1 mb_15">
                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property1" name="fname">
                        <label class="tf-field-label fw-4 text_black-2" for="property1">First name</label>
                        <label class="error" for="property1"></label> 
                    </div>
                    <div class="tf-field style-1 mb_15">
                        <input class="tf-field-input tf-input" placeholder=" " type="text" id="property2" name="lname">
                        <label class="tf-field-label fw-4 text_black-2" for="property2">Last name</label>
                        <label class="error" for="property2"></label> 
                    </div>
                    <div class="tf-field style-1 mb_15">
                        <input class="tf-field-input tf-input" placeholder=" " type="email" id="property3" name="email">
                        <label class="tf-field-label fw-4 text_black-2" for="property3">Email *</label>
                        <label class="error" for="property3"></label> 
                    </div>
                    <div class="tf-field style-1 mb_15">
                        <input class="tf-field-input tf-input" placeholder=" " type="tel" id="property4" name="phone">
                        <label class="tf-field-label fw-4 text_black-2" for="property4">Phone *</label>
                        <label class="error" for="property4"></label> 
                    </div>
                    <div class="tf-field style-1 mb_30">
                        <input class="tf-field-input tf-input" placeholder=" " type="password" id="property5" name="password">
                        <label class="tf-field-label fw-4 text_black-2" for="property5">Password *</label>
                        <label class="error" for="property5"></label> 
                    </div>
                    <input type="hidden" name="role" value="customer">
                    <div class="mb_20">
                        <button type="submit" class="tf-btn w-100 radius-3 btn-fill animate-hover-btn justify-content-center">Register</button>
                    </div>
                    <div class="text-center">
                        <a href="/login" class="tf-btn btn-line">Already have an account? Log in here<i class="icon icon-arrow1-top-left"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



@endsection

