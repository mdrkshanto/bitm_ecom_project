<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('ecom.checkout.index');
    }
    public function test(Request $request)
    {
        return $request;
    }
}
