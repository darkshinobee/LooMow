<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
    	return view('welcome');
    }

    public function getAbout()
    {
    	return view('pages.about');
    }

    public function getContact()
    {
    	return view('pages.contact');
    }

    public function getT1()
    {
    	return view('test');
    }

    public function getT2()
    {
    	return view('test2');
    }
}
