<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquery;

class InqueryController extends Controller
{
    //
    public function index()
    {
        $inqueries = Inquery::orderBy('id','DESC')->get();
        return view('admin.inquery.index',compact('inqueries'));
    }

    public function submit(Request $request)
    {
        $inquery = new Inquery();
        $inquery->name = $request->name;
        $inquery->email = $request->email;
        $inquery->subject = '';
        $inquery->message = $request->message;
        $inquery->save();

        return back()->withSuccess('Thanks for submitting Inquery!');

    }
}
