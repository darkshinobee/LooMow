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
}
