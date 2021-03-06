<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Image;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadGame()
    {
        return view('products.game_upload');
    }

    public function getCart()
    {
        return view('products.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('products.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this -> validate($request, array(
            'title' => 'required',
            'platform' => 'required',
            'developer' => 'required',
            'genre' => 'required',
            'quantity' => 'required',
            'image_name' => 'required',
            'release_date' => 'required',
            'sell_rate' => 'required',
            'buy_rate' => 'required'
            ));

        //Store to DB
        $product = new Product;

        $product->title = $request->title;
        $product->platform = $request->platform;
        $product->developer = $request->developer;
        $product->genre = $request->genre;
        $product->quantity = $request->quantity;

        //Save Image
        if ($request->hasFile('image_location')) {
            $image = $request->file('image_location');
            $file_name = $request->image_name . '.' . $image->getClientOriginalExtension();

            $product->image_name = $file_name;

            $location = public_path('images/'.$product->platform.'/'.$file_name);
            $product->image_path = '/images/'.$product->platform.'/'.$file_name;

            Image::make($image)->resize(426, 590)->save($location);
        }

        $product->release_date = $request->release_date;
        $product->sell_rate = $request->sell_rate;
        $product->buy_rate = $request->buy_rate;

        //Save
        if ($product->save()) {
            //Redirect with flash message
            Session::flash('success', 'New Product Added Successfully!');
            return redirect()->route('products.show', $product->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->withProduct($product);
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
