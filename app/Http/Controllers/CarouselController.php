<?php

namespace App\Http\Controllers;

use App\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carousels = Carousel::all();
        return view('admin/carousels/index',compact('carousels'));
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
            'keyword' => 'required',
        ]);

        $slider = new Carousel();
        $slider->keyword = $request->keyword;
        $slider->type = $request->type;
        $slider->page = $request->page;
        $slider->quantity = $request->quantity;
        $slider->sort_order = $request->sort_order;
        $slider->overview = $request->overview;
        $slider->status = 'active';
        $slider->save();

        return back()->withSuccess('Carousel Successfully Added!');
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
        $this->validate($request, [
            'keyword' => 'required',
        ]);

        $slider = Carousel::find($id);
        $slider->keyword = $request->keyword;
        $slider->type = $request->type;
        $slider->page = $request->page;
        $slider->quantity = $request->quantity;
        $slider->sort_order = $request->sort_order;
        $slider->overview = $request->overview;
        $slider->status = 'active';
        $slider->save();

        return back()->withSuccess('Carousel Successfully Updated!');
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
        Carousel::destroy($id);
        return back()->withSuccess('Carousel Successfully Deleted!');
    }
}
