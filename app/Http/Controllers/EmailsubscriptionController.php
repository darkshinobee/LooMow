<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emailsubscription;
use Session;
use Illuminate\Support\Facades\DB;
use Auth;

class EmailsubscriptionController extends Controller
{
  public function store(Request $request)
  {
    if (Auth::guard('customer')->check())
    {
      $this->validate($request, ['email' => 'required|email']);

      $mail_list0 = DB::table('emailsubscriptions')->where('key', 0)->pluck('email');
      $mail_list0 = $mail_list0->toArray();

      $mail_list1 = DB::table('emailsubscriptions')->where('key', 1)->pluck('email');
      $mail_list1 = $mail_list1->toArray();
      if (in_array($request->email, $mail_list1))
      {
        return $this->mail_exists();
      }
      elseif (in_array($request->email, $mail_list0))
      {
        DB::table('emailsubscriptions')
        ->where('email', $request->email)
        ->update([
          'key' => 1,
          'status' => 'Subscribed']);
        }
        else
        {
          $sub = new Emailsubscription;
          $sub->email = $request->email;
          $sub->key = 1;
          $sub->status = 'Subscribed';
          $sub->save();
        }
        // Redirect with flash message
        Session::flash('success', 'Subscribed To Mailing List');
        return back();
      }else{
        Session::flash('success', 'Login To Subscribe');
        return view('pages.login');
      }

    }

    public function update(Request $request)
    {
      DB::table('emailsubscriptions')
      ->where('email', $request->email)
      ->update([
        'key' => 0,
        'status' => 'Unsubscribed']);

        // Redirect with flash message
        Session::flash('success', 'Unsubscribed From Mailing List');
        return back();
      }

      public function mail_exists()
      {
        Session::flash('success', 'You Are Already Subscribed To The Mailing List');
        return back();
      }

    }
