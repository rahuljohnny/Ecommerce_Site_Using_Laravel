<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    public function index()
    {
        $shirts = Product::all();
        return view('front.home',compact('shirts'));
    }
    public function shirts()
    {
        $shirts = Product::all();
        //$url = Storage::url('')
        return view('front.shirts',compact('shirts'));
    }
    public function shirt()
    {
        return view('front.shirt');
    }

    public function test()
    {
        $shirts = Product::all();
        return view('front.test',compact('shirts'));
    }
}
