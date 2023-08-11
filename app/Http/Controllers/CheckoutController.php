<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $customer, $order;

    public function index()
    {
        return view('ecom.checkout.index',['cartProducts'=>Cart::content()]);
    }
    public function newOrder(Request $request)
    {
        $this->customer = Customer::newCustomer($request);
        $this->order = Order::newOrder();
    }
}
