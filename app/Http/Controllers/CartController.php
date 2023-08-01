<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    private $product;

    public function index()
    {
//        return Cart::content();

        return view('ecom.cart.index',['cartProducts'=>Cart::content()]);
    }
    public function add(Request $request, $id)
    {
        $this->product = Product::find($id);
        $stockAmount = $this->product->stock_amount;
        $this->validate($request,[
            'quantity' => "required|numeric|min:1|max:$stockAmount",
        ],[
            'quantity.max'=>'The quantity cannot be greater than '.$stockAmount.'.'
        ]);

        if (Cart::count() >= $stockAmount)
        {
            $qty = $stockAmount;
        }else{
            $qty = $request->quantity;
        }

        Cart::add([
            'id'        => $this->product->id,
            'name'      => $this->product->name,
            'qty'       => $qty,
            'price'     => $this->product->selling_price,
            'options'   => [
                'image'     => $this->product->image,
                'category'  => $this->product->category->name,
                'slug'      => $this->product->slug,
                'stock'     => $this->product->stock_amount
            ]
        ]);

        return redirect()->route('cart');
    }

    public function update(Request $request, $id)
    {
        $this->product = Product::find($request->product_id);
        $stockAmount = $this->product->stock_amount;

        $this->validate($request,[
            'quantity' => "required|numeric|min:1|max:$stockAmount",
        ],[
            'quantity.max'=>'The quantity cannot be greater than '.$stockAmount.'.'
        ]);

        Cart::update($id,$request->quantity);

        return back()->with('message', 'Your cart has been updated successfully.');
    }
}
