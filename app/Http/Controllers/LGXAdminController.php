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

    public function viewDisapproved()
    {
      $temps = SellTransaction::orderby('created_at', 'desc')
      ->where('key', 0)
      ->paginate(3);
      return view('admin.disapproved_games', compact('temps'));
    }

    public function tempUploads()
    {
      $temps = SellTransaction::orderby('created_at', 'desc')
      ->where('key', 1)
      ->paginate(3);
      return view('admin.uploaded_games', compact('temps'));
    }

    public function viewPendingPurchase()
    {
      $temps = SellTransaction::orderby('created_at', 'desc')
      ->where('key', 2)
      ->paginate(3);
      return view('admin.pendingPurchase_games', compact('temps'));
    }

    public function gamesSold()
    {
      $temps = SellTransaction::orderby('created_at', 'desc')
      ->where('key', 3)
      ->paginate(3);
      return view('admin.sold_games', compact('temps'));
    }

    public function approve($id)
    {
      $st = SellTransaction::find($id);
      $stc = new SellTransactionController;
      $p = new ProductController;

      if ($st->product_id == null) {
        $max_id = DB::table('products')->max('id');
        $st->product_id = $max_id + 1;
        $st->key = 2;
        $st->status = "Pending Purchase";
        $st->save();
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
