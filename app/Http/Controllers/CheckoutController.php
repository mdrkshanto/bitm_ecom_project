<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $customer;

    public function index()
    {
        return view('ecom.checkout.index',['cartProducts'=>Cart::content()]);
    }
    public function newOrder(Request $request)
    {
        $this->customer = Customer::newCustomer($request);
    }
}
