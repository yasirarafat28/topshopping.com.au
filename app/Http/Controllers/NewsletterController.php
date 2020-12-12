<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;

class NewsletterController extends Controller
{
    //
    public function submit(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|unique:users',
        ]);


        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
        $newsletter->status = 'active';
        $newsletter->save();

        return back()->withSuccess('Thanks for Subscribing!');
    }
}
