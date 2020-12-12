<?php

namespace App\Http\Controllers;

use App\Redirect;
use Illuminate\Http\Request;
use App\Product;

class RedirectController extends Controller
{
    //

    public function index()
    {

        $records = Redirect::with('product','merchant')->orderBy('id','DESC')->get();
        return view('admin.redirection.index',compact('records'));
    }

    public function redirect(Request $request)
    {
        $product_id = $request->product_id;
        $ip = $request->ip;
        $product = Product::find($product_id);

        $record = new Redirect();
        $record->product_id = $product->id;
        $record->merchant_id = $product->merchant_id;
        $record->ip = $ip;
        $record->redirect_to = $product->url;
        $record->save();


        return $product->url;
    }
}
