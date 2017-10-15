<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories=Category::all()->groupBy('parent_id');
        $categories['root']=$categories[0];

        unset($categories[0]);
        return view('admin.category.index',compact(['categories','products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$formInput2 = $request->all();

        $cat = new \App\Category;
        $cat->name = request('name');
        $cat->parent_id = request('parent_id');

        $cat->save();

        //Category::create($request->all()); //It will save all the Categories but not working in that case
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Category::find($id)->products;
        $categories = Category::all();
        return view('admin.category.index',compact(['categories','products']));
    }

    public function showIndividualProduct($id)
    {
        //$products = Category::find($id)->products;
        $category = Category::find($id);
        //$products = $category->id->products;


        $categorizedProductsName = \DB::table('products')->where('category_id', $id)->pluck('name');
        //$titles = DB::table('roles')->pluck('title');




        //echo $productsName->name;

        return view('admin.category.selectedProduct',compact(['category','categorizedProductsName']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
