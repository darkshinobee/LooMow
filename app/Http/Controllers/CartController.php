<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use App\SellTransaction;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Customer;
use Auth;

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

  public function checkout()
  {
    $customer = Auth::guard('customer')->user();
    $buyCartItems = Cart::instance('buyCart')->content();
    $delivery_charge = 2000;
    return view('cart.checkout', compact('buyCartItems', 'delivery_charge', 'voucher_value', 'customer'));
  }

  public function viewBuyCart()
  {
    $item = Auth::guard('customer')->user();
    $buyCartItems = Cart::instance('buyCart')->content();
    $delivery_charge = 2000;
    return view('cart.viewBuy', compact('buyCartItems', 'delivery_charge', 'item'));
  }

  public function removeBuy($id)
  {
    Cart::instance('buyCart')->remove($id);
    return back();
  }

  public function addBuyCart($p_id, $s_id)
  {
    $cart_ids = Cart::instance('buyCart')->content()->pluck('id');
    $cart_ids = $cart_ids->toArray();

    if (!in_array($p_id, $cart_ids)) {

      $productBuy = Product::find($p_id);
      $st = SellTransaction::find($s_id);

      Cart::instance('buyCart')->add(['id' => $p_id, 'name' => $productBuy->title, 'qty' => 1,
      'price' => $st->price,
      'options' => ['platform' => $productBuy->platform,
      'developer' => $productBuy->developer,
      'genre' => $productBuy->genre,
      'quantity' => $productBuy->quantity,
      'image_name' => $productBuy->image_name]]);
    }
    return back();
  }

  public function updateBuy(Request $request, $id)
  {
    Cart::instance('buyCart')->update($id, $request->qty);
    return back();
  }
}
