<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;

class PageController extends Controller
{

  public function __construct()
  {
    $this->middleware('guest');
  }

  public function getIndex()
  {
    $products = Product::orderby('id', 'desc')->paginate(6);
    return view('welcome')->withProducts($products);
  }

  public function getAbout()
  {
    return view('pages.about');
  }

  public function getContact()
  {
    return view('pages.contact');
  }

  public function getAccount()
  {
    return view('customer.account');
  }

  public function login()
  {
    return view('pages.login');
  }

  public function register()
  {
    return view('pages.register');
  }

  public function getSortedGames($platform)
  {
    $products = Product::orderby('id', 'desc')->where('platform', $platform)->paginate(6);
    return view('pages.sorted_games', compact('products', 'platform'));
  }
}
