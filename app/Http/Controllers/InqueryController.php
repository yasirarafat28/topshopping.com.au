<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquery;
use App\Mail\InquirySubmit;
use Illuminate\Support\Facades\Mail;

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

        // Mail::to('topshopping.com.au@gmail.com')->send(new InquirySubmit($inquery));
        //Mail::to('yasirarfat1995@gmail.com')->send(new InquirySubmit($inquery));

        return back()->withSuccess('Thanks for submitting Inquery!');

    }
}
