<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Validator;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Transaction;
use Illuminate\Foundation\Auth\RegistersUsers;

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

            //Redirection
        // return redirect()->route('cart.checkout', $customer->id);
        // return redirect()->action(
        //     'CartController@checkout', ['id' => $customer->id]
        //     );
        return back();
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
