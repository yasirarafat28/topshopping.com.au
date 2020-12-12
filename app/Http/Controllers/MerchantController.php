<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class MerchantController extends Controller
{
    //
    public function index()
    {
        //

        $merchants = User::where('type','merchant')->get();
        return view('admin/merchant/index',compact('merchants'));
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

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|min:11|numeric',

            'url' => 'required',
        ]);

        if ($request->password) {
            $password = $request->password;
        }
        else{
            $password = '12345678';
        }

        $role='merchant';
        $merchant = new User();
        $merchant->name = $request->name;
        $merchant->phone = $request->phone;
        $merchant->email = $request->email;
        $merchant->zipcode = $request->zipcode;
        $merchant->url = $request->url;
        $merchant->city = $request->city;
        $merchant->state = $request->state;
        $merchant->country = $request->country;
        $merchant->street = $request->street;
        $merchant->comment = $request->comment;
        $merchant->status = 'pending';
        $merchant->type = 'merchant';

        if ($request->hasFile('logo')) {
            $image      = $request->file('logo');
            $imageName  = 'merchant_logo'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/merchant_logo/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;

            $merchant->logo = $imageUrl;
        }


        if ($password){
            $merchant->password = Hash::make($password);

        }

        $merchant->save();


        $merchant->assignRole($role);


        return back()->withSuccess('Merchant Successfully Added!');
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

        if ($request->password) {
            $password = $request->password;
        }
        else{
            $password = '12345678';
        }

        $role = 'merchant';

        $merchant = User::find($id);
        $merchant->merchantID = uniqid();
        $merchant->name = $request->name;
        $merchant->phone = $request->phone;
        $merchant->email = $request->email;
        $merchant->zipcode = $request->zipcode;
        $merchant->url = $request->url;
        $merchant->city = $request->city;
        $merchant->state = $request->state;
        $merchant->country = $request->country;
        $merchant->street = $request->street;
        $merchant->comment = $request->comment;
        $merchant->status = $request->status;
        $merchant->type = 'merchant';

        if ($request->hasFile('logo')) {
            $image      = $request->file('logo');
            $imageName  = 'merchant_logo'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/merchant_logo/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;

            $merchant->logo = $imageUrl;
        }


        if ($password){
            $merchant->password = Hash::make($password);

        }

        $merchant->save();


        $merchant->assignRole($role);

        return back()->withSuccess('Merchants Successfully Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return back()->withSuccess('Merchants Successfully Deleted!');
    }


    public function account()
    {
        return view('front.merchant-account');
    }

    public function SelfEdit()
    {
        $item = Auth::user();
        return view('front.merchant-edit',compact('item'));
    }
    public function SelfEditSubmit(Request $request)
    {
        $id = $request->id;
        $role = 'merchant';

        $merchant = User::find($id);
        $merchant->merchantID = uniqid();
        $merchant->name = $request->name;
        $merchant->phone = $request->phone;
        $merchant->email = $request->email;
        $merchant->zipcode = $request->zipcode;
        $merchant->url = $request->url;
        $merchant->city = $request->city;
        $merchant->state = $request->state;
        $merchant->country = $request->country;
        $merchant->street = $request->street;
        $merchant->comment = $request->comment;
        $merchant->type = 'merchant';

        if ($request->hasFile('logo')) {
            $image      = $request->file('logo');
            $imageName  = 'merchant_logo'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/merchant_logo/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;

            $merchant->logo = $imageUrl;
        }

        $merchant->save();
        return back()->withSuccess('Merchants Successfully Updated!');
    }

    public function products()
    {

        $products =Product::where('merchant_id',Auth::user()->id)->orderby('created_at','DESC')->paginate(5);
        return view('front.merchant-products',compact('products'));

    }


}
