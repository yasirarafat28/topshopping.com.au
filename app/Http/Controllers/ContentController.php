<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Content;

class ContentController extends Controller
{
    //

    public function index($type)
    {
        //

        $content = Content::where('type',$type)->first();

        return view('admin.content.index',compact('content','type'));
    }

    public function store(Request $request)
    {
        //

        $type = $request->type;
        $description = $request->description;
        $title = $request->title;

        $content = Content::where('type',$type)->first();
        if ($content) {

            $content->title =  $title;
            $content->description =  $description;
            $content->status =  'active';
            $content->save();
        }
        else{
            $content =  new Content;
            $content->title =  $title;
            $content->description =  $description;
            $content->type =  $type;
            $content->status =  'active';
            $content->save();
        }

        return back()->withSuccess('Content Added Successfully!');
    }
}
