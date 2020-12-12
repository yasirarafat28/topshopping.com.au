<?php

namespace App\Http\Controllers;

use App\Sliders;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = Sliders::all();
        return view('admin/sliders/index',compact('sliders'));
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
        //


        $this->validate($request, [
            'image' => 'required',
        ]);
        $slider = new Sliders();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->link = $request->link;
        $slider->link_text = $request->link_text;
        $slider->status = 'active';

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $imageName  = 'sliders'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/sliders/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;

            $slider->image = $imageUrl;
        }

        $slider->save();
        return back()->withSuccess('Slider Successfully Added!');

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
        //
        $slider = Sliders::find($id);
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->link = $request->link;
        $slider->link_text = $request->link_text;
        $slider->status = 'active';

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $imageName  = 'sliders'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/sliders/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;

            $slider->image = $imageUrl;
        }

        $slider->save();
        return back()->withSuccess('Slider Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Sliders::destroy($id);
        return back()->withSuccess('Slider Successfully Deleted!');

    }
}
