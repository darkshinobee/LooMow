<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use Auth;
use Illuminate\Support\Facades\DB;

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

  public function contact_us(Request $request)
  {
    Mail::to('help@loomow.com')->send(new ContactUs($request));

    // Redirect with flash message
    Session::flash('success', 'Message Sent');
    return $this->getIndex();
  }

  public function getAccount()
  {
    $customer = Auth::guard('customer')->user();
    $mail_list = DB::table('emailsubscriptions')
    ->where('key', 1)
    ->pluck('email');
    $mail_list = $mail_list->toArray();
    return view('customer.account', compact('customer', 'mail_list'));
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

  public function search(Request $request)
  {
    if ($request->has('query')) {
      $q = $request->input("query");
      $query = DB::table('products')->select('title', 'platform', 'image_name', 'image_path', 'slug')
      ->where('title', 'like', '%'.$q.'%')
      ->orWhere('platform', 'like', '%'.$q.'%')
      ->orWhere('genre', 'like', '%'.$q.'%')
      ->get();
      if ($query->Count()) {
        return $query;
      }else {
        return "no match";
      }
      }
      return "empty";
    }
  }
