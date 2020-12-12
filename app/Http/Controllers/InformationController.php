<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class InformationController extends Controller
{
    //

    public function information($type)
    {
        $content = Content::where('type',$type)->first();

        if ($type =='contact') {
            return view('front.contact',compact('content'));
        }else{
            return view('front.information',compact('content'));
        }
    }
}
