<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class EcomController extends Controller
{
    public function index()
    {
        return view('ecom.home.index',[
            'trendingProducts'=>Product::where('featured_status','1')->orderBy('name','asc')->take(4)->get(),
            'featuredProduct'=>Product::where('featured_status','1')->latest()->first(),
            'carouselProducts'=>Product::where('carousel_status','1')->latest()->take(2)->get(),
            'featuredCategories' => Category::where('featured_status','1')->latest()->orderBy('name','asc')->take(5)->get()
        ]);
    }

    public function category($slug)
    {
        return view('ecom.category.index',['productCategory' => Category::with('products')->where('slug',$slug)->first()]);
    }

    public function subcategory($slug)
    {
        return view('ecom.category.index',['productCategory' => Subcategory::with('products')->where('slug',$slug)->first()]);
    }

    public function shop()
    {
        return view('ecom.shop.index',['allProducts' => Product::where('status','1')->orderBy('name','asc')->get()]);
    }

    public function productDetail($slug)
    {
        return view('ecom.product.detail.index', ['product'=>Product::where('slug',$slug)->first()]);
    }
}
