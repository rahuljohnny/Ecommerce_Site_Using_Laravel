<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $categories = Category::all()->groupBy('parent_id');
        $categories['root'] = $categories[0];
        unset($categories[0]);

        return view('front.home',compact('products','categories'));
    }
    public function shirts()
    {
        $shirts = Product::all();
        //$url = Storage::url('')
        return view('front.shirts',compact('shirts'));
    }
    public function shirt(Product $shirt)
    {
        return view('front.shirt',compact('shirt'));
    }

    public function test()
    {
        $shirts = Product::all();
        return view('front.test',compact('shirts'));
    }
}
