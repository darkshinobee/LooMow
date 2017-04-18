<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Validator;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Transaction;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;

class MiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //Validation
        $this->validate($request, array(

            'phone' => 'required',
            'address' => 'required',
            'state' => 'required',
            'region' => 'required'
            ));

        //Get edit id and store in a variable
        $customer = Customer::find($id);

        //Retrieve values and store in DB
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->landmark = $request->input('landmark');
        $customer->state = $request->input('state');
        $customer->region = $request->input('region');

        //Save changes
        $customer->save();

        //Set flash message
        Session::flash('success', 'Details Updated!');
        return back();
    }

    public function updateDetails(Request $request, $id)
    {
        //Validation
        $this->validate($request, array(

            'address' => 'required',
            'state' => 'required',
            'region' => 'required'
            ));

        //Get edit id and store in a variable
        $customer = Customer::find($id);

        //Retrieve values and store in DB
        $customer->address = $request->input('address');
        $customer->landmark = $request->input('landmark');
        $customer->state = $request->input('state');
        $customer->region = $request->input('region');

        //Save changes
        $customer->save();

        //Set flash message
        Session::flash('success', 'Details Updated!');
        return back();
    }

    public function updateInfo(Request $request, $id)
    {
        //Validation
        $this->validate($request, array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
            ));

        //Get edit id and store in a variable
        $customer = Customer::find($id);

        //Retrieve values and store in DB
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');

        //Save changes
        $customer->save();

        //Set flash message
        Session::flash('success', 'Details Updated!');
        return back();
    }

    public function voucherUpdate($voucher_value) {

      $customer = Auth::guard('customer')->user();
      $cust_obj = Customer::find($customer->id);

      $cust_obj->voucher_value = $voucher_value;

      $cust_obj->save();
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
