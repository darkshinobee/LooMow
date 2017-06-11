<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Blog;
use Session;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function store(Request $request, $product_id)
    {
        $this->validate($request, array(
            'name' => 'required|min:5|max:255',
            'body' => 'required|min:5|max:2000'));

        $product = Product::find($product_id);

        $blog = new Blog();

        $blog->name = $request->name;
        $blog->body = $request->body;
        $blog->product_id = $product_id;

        $blog->save();

        $slug = DB::table('products')->where('id', $product_id)->value('slug');

        Session::flash('success', 'Your Review Has Been Posted!');
        return redirect()->route('products.show', [$slug]);
    }
}
