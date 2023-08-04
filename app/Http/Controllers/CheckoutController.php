<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('ecom.checkout.index',['cartProducts'=>Cart::content()]);
    }
    public function test(Request $request)
    {
        return $request;
    }
}
