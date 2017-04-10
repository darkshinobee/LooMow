<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Customer;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('customer');
    }

    public function index()
    {

    }

    public function viewBuyCart()
    {
        $buyCartItems = Cart::instance('buyCart')->content();
        return view('cart.viewBuy', compact('buyCartItems'));
    }

    public function viewSellCart()
    {
        $sellCartItems = Cart::instance('sellCart')->content();
        return view('cart.viewSell', compact('sellCartItems'));
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
        //
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

    }

    public function removeBuy($id)
    {
        Cart::instance('buyCart')->remove($id);
        return back();
    }

    public function removeSell($id)
    {
        Cart::instance('sellCart')->remove($id);
        return back();
    }

    public function addBuyCart($id)
    {
        $productBuy = Product::find($id);

        // if ($productBuy->quantity > Cart::instance('buyCart')->count()) {

        Cart::instance('buyCart')->add(['id' => $id, 'name' => $productBuy->title, 'qty' => 1,
            'price' => $productBuy->sell_rate,
            'options' => ['platform' => $productBuy->platform,
            'developer' => $productBuy->developer,
            'genre' => $productBuy->genre,
            'quantity' => $productBuy->quantity,
            'image_name' => $productBuy->image_name]]);
    // }
        return back();
    }

    public function addSellCart($id)
    {
        $productSell = Product::find($id);

        if ($productSell->quantity > Cart::instance('sellCart')->count()) {

        Cart::instance('sellCart')->add(['id' => $id, 'name' => $productSell->title, 'qty' => 1,
            'price' => $productSell->buy_rate,
            'options' => ['platform' => $productSell->platform,
            'developer' => $productSell->developer,
            'genre' => $productSell->genre,
            'quantity' => $productSell->quantity,
            'image_name' => $productSell->image_name]]);
    }
        return back();
    }

    public function updateBuy(Request $request, $id)
    {
        Cart::instance('buyCart')->update($id, $request->qty);
        return back();
    }

    public function updateSell(Request $request, $id)
    {
        Cart::instance('sellCart')->update($id, $request->qty);
        return back();
    }
}
