<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\SellTransaction;
use Image;
use App\Http\Controllers\TransactionController;
use Session;
use App\Mail\GameUploaded;
use Illuminate\Support\Facades\Mail;
use App\Mail\GameApproved;
use App\Customer;
use Illuminate\Support\Facades\DB;

class SellTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      //Validation
      $this -> validate($request, array(
          'title' => 'required',
          'platform' => 'required',
          'genre' => 'required',
          'min_rate' => 'required',
          'max_rate' => 'required',
          'img_path' => 'required|mimes:jpeg,jpg,png|max:200'
          ));

        $customer = Auth::guard('customer')->user();
        $upload = new SellTransaction;

        $upload->title = $request->title;
        $upload->platform = $request->platform;
        $upload->genre = $request->genre;
        $upload->min_rate = $request->min_rate;
        $upload->max_rate = $request->max_rate;

        //Save Image
        if ($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $file_name = $request->title . '.' . $image->getClientOriginalExtension();

            $location = public_path('images/uploads/'.$upload->platform.'/'.$file_name);
            $upload->img_path = '/images/uploads/'.$upload->platform.'/'.$file_name;

            Image::make($image)->resize(426, 590)->save($location);
        }

        $upload->customer_id = $customer->id;

        $tr = new TransactionController;

        $upload->transaction_id = $tr->uploadTransaction();
        $upload->key = 1;
        $upload->status = 'Awaiting Collection';

        $upload->save();

        Mail::to($customer->email)->send(new GameUploaded($upload, $customer));

        Session::flash('success', 'Game Uploaded Successfully!');
        return redirect()->action('PageController@getIndex');
    }

    public function updateSellTrans($id, $customer)
    {
      $st = SellTransaction::find($id);
      $st->key = 2;
      $st->status = "Pending Purchase";
      $st->save();

      Mail::to($customer->email)->send(new GameApproved($st, $customer));

      // Redirect with flash message
      Session::flash('success', 'Product Quantity Updated');
      return redirect()->action('LGXAdminController@getDashboard');

    }

    public function approveNew($product_id)
    {
      $sell_id = DB::table('selltemps')->max('sell_id');
      $stc = SellTransaction::find($sell_id);
      $stc->product_id = $product_id;
      $stc->key = 2;
      $stc->status = "Pending Purchase";
      $stc->save();

      $customer = Customer::find($stc->customer_id);

      Mail::to($customer->email)->send(new GameApproved($stc, $customer));

      DB::table('selltemps')->truncate();

      Session::flash('success', 'New Product Added Successfully!');
      return redirect()->action('LGXAdminController@getDashboard');
    }

    public function uploadRef()
    {
      $customer = Auth::guard('customer')->user();
      $k1 = substr($customer->first_name, -2);
      $k2 = substr($customer->last_name, -2);

      $numbers = range(0,9);
      shuffle($numbers);
      $digits= '';
      for($i = 0;$i < 7;$i++)
      {
         $digits .= $numbers[$i];
      }
       $uplRef = $k1.$digits.$k2.'upl';
       return $uplRef;
    }
}
