<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellTransaction;
use App\ProductTransaction;
use App\Selltemp;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellTransactionController;
use Session;
use App\Product;
use App\Customer;
use App\Mail\DeliveryConfirmation;
use App\Mail\GameApproved;
use App\Mail\GameDisapproved;
use App\Mail\GameReturn;
use Illuminate\Support\Facades\Mail;

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

  public function failed_transactions()
  {
    $p = 'products';
    $pt = 'product_transactions';
    $t = 'transactions';

    $temps = DB::table($p)->select($t.'.reference_no', $pt.'.status', $pt.'.price',
    $pt.'.quantity', $pt.'.updated_at', $p.'.title', $p.'.platform', $p.'.image_path')
    ->join($pt, $p.'.id', '=', $pt.'.product_id')
    ->join($t, $pt.'.transaction_id', '=', $t.'.id')
    ->where($pt.'.key', 0)
    ->orderBy($t.'.created_at', 'desc')
    ->paginate(5);

    return view('admin.failed_transactions', compact('temps'));
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

  public function gamesDelivered()
  {
    $p = 'products';
    $pt = 'product_transactions';
    $t = 'transactions';

    $temps = DB::table($p)->select($t.'.reference_no', $pt.'.status', $pt.'.price',
    $pt.'.quantity', $pt.'.updated_at', $p.'.title', $p.'.platform', $p.'.image_path')
    ->join($pt, $p.'.id', '=', $pt.'.product_id')
    ->join($t, $pt.'.transaction_id', '=', $t.'.id')
    ->where($pt.'.key', 2)
    ->orderBy($t.'.created_at', 'desc')
    ->paginate(5);

    return view('admin.games_delivered', compact('temps'));
  }

  public function approve($id)
  {
    $st = SellTransaction::find($id);
    $customer = Customer::find($st->customer_id);
    $stc = new SellTransactionController;

    if ($st->product_id == null) {
      $selltemp = New Selltemp;
      $selltemp->sell_id = $id;
      $selltemp->save();

      return $this->addProduct();

    }else {
      $pr = Product::find($st->product_id);
      $pr->quantity += 1;
      $pr->save();

      return $stc->updateSellTrans($id, $customer);
    }
  }

  public function disApprove($id)
  {
    $st = SellTransaction::find($id);
    $st->key = 0;
    $st->status = 'Disapproved';
    $st->save();

    $customer = Customer::find($st->customer_id);

    Mail::to($customer->email)->send(new GameDisapproved($st, $customer));
    Mail::to('returns@loomow.com')->send(new GameReturn($st, $customer));

    Session::flash('success', 'Product Disapproved');
    return redirect()->action('LGXAdminController@getDashboard');
  }

  public function admin_search(Request $request)
  {
    $results = DB::table('products')
    ->where('title', 'like', '%'.$request->keyword.'%')
    ->paginate(5);
    return view('admin.search_results', compact('results'));
  }

  public function search_refno(Request $request)
  {
    $p = 'products';
    $pt = 'product_transactions';
    $t = 'transactions';

    $results = DB::table($p)->select($t.'.reference_no', $t.'.id', $pt.'.status', $pt.'.price',
    $pt.'.quantity', $pt.'.updated_at', $p.'.title', $p.'.platform', $p.'.image_path')
    ->join($pt, $p.'.id', '=', $pt.'.product_id')
    ->join($t, $pt.'.transaction_id', '=', $t.'.id')
    ->where($t.'.reference_no', $request->refno)
    ->where($pt.'.key', 1)
    ->orderBy($t.'.created_at', 'desc')
    ->get();

    return view('admin.refno_results', compact('results'));
  }

  public function update_delivered($tr_id)
  {
    DB::table('product_transactions')
    ->where('transaction_id', $tr_id)
    ->update([
      'key' => 2,
      'status' => 'Delivered'
    ]);

    $tr = DB::table('transactions')
    ->where('id', $tr_id)
    ->first();

    $p = 'products';
    $pt = 'product_transactions';
    $t = 'transactions';

    $p_obj = DB::table($p)->select($pt.'.price', $pt.'.quantity', $p.'.title', $p.'.platform')
    ->join($pt, $p.'.id', '=', $pt.'.product_id')
    ->join($t, $pt.'.transaction_id', '=', $t.'.id')
    ->where($t.'.reference_no', $tr->reference_no)
    ->where($pt.'.key', 2)
    ->where($t.'.customer_id', $tr->customer_id)
    ->get();

    $customer = DB::table('customers')->where('id', $tr->customer_id)->first();

    // send delivery report
    Mail::to($customer->email)->send(new DeliveryConfirmation($p_obj, $customer, $tr->reference_no));

    return redirect()->action('LGXAdminController@gamesDelivered');
  }

  public function id_update(Request $request, $id)
  {
    $st = SellTransaction::find($id);
    $st->product_id = $request->id;
    $st->save();
    return back();
  }
}
