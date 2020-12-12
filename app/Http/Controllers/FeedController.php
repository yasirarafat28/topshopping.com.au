<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

class FeedController extends Controller
{
    //

    public function index()
    {
        $merchants = User::where('type','merchant')->where('status','active')->get();
        return view('admin.feed.create',compact('merchants'));
    }

    public function insert()
    {
        $merchants = User::where('type','merchant')->where('status','active')->get();
        return view('admin.feed.create',compact('merchants'));
    }


    public function Submit(Request $request){

        $this->validate($request, [
            'merchant_id' => 'required',
            'mode' => 'required',
        ]);

        $merchant_id = $request->merchant_id;
        $upload_mode = $request->mode;

        if ($upload_mode=='replace')
        {
            Product::where('merchant_id',$merchant_id)->delete();
        }

        //clean
        Product::where('merchant_id',0)->delete();

        if ($request->hasFile('feed'))
        {
            $text_data =   file_get_contents($request->feed);
            //echo "<pre>";
            $products = json_decode($text_data);
            $count=0;
            foreach ($products as $key => $item) {

                $product = new Product();
                $product->ref = uniqid();
                $product->merchant_id = $merchant_id;
                $product->status = 'active';

                $product->title = $item->Name;
                $product->url = $item->Url;
                $product->description = $item->Description;
                $product->image = $item->Image;
                $product->price = filter_var( $item->Price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
                //$product->save();
                if ($product->save()) {
                    $count++;
                }


                
            }



        }
        return back()->withSuccess('Feed Successfully Updated! Total '.$count.' Product Updated!');

    }
}
