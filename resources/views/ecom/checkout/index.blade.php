@extends('ecom.master.index')
@section('title')
    Checkout
@endsection
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">@yield('title')</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <div class="card card-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#cod" type="button" role="tab" aria-selected="true">Cash on
                                        delivery
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#online" type="button" role="tab" aria-selected="false">
                                        Online payment
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="cod" role="tabpanel">
                                    <div class="card card-body rounded-0 border-top-0">
                                        <form action="{{route('checkout.test')}}" method="POST">
                                            @csrf
                                            <div class="my-3">
                                                <label class="form-label">Full Name</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Full name</span>
                                                    <input type="text" class="form-control shadow-none" name="name"
                                                           placeholder="Full Name" required/>
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <label class="form-label">Email</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Email</span>
                                                    <input type="email" class="form-control shadow-none" name="email"
                                                           placeholder="Email" required/>
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <label class="form-label">Mobile Number</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Mobile Number (+88)</span>
                                                    <input type="number" class="form-control shadow-none" name="mobile"
                                                           placeholder="Mobile Number" required/>
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <label class="form-label">Delivery Address</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Delivery Address</span>
                                                    <textarea name="delivery" class="form-control shadow-none"
                                                              placeholder="Delivery Address" required></textarea>
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <label class="form-label">Note</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Note</span>
                                                    <textarea name="note" class="form-control shadow-none"
                                                              placeholder="Your message for delivery."></textarea>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center my-3">
                                                <button class="btn btn-primary btn-sm shadow-none" type="submit">Confirm
                                                    order
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="online" role="tabpanel">
                                    <div class="card card-body rounded-0 border-top-0">
                                        <form action="{{route('checkout.test')}}" method="POST">
                                            @csrf
                                            <div class="my-3">
                                                <label class="form-label">Full Name</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Full name</span>
                                                    <input type="text" class="form-control shadow-none" name="name"
                                                           placeholder="Full Name" required/>
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <label class="form-label">Email</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Email</span>
                                                    <input type="email" class="form-control shadow-none" name="email"
                                                           placeholder="Email" required/>
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <label class="form-label">Mobile Number</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Mobile Number (+88)</span>
                                                    <input type="number" class="form-control shadow-none" name="mobile"
                                                           placeholder="Mobile Number" required/>
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <label class="form-label">Delivery Address</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Delivery Address</span>
                                                    <textarea name="delivery" class="form-control shadow-none"
                                                              placeholder="Delivery Address" required></textarea>
                                                </div>
                                            </div>
                                            <div class="my-3">
                                                <label class="form-label">Note</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text">Note</span>
                                                    <textarea name="note" class="form-control shadow-none"
                                                              placeholder="Your message for delivery."></textarea>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center my-3">
                                                <button class="btn btn-primary btn-sm shadow-none" type="submit">Confirm
                                                    order
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        @if(count(Cart::content())>0)
                            <div class="checkout-sidebar-coupon">
                                <p>Appy Coupon to get discount!</p>
                                <form action="#" method="POST">
                                    @csrf
                                    <div class="single-form form-default">
                                        <div class="form-input form">
                                            <input type="text" placeholder="Coupon Code" name="coupon_code">
                                        </div>
                                        <div class="button">
                                            <button class="btn" type="submit">Apply</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif
                        <div class="checkout-sidebar-price-table{{count(Cart::content())>0?' mt-30':null}}">
                            <h5 class="title">Pricing Table</h5>
                            @if(Cart::count() > 0)
                                <div class="sub-total-price">
                                    @foreach($cartProducts as $product)
                                        <div class="total-price">
                                            <p class="value">{{$product->name}}
                                                : {!! $product->qty.' X &#2547;'.$product->price !!}</p>
                                            <p class="price">&#2547;{{number_format($product->subtotal,2)}}</p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value">Subtotal:</p>
                                        <p class="price">&#2547;{{number_format(Cart::subtotal(),2)}}</p>
                                    </div>
                                    <div class="payable-price">
                                        <p class="value">TAX(15%):</p>
                                        <p class="price">&#2547;{{number_format(Cart::tax(),2)}}</p>
                                    </div>
                                    @if(Cart::count() > 0)
                                        @php(Cart::addCost('shippingCharge',100*Cart::content()->count()))
                                        <div class="payable-price">
                                            <p class="value">Shipping Charge:</p>
                                            <p class="price">
                                                &#2547;{{number_format(Cart::getCost('shippingCharge'),2)}}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value">Payable Total:</p>
                                        <p class="price">&#2547;{{number_format(Cart::total(),2)}}</p>
                                    </div>
                                </div>
                            @else
                                <div class="sub-total-price">
                                    <div class="total-price">
                                        <p class="value">Payable Total:</p>
                                        <p class="price">&#2547;{{number_format(Cart::total(),2)}}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('/')}}ecom/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
