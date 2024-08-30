@extends('frontend.layouts.master')
@section('title', 'Cart Page')
@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ 'home' }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody id="cart_item_list">
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                @if (Helper::getAllProductFromCart())
                                    @foreach (Helper::getAllProductFromCart() as $key => $cart)
                                        <tr>
                                            @php
                                                $photo = explode(',', $cart->product['photo']);
                                            @endphp
                                            <td class="image" data-title="No"><img src="{{ $photo[0] }}"
                                                    alt="{{ $photo[0] }}"></td>
                                            <td class="product-des" data-title="Description">
                                                <p class="product-name"><a
                                                        href="{{ route('product-detail', $cart->product['slug']) }}"
                                                        target="_blank">{{ $cart->product['title'] }}</a></p>
                                                <p class="product-des">{!! $cart['summary'] !!}</p>
                                            </td>
                                            <td class="price" data-title="Price">
                                                <span>€{{ number_format($cart['price'], 2) }}</span>
                                            </td>
                                            <td class="qty" data-title="Qty"><!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            disabled="disabled" data-type="minus"
                                                            data-field="quant[{{ $key }}]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="quant[{{ $key }}]"
                                                        class="input-number" data-min="1" data-max="100"
                                                        value="{{ $cart->quantity }}">
                                                    <input type="hidden" name="qty_id[]" value="{{ $cart->id }}">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number"
                                                            data-type="plus" data-field="quant[{{ $key }}]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--/ End Input Order -->
                                            </td>
                                            <td class="total-amount cart_single_price" data-title="Total"><span
                                                    class="money">€{{ $cart['amount'] }}</span></td>

                                            <td class="action" data-title="Remove"><a
                                                    href="{{ route('cart-delete', $cart->id) }}"><i
                                                        class="ti-trash remove-icon"></i></a></td>
                                        </tr>
                                    @endforeach
                                    <track>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="float-right">
                                        <button class="btn float-right" type="submit">Update</button>
                                    </td>
                                    </track>
                                @else
                                    <tr>
                                        <td class="text-center">
                                            There are no any carts available. <a href="{{ route('product-grids') }}"
                                                style="color:blue;">Continue shopping</a>

                                        </td>
                                    </tr>
                                @endif

                            </form>
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-6 col-md-5 col-12">
                                <div class="left">
                                    <div class="mb-3 font-bold" style="font-weight: bold">
                                        <span>Get 30% Off Coupon Code and add it to the box below. Thank you!</span>

                                    </div>
                                    <div class="mb-3">
                                        <span>(We will send you notifications in the following promotions) </span>
                                    </div>

                                    <div class="coupon my-3">
                                        <div class="mb-3"
                                            style="display: flex; align-items: center;justify-content: space-between; gap: 30px;">
                                            <div class="fs-5 " style="font-weight: bold">Got a Voucher?</div>
                                            <div><a href="#" class="fs-5 text-light btn bg-primary"
                                                    style="font-weight: bold">GET
                                                    VOUCHER &ensp; <i class="ti-plus"></i> </a></div>
                                        </div>

                                        <form class="d-flex items-center" action="{{ route('coupon-store') }}"
                                            method="POST">
                                            @csrf
                                            <input class="w-100" name="code" placeholder="Enter Your Voucher"
                                                style="border: #f7941f 1px solid"
                                                value="@if (Session::get('coupon')) {{ Session::get('coupon')['code'] }} @endif">
                                            <button class="btn"
                                                style="background: #F7941D; color: white; margin-top: 0">Apply</button>
                                        </form>
                                    </div>
                                    {{-- <div class="checkbox">`
										@php
											$shipping=DB::table('shippings')->where('status','active')->limit(1)->get();
										@endphp
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox" onchange="showMe('shipping');"> Shipping</label>
									</div> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{ Helper::totalCartPrice() }}">Cart
                                            Subtotal<span>€{{ number_format(Helper::totalCartPrice(), 2) }}</span></li>

                                        @if (session()->has('coupon'))
                                            <li class="coupon_price" data-price="{{ Session::get('coupon')['value'] }}">
                                                You
                                                Save<span>€{{ number_format(Session::get('coupon')['value'], 2) }}</span>
                                            </li>
                                        @endif
                                        @php
                                            $total_amount = Helper::totalCartPrice();
                                            if (session()->has('coupon')) {
                                                $total_amount = $total_amount - Session::get('coupon')['value'];
                                            }
                                        @endphp
                                        @if (session()->has('coupon'))
                                            <li class="last" id="order_total_price">You
                                                Pay<span>€{{ number_format($total_amount, 2) }}</span></li>
                                        @else
                                            <li class="last" id="order_total_price">You
                                                Pay<span>€{{ number_format($total_amount, 2) }}</span></li>
                                        @endif
                                    </ul>
                                    <div class="button5">
                                        <a href="{{ route('checkout') }}" class="btn">Checkout</a>
                                        <a href="{{ route('product-grids') }}" class="btn">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over €100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->

@isset($coupon_error)



    <div id="coupon_noti" class="fixed-top px-3 top-0 left-0 w-100 h-100 bg-black bg-opacity-10">
        <div class="text-center position-relative">
            <div class=" position-absolute " style="top: 12px;right: 12px;">
                <button class="p-2 fs-4" onclick="$('#coupon_noti').css('display','none')">
                    <i class="ti-close"></i>
                </button>
            </div>
            <img src="{{ asset('/images/icon/warning.png') }}" width="200" alt="">
            <div>
                <h4> Please Slect A Coupon Code</h4>
            </div>
            <div class="d-flex items-center justify-content-center mt-5" style="gap: 10px">
                <button class="btn bg-primary">Get Coupon</button>
            </div>
        </div>

    </div>
    @endisset

    <!-- Start Shop Newsletter  -->
    @include('frontend.layouts.newsletter')
    <!-- End Shop Newsletter -->

@endsection
@push('styles')
    <style>
        #coupon_noti {
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #coupon_noti>div {
            display: block;
            min-width: 40%;
            background: white;
            min-height: 50%;
            padding: 20px 10px;
            box-shadow: #8a8383 -1px 5px 70px;
            border-radius: 12px
        }

        li.shipping {
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }

        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }

        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }

        .form-select {
            height: 30px;
            width: 100%;
        }

        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }

        .list li {
            margin-bottom: 0 !important;
        }

        .list li:hover {
            background: #F7941D !important;
            color: white !important;
        }

        .form-select .nice-select::after {
            top: 14px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('frontend/js/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("select.select2").select2();
        });
        $('select.nice-select').niceSelect();
    </script>
    <script>
        $(document).ready(function() {
            $('.shipping select[name=shipping]').change(function() {
                let cost = parseFloat($(this).find('option:selected').data('price')) || 0;
                let subtotal = parseFloat($('.order_subtotal').data('price'));
                let coupon = parseFloat($('.coupon_price').data('price')) || 0;
                // alert(coupon);
                $('#order_total_price span').text('$' + (subtotal + cost - coupon).toFixed(2));
            });

        });
    </script>
@endpush
