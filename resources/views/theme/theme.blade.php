<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name')) | Trendiest</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('build/assets/app-044a44ad.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js" integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <!-- Header -->
    @php
        $cart = session()->get('cart', []);

    @endphp
    {{-- <pre>
        {{ print_r($cart) }}
    </pre> --}}
    @if (session('success'))
        <div class="position-fixed top-0 z-3 end-0 alert-wrap">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="position-fixed top-0 z-3 end-0 alert-wrap">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <header id="header" class="header-default">
        <div class="px_15 lg-px_40">
            <div class="row wrapper-header align-items-center">
                <div class="col-md-4 col-3 tf-lg-hidden">
                    <a href="#mobileMenu" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16"
                            fill="none">
                            <path
                                d="M2.00056 2.28571H16.8577C17.1608 2.28571 17.4515 2.16531 17.6658 1.95098C17.8802 1.73665 18.0006 1.44596 18.0006 1.14286C18.0006 0.839753 17.8802 0.549063 17.6658 0.334735C17.4515 0.120408 17.1608 0 16.8577 0H2.00056C1.69745 0 1.40676 0.120408 1.19244 0.334735C0.978109 0.549063 0.857702 0.839753 0.857702 1.14286C0.857702 1.44596 0.978109 1.73665 1.19244 1.95098C1.40676 2.16531 1.69745 2.28571 2.00056 2.28571ZM0.857702 8C0.857702 7.6969 0.978109 7.40621 1.19244 7.19188C1.40676 6.97755 1.69745 6.85714 2.00056 6.85714H22.572C22.8751 6.85714 23.1658 6.97755 23.3801 7.19188C23.5944 7.40621 23.7148 7.6969 23.7148 8C23.7148 8.30311 23.5944 8.59379 23.3801 8.80812C23.1658 9.02245 22.8751 9.14286 22.572 9.14286H2.00056C1.69745 9.14286 1.40676 9.02245 1.19244 8.80812C0.978109 8.59379 0.857702 8.30311 0.857702 8ZM0.857702 14.8571C0.857702 14.554 0.978109 14.2633 1.19244 14.049C1.40676 13.8347 1.69745 13.7143 2.00056 13.7143H12.2863C12.5894 13.7143 12.8801 13.8347 13.0944 14.049C13.3087 14.2633 13.4291 14.554 13.4291 14.8571C13.4291 15.1602 13.3087 15.4509 13.0944 15.6653C12.8801 15.8796 12.5894 16 12.2863 16H2.00056C1.69745 16 1.40676 15.8796 1.19244 15.6653C0.978109 15.4509 0.857702 15.1602 0.857702 14.8571Z"
                                fill="currentColor"></path>
                        </svg>
                    </a>
                </div>
                <div class="col-xl-3 col-md-4 col-6">
                    <a href="/" class="logo-header">
                        <img src="{{ asset('images/logo/logo.svg') }}" alt="logo" class="logo">
                    </a>
                </div>
                <div class="col-xl-6 tf-md-hidden">
                    <nav class="box-navigation text-center">
                        <ul class="box-nav-ul d-flex align-items-center justify-content-center gap-30">
                            <li class="menu-item">
                                <a href="/" class="item-link">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="/shop" class="item-link">Shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="/about" class="item-link">About us</a>
                            </li>
                            <li class="menu-item position-relative">
                                <a href="/contact" class="item-link">Contact</a>

                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-3 col-md-4 col-3">
                    <ul class="nav-icon d-flex justify-content-end align-items-center gap-20">
                        <li class="nav-search"><a href="#canvasSearch" data-bs-toggle="offcanvas"
                                aria-controls="offcanvasLeft" class="nav-icon-item"><i class="icon icon-search"></i></a>
                        </li>
                        <li class="nav-account"><a href="/my-account" class="nav-icon-item"><i
                                    class="icon icon-account"></i></a></li>
                        <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item"><i
                                    class="icon icon-bag"></i><span class="count-box">0</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="position-fixed top-0 z-1 end-0 alert-wrap" id="alert">
        </div>
    </header>
    <!-- /Header -->




    @yield('content')

    <!-- Footer -->
    <footer id="footer" class="footer md-pb-70">
        <div class="footer-wrap">
            <div class="footer-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="footer-infor">
                                <div class="footer-logo">
                                    <a href="index.html">
                                        <img src="{{ asset('images/logo/logo.svg') }}" alt="">
                                    </a>
                                </div>
                                <ul>
                                    <li>
                                        <p>Address: 1234 Fashion Street, Suite 567, <br> New York, NY 10001</p>
                                    </li>
                                    <li>
                                        <p>Email: <a href="#">info@fashionshop.com</a></p>
                                    </li>
                                    <li>
                                        <p>Phone: <a href="#">(212) 555-1234</a></p>
                                    </li>
                                </ul>
                                <a href="contact-1.html" class="tf-btn btn-line">Get direction<i
                                        class="icon icon-arrow1-top-left"></i></a>
                                <ul class="tf-social-icon d-flex gap-10">
                                    <li><a href="#" class="box-icon w_34 round social-facebook social-line"><i
                                                class="icon fs-14 icon-fb"></i></a></li>
                                    <li><a href="#" class="box-icon w_34 round social-twiter social-line"><i
                                                class="icon fs-12 icon-Icon-x"></i></a></li>
                                    <li><a href="#" class="box-icon w_34 round social-instagram social-line"><i
                                                class="icon fs-14 icon-instagram"></i></a></li>
                                    <li><a href="#" class="box-icon w_34 round social-tiktok social-line"><i
                                                class="icon fs-14 icon-tiktok"></i></a></li>
                                    <li><a href="#" class="box-icon w_34 round social-pinterest social-line"><i
                                                class="icon fs-14 icon-pinterest-1"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                            <div class="footer-heading footer-heading-desktop">
                                <h6>Help</h6>
                            </div>
                            <div class="footer-heading footer-heading-moblie">
                                <h6>Help</h6>
                            </div>
                            <ul class="footer-menu-list tf-collapse-content">
                                <li>
                                    <a href="privacy-policy.html" class="footer-menu_item">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="delivery-return.html" class="footer-menu_item"> Returns + Exchanges </a>
                                </li>
                                <li>
                                    <a href="shipping-delivery.html" class="footer-menu_item">Shipping</a>
                                </li>
                                <li>
                                    <a href="terms-conditions.html" class="footer-menu_item">Terms &amp;
                                        Conditions</a>
                                </li>
                                <li>
                                    <a href="faq-1.html" class="footer-menu_item">FAQ’s</a>
                                </li>
                                <li>
                                    <a href="compare.html" class="footer-menu_item">Compare</a>
                                </li>
                                <li>
                                    <a href="wishlist.html" class="footer-menu_item">My Wishlist</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12 footer-col-block">
                            <div class="footer-heading footer-heading-desktop">
                                <h6>About us</h6>
                            </div>
                            <div class="footer-heading footer-heading-moblie">
                                <h6>About us</h6>
                            </div>
                            <ul class="footer-menu-list tf-collapse-content">
                                <li>
                                    <a href="about-us.html" class="footer-menu_item">Our Story</a>
                                </li>
                                <li>
                                    <a href="our-store.html" class="footer-menu_item">Visit Our Store</a>
                                </li>
                                <li>
                                    <a href="contact-1.html" class="footer-menu_item">Contact Us</a>
                                </li>
                                <li>
                                    <a href="login.html" class="footer-menu_item">Account</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-3 col-md-6 col-12">
                            <div class="footer-newsletter footer-col-block">
                                <div class="footer-heading footer-heading-desktop">
                                    <h6>Sign Up for Email</h6>
                                </div>
                                <div class="footer-heading footer-heading-moblie">
                                    <h6>Sign Up for Email</h6>
                                </div>
                                <div class="tf-collapse-content">
                                    <div class="footer-menu_item">Sign up to get first dibs on new arrivals, sales,
                                        exclusive content, events and more!</div>
                                    <form class="form-newsletter" id="subscribe-form" action="#" method="post"
                                        accept-charset="utf-8" data-mailchimp="true">
                                        <div id="subscribe-content">
                                            <fieldset class="email">
                                                <input type="email" name="email-form" id="subscribe-email"
                                                    placeholder="Enter your email...." tabindex="0"
                                                    aria-required="true">
                                            </fieldset>
                                            <div class="button-submit">
                                                <button id="subscribe-button"
                                                    class="tf-btn btn-sm radius-3 btn-fill btn-icon animate-hover-btn"
                                                    type="button">Subscribe<i
                                                        class="icon icon-arrow1-top-left"></i></button>
                                            </div>
                                        </div>
                                        <div id="subscribe-msg"></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div
                                class="footer-bottom-wrap d-flex gap-20 flex-wrap justify-content-between align-items-center">
                                <div class="footer-menu_item">© 2024 Ecomus Store. All Rights Reserved</div>
                                <div class="tf-payment">
                                    <img src="{{ asset('images/payments/visa.png') }}" alt="">
                                    <img src="{{ asset('images/payments/img-1.png') }}" alt="">
                                    <img src="{{ asset('images/payments/img-2.png') }}" alt="">
                                    <img src="{{ asset('images/payments/img-3.png') }}" alt="">
                                    <img src="{{ asset('images/payments/img-4.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->





    <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-one" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-one">
                            <span>Home</span>

                        </a>

                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-two" class="collapsed mb-menu-link current" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="dropdown-menu-two">
                            <span>Shop</span>

                        </a>

                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-three" class="collapsed mb-menu-link current"
                            data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-three">
                            <span>About</span>

                        </a>

                    </li>
                    <li class="nav-mb-item">
                        <a href="#dropdown-menu-four" class="collapsed mb-menu-link current"
                            data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-four">
                            <span>Contact</span>
                            <span class="btn-open-sub"></span>
                        </a>

                    </li>

                </ul>
                <div class="mb-other-content">
                    <div class="d-flex group-icon">

                        <a href="home-search.html" class="site-nav-icon"><i class="icon icon-search"></i>Search</a>
                    </div>
                    <div class="mb-notice">
                        <a href="contact-1.html" class="text-need">Need help ?</a>
                    </div>
                    <ul class="mb-info">
                        <li>Address: 1234 Fashion Street, Suite 567, <br> New York, NY 10001</li>
                        <li>Email: <b>info@fashionshop.com</b></li>
                        <li>Phone: <b>(212) 555-1234</b></li>
                    </ul>
                </div>
            </div>
            <div class="mb-bottom">
                <a href="login.html" class="site-nav-icon"><i class="icon icon-account"></i>Login</a>

            </div>
        </div>
    </div>
    <!-- /mobile menu -->

    <!-- canvasSearch -->
    <div class="offcanvas offcanvas-end canvas-search" id="canvasSearch">
        <div class="canvas-wrapper">
            <header class="tf-search-head">
                <div class="title fw-5">
                    Search our site
                    <div class="close">
                        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas"
                            aria-label="Close"></span>
                    </div>
                </div>
                <div class="tf-search-sticky">
                    <form class="tf-mini-search-frm" action="/shop-search" method="get">
                        <fieldset class="text">
                            <input type="text" placeholder="Search" class="" name="text" tabindex="0"
                                value="" aria-required="true" required="">
                        </fieldset>
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </form>
                </div>
            </header>
            <div class="canvas-body p-0">
                <div class="tf-search-content">
                    <div class="tf-cart-hide-has-results">
                        <div class="tf-col-quicklink">
                            <div class="tf-search-content-title fw-5">Quick link</div>
                            <ul class="tf-quicklink-list">
                                <li class="tf-quicklink-item">
                                    <a href="shop-default.html" class="">Fashion</a>
                                </li>
                                <li class="tf-quicklink-item">
                                    <a href="shop-default.html" class="">Men</a>
                                </li>
                                <li class="tf-quicklink-item">
                                    <a href="shop-default.html" class="">Women</a>
                                </li>
                                <li class="tf-quicklink-item">
                                    <a href="shop-default.html" class="">Accessories</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tf-col-content">
                            <div class="tf-search-content-title fw-5">Need some inspiration?</div>
                            <div class="tf-search-hidden-inner">
                                <div class="tf-loop-item">
                                    <div class="image">
                                        <a href="product-detail.html">
                                            <img src="{{ asset('images/products/white-3.jpg') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="product-detail.html">Cotton jersey top</a>
                                        <div class="tf-product-info-price">
                                            <div class="compare-at-price">$10.00</div>
                                            <div class="price-on-sale fw-6">$8.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-loop-item">
                                    <div class="image">
                                        <a href="product-detail.html">
                                            <img src="{{ asset('images/products/white-2.jpg') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="product-detail.html">Mini crossbody bag</a>
                                        <div class="tf-product-info-price">
                                            <div class="price fw-6">$18.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tf-loop-item">
                                    <div class="image">
                                        <a href="product-detail.html">
                                            <img src="{{ asset('images/products/white-1.jpg') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="product-detail.html">Oversized Printed T-shirt</a>
                                        <div class="tf-product-info-price">
                                            <div class="price fw-6">$18.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /canvasSearch -->
    <!-- shoppingCart -->
    <div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="header">
                    <div class="title fw-5">Shopping cart</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap">

                    <div class="tf-mini-cart-wrap">
                        <div class="tf-mini-cart-main">
                            <div class="tf-mini-cart-sroll">
                                <div class="tf-mini-cart-items">

                                </div>



                                <div class="tf-mini-cart-bottom">

                                    <div class="tf-mini-cart-bottom-wrap">
                                        <div class="tf-cart-totals-discounts">
                                            <div class="tf-cart-total">Subtotal</div>
                                            <div class="tf-totals-total-value fw-6 subtotal"></div>
                                        </div>
                                        <div class="tf-cart-tax">Taxes and <a href="#">shipping</a>
                                            calculated at
                                            checkout</div>
                                        <div class="tf-mini-cart-line"></div>
                                        <div class="tf-cart-checkbox">
                                            <div class="tf-checkbox-wrapp">
                                                <input class="" type="checkbox" id="CartDrawer-Form_agree"
                                                    name="agree_checkbox">
                                                <div>
                                                    <i class="icon-check"></i>
                                                </div>
                                            </div>
                                            <label for="CartDrawer-Form_agree">
                                                I agree with the
                                                <a href="#" title="Terms of Service">terms and
                                                    conditions</a>
                                            </label>
                                        </div>
                                        <div class="tf-mini-cart-view-checkout">
                                            <a href="/view-cart"
                                                class="tf-btn btn-outline radius-3 link w-100 justify-content-center">View
                                                cart</a>
                                            <a href="/checkout"
                                                class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Check
                                                    out</span></a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /shoppingCart -->
            <!-- modal quick_add -->
            <div class="modal fade modalDemo" id="quick_add">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="header">
                            <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                        </div>
                        <div class="wrap">
                            <div class="tf-product-info-item">
                                <div class="image">
                                    <img src="images/products/orange-1.jpg" alt="">
                                </div>
                                <div class="content">
                                    <a href="product-detail.html">Ribbed Tank Top</a>
                                    <div class="tf-product-info-price">
                                        <!-- <div class="price-on-sale">$8.00</div>
                                <div class="compare-at-price">$10.00</div>
                                <div class="badges-on-sale"><span>20</span>% OFF</div> -->
                                        <div class="price">$18.00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-product-info-variant-picker mb_15">
                                <div class="variant-picker-item">
                                    <div class="variant-picker-label">
                                        Color: <span class="fw-6 variant-picker-label-value">Orange</span>
                                    </div>
                                    <div class="variant-picker-values">
                                        <input id="values-orange" type="radio" name="color" checked>
                                        <label class="hover-tooltip radius-60" for="values-orange"
                                            data-value="Orange">
                                            <span class="btn-checkbox bg-color-orange"></span>
                                            <span class="tooltip">Orange</span>
                                        </label>
                                        <input id="values-black" type="radio" name="color">
                                        <label class=" hover-tooltip radius-60" for="values-black"
                                            data-value="Black">
                                            <span class="btn-checkbox bg-color-black"></span>
                                            <span class="tooltip">Black</span>
                                        </label>
                                        <input id="values-white" type="radio" name="color">
                                        <label class="hover-tooltip radius-60" for="values-white" data-value="White">
                                            <span class="btn-checkbox bg-color-white"></span>
                                            <span class="tooltip">White</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="variant-picker-item">
                                    <div class="variant-picker-label">
                                        Size: <span class="fw-6 variant-picker-label-value">S</span>
                                    </div>
                                    <div class="variant-picker-values">
                                        <input type="radio" name="size" id="values-s" checked>
                                        <label class="style-text" for="values-s" data-value="S">
                                            <p>S</p>
                                        </label>
                                        <input type="radio" name="size" id="values-m">
                                        <label class="style-text" for="values-m" data-value="M">
                                            <p>M</p>
                                        </label>
                                        <input type="radio" name="size" id="values-l">
                                        <label class="style-text" for="values-l" data-value="L">
                                            <p>L</p>
                                        </label>
                                        <input type="radio" name="size" id="values-xl">
                                        <label class="style-text" for="values-xl" data-value="XL">
                                            <p>XL</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tf-product-info-quantity mb_15">
                                <div class="quantity-title fw-6">Quantity</div>
                                <div class="wg-quantity">
                                    <span class="btn-quantity minus-btn">-</span>
                                    <input type="text" name="number" value="1">
                                    <span class="btn-quantity plus-btn">+</span>
                                </div>
                            </div>
                            <div class="tf-product-info-buy-button">
                                <form class="">
                                    <a href="javascript:void(0);"
                                        class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Add
                                            to cart -&nbsp;</span><span class="tf-qty-price">$18.00</span></a>
                                    <div class="tf-product-btn-wishlist btn-icon-action">
                                        <i class="icon-heart"></i>
                                        <i class="icon-delete"></i>
                                    </div>
                                    <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                        class="tf-product-btn-wishlist box-icon bg_white compare btn-icon-action">
                                        <span class="icon icon-compare"></span>
                                        <span class="icon icon-check"></span>
                                    </a>
                                    <div class="w-100">
                                        <a href="#" class="btns-full">Buy with <img
                                                src="images/payments/paypal.png" alt=""></a>
                                        <a href="#" class="payment-more-option">More payment options</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /modal quick_add -->

            <!-- modal quick_view -->
            <div class="modal fade modalDemo" id="quick_view">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="header">
                            <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                        </div>
                        <div class="wrap">
                            <div class="tf-product-media-wrap">
                                <div dir="ltr" class="swiper tf-single-slide">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="item">
                                                <img src="images/products/orange-1.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="item">
                                                <img src="images/products/pink-1.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next button-style-arrow single-slide-prev"></div>
                                    <div class="swiper-button-prev button-style-arrow single-slide-next"></div>
                                </div>
                            </div>
                            <div class="tf-product-info-wrap position-relative">
                                <div class="tf-product-info-list">
                                    <div class="tf-product-info-title">
                                        <h5><a class="link" href="product-detail.html">Ribbed Tank Top</a>
                                        </h5>
                                    </div>
                                    <div class="tf-product-info-badges">
                                        <div class="badges text-uppercase">Best seller</div>
                                        <div class="product-status-content">
                                            <i class="icon-lightning"></i>
                                            <p class="fw-6">Selling fast! 48 people have this in their carts.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-price">
                                        <div class="price">$18.00</div>
                                    </div>
                                    <div class="tf-product-description">
                                        <p>Nunc arcu faucibus a et lorem eu a mauris adipiscing conubia ac
                                            aptent ligula
                                            facilisis a auctor habitant parturient a a.Interdum fermentum.</p>
                                    </div>
                                    <div class="tf-product-info-variant-picker">
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label">
                                                Color: <span class="fw-6 variant-picker-label-value">Orange</span>
                                            </div>
                                            <div class="variant-picker-values">
                                                <input id="values-orange-1" type="radio" name="color-1" checked>
                                                <label class="hover-tooltip radius-60" for="values-orange-1"
                                                    data-value="Orange">
                                                    <span class="btn-checkbox bg-color-orange"></span>
                                                    <span class="tooltip">Orange</span>
                                                </label>
                                                <input id="values-black-1" type="radio" name="color-1">
                                                <label class=" hover-tooltip radius-60" for="values-black-1"
                                                    data-value="Black">
                                                    <span class="btn-checkbox bg-color-black"></span>
                                                    <span class="tooltip">Black</span>
                                                </label>
                                                <input id="values-white-1" type="radio" name="color-1">
                                                <label class="hover-tooltip radius-60" for="values-white-1"
                                                    data-value="White">
                                                    <span class="btn-checkbox bg-color-white"></span>
                                                    <span class="tooltip">White</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="variant-picker-item">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="variant-picker-label">
                                                    Size: <span class="fw-6 variant-picker-label-value">S</span>
                                                </div>
                                                <div class="find-size btn-choose-size fw-6">Find your size
                                                </div>
                                            </div>
                                            <div class="variant-picker-values">
                                                <input type="radio" name="size-1" id="values-s-1" checked>
                                                <label class="style-text" for="values-s-1" data-value="S">
                                                    <p>S</p>
                                                </label>
                                                <input type="radio" name="size-1" id="values-m-1">
                                                <label class="style-text" for="values-m-1" data-value="M">
                                                    <p>M</p>
                                                </label>
                                                <input type="radio" name="size-1" id="values-l-1">
                                                <label class="style-text" for="values-l-1" data-value="L">
                                                    <p>L</p>
                                                </label>
                                                <input type="radio" name="size-1" id="values-xl-1">
                                                <label class="style-text" for="values-xl-1" data-value="XL">
                                                    <p>XL</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-quantity">
                                        <div class="quantity-title fw-6">Quantity</div>
                                        <div class="wg-quantity">
                                            <span class="btn-quantity minus-btn">-</span>
                                            <input type="text" name="number" value="1">
                                            <span class="btn-quantity plus-btn">+</span>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-buy-button">
                                        <form class="">
                                            <a href="javascript:void(0);"
                                                class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn btn-add-to-cart"><span>Add
                                                    to cart -&nbsp;</span><span class="tf-qty-price">$8.00</span></a>
                                            <a href="javascript:void(0);"
                                                class="tf-product-btn-wishlist hover-tooltip box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>
                                            <a href="#compare" data-bs-toggle="offcanvas"
                                                aria-controls="offcanvasLeft"
                                                class="tf-product-btn-wishlist hover-tooltip box-icon bg_white compare btn-icon-action">
                                                <span class="icon icon-compare"></span>
                                                <span class="tooltip">Add to Compare</span>
                                                <span class="icon icon-check"></span>
                                            </a>
                                            <div class="w-100">
                                                <a href="#" class="btns-full">Buy with <img
                                                        src="images/payments/paypal.png" alt=""></a>
                                                <a href="#" class="payment-more-option">More payment
                                                    options</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        <a href="product-detail.html" class="tf-btn fw-6 btn-line">View full
                                            details<i class="icon icon-arrow1-top-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /modal quick_view -->

        </div>
    </div>

    <script type="module" src="{{ asset('build/assets/app-fd99b183.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
