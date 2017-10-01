<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //showing all the products
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $this->validate(request(),[ //It validates if title and body is set properly
            'name' => 'required',
            'size' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:20000',
            //'user_id' => auth()->id()

        ]);




        //Server side validation


        //Save it to the database

        //dd(request(['name','description','category_id']));

        /*
        $product = new \App\Product;
        $product->name = request('name');
        $product->description = request('description');
        $product->size = request('size');
        $product->image = request('image');
        $product->category_id = request('category_id');
        $product->save();
        */
        //dd('name','description','category_id');


        //flash('Your messages are here!!');


        //$formInput = $request->except('image');

        $formInput = $request->all();

        //$image = $request->file('image');



        if($request->hasFile('image'))
        {

            $request->file('image'); //It works!!!
            $fileName = $request->image->getClientOriginalName();
            $request->image->storeAs('public/images',$fileName);

            $formInput['image'] = $fileName;
            $id = \DB::table('categories')->where('name', $formInput['category_id'])->value('id');
            $formInput['category_id'] = $id;


            //dd(Storage::url($fileName));


            //get path and extension:
            //$request->image->path();
            //$request->image->extension();
            //Getting the original image name
            //dd($image);

            //$image->store('public/images');
            //$imageName = $formInput['image']->getClientOriginalName();
            //Moving the image to images directory
            //return $request->image->storeAs('images',$imageName);

            //Image::make($image->getRealPath())->save('public/images'.$imageName);
        }
        else{
            return 'No file selected!';
        }

        Product::create($formInput); //It will save all the products

        session()->flash( //The js is not working as I...
            'message','Post is published!!'
        );
        //Then redirect to the index of admin
        //return redirect('admin.index');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
