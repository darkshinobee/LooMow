<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellTransaction;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellTransactionController;
use Session;
use App\Product;

class LGXAdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('admin');
  }
    public function getDashboard()
    {
      return view('admin.dashboard');
    }

    public function addProduct()
    {
        return view('products.create');
    }

    public function tempUploads()
    {
      $temps = SellTransaction::orderby('created_at', 'desc')->paginate(3);
      // $posts = Post::orderby('id', 'desc')->paginate(5);
      return view('admin.uploaded_games', compact('temps'));
    }

    public function approve($id)
    {
      $st = SellTransaction::find($id);
      $stc = new SellTransactionController;
      $p = new ProductController;

      if ($st->product_id == null) {
        return $this->addProduct();
      }else {
        $pr = Product::find($st->product_id);
        $pr->quantity += 1;
        $pr->save();
        return $stc->updateSellTrans($id);
      }
    }

    public function disApprove($id)
    {
        $st = SellTransaction::find($id);
        $st->key = 0;
        $st->status = 'Disapproved';
        $st->save();

        Session::flash('success', 'Product Disapproved');
        return redirect()->action('LGXAdminController@getDashboard');
    }
}
