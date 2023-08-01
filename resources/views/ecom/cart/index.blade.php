@extends('ecom.master.index')
@section('title')
    Cart
@endsection
@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">@yield('title')</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-cart {{session('message') ? 'pt-5' : 'section'}}">
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show text-center fw-bolder" role="alert">
                {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container">
            <div class="cart-list-head">

                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Unit Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>

                @foreach($cartProducts as $cartProduct)
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="product-details.html"><img src="{{asset($cartProduct->options->image)}}"
                                                                    alt="{{$cartProduct->name}}"></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a
                                        href="{{route('product.detail',['slug'=>$cartProduct->options->slug])}}">{{$cartProduct->name}}</a>
                                </h5>
                                <p class="product-des">
                                    <span><em>Category</em> {{$cartProduct->category}}</span>
                                    <span><em>Stock:</em> {{$cartProduct->options->stock}}</span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <form action="{{route('update.cart',['id'=>$cartProduct->rowId])}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$cartProduct->id}}">
                                    <div class="input-group input-group-sm">
                                        <input type="number" class="form-control shadow-none" name="quantity" min="1"
                                               value="{{$cartProduct->qty >= $cartProduct->options->stock ? $cartProduct->qty = $cartProduct->options->stock : $cartProduct->qty}}">
                                        <button class="btn btn-success btn-sm shadow-none" type="submit">Update</button>
                                    </div>
                                    @if($errors->has('quantity'))
                                        <span class="text-danger small">{{$errors->first('quantity')}}</span>
                                    @endif
                                </form>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>&#2547;{{number_format($cartProduct->price,2)}}</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>&#2547;{{number_format($cartProduct->subtotal,2)}}</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <a class="remove-item" href="javascript:void(0)"><i class="lni lni-close"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>$2560.00</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>You Save<span>$29.00</span></li>
                                        <li class="last">You Pay<span>$2531.00</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="checkout.html" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection