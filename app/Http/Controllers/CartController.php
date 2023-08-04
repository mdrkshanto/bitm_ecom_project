<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $product,$shippingCost;

    public function index()
    {
        $this->shippingCost = 100;
        return view('ecom.cart.index',['cartProducts'=>Cart::content()]);
    }


    public function addSingleProduct($slug)
    {
        $this->product = Product::where('slug',$slug)->first();

        $stockAmount = $this->product->stock_amount;
        if (Cart::count() > 0)
        {
            foreach (Cart::content() as $cartProduct)
            {
                if ($cartProduct->id == $this->product->id)
                {
                    $totalItem = ($cartProduct->qty + 1);
                    if ($stockAmount <= $totalItem)
                    {
                        return back()->with('message','Sorry, we have no more this product in stock. Please, try other product.');
                    }
                }
            }
        }

        Cart::add([
            'id'        => $this->product->id,
            'name'      => $this->product->name,
            'qty'       => 1,
            'price'     => $this->product->selling_price,
            'options'   => [
                'image'     => $this->product->image,
                'category'  => $this->product->category->name,
                'slug'      => $this->product->slug,
                'stock'     => $this->product->stock_amount
            ]
        ]);

        return back();
    }
    public function add(Request $request, $id)
    {
        $this->product = Product::find($id);
        $stockAmount = $this->product->stock_amount;
        if (Cart::count() > 0)
        {
            foreach (Cart::content() as $cartProduct)
            {
                if ($cartProduct->id == $id)
                {
                    $totalItem = ($cartProduct->qty + $request->quantity);
                    if ($stockAmount <= $totalItem)
                    {
                        $request->merge(['quantity'=>$totalItem]);
                    }
                }
            }
        }

        $this->validate($request,[
            'quantity' => "required|numeric|min:1|max:$stockAmount",
        ],[
            'quantity.max'=>'The quantity cannot be greater than '.$stockAmount.'.'
        ]);

        Cart::add([
            'id'        => $this->product->id,
            'name'      => $this->product->name,
            'qty'       => $request->quantity,
            'price'     => $this->product->selling_price,
            'options'   => [
                'image'     => $this->product->image,
                'category'  => $this->product->category->name,
                'slug'      => $this->product->slug,
                'stock'     => $this->product->stock_amount,
            ]
        ]);

        return redirect()->route('cart');
    }

    public function update(Request $request, $id)
    {
        $this->product = Product::find($request->product_id);
        $stockAmount = $this->product->stock_amount;

        if (Cart::count() > 0)
        {
            foreach (Cart::content() as $cartProduct)
            {
                if ($cartProduct->id == $id)
                {
                    $totalItem = ($cartProduct->qty + $request->quantity);
                    if ($stockAmount <= $totalItem)
                    {
                        $request->merge(['quantity'=>$totalItem]);
                    }
                }
            }
        }

        $this->validate($request,[
            'quantity' => "required|numeric|min:1|max:$stockAmount",
        ],[
            'quantity.max'=>'The quantity cannot be greater than '.$stockAmount.'.'
        ]);

        Cart::update($id,$request->quantity);

        return back()->with('message', 'Your cart has been updated successfully.');
    }

    public function delete($id)
    {
        Cart::remove($id);
        return back()->with('message','Your selected item has been removed from your cart.');
    }
}
