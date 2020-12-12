<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keywords;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $keywords = Keywords::orderby('updated_at','DESC')->get();

        return view('admin.keywords.index',compact('keywords'));
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

        $keyword = new Keywords();
        $keyword->keyword = $request->keyword;
        $keyword->high_price = $request->high_price;
        $keyword->low_price = $request->low_price;
        $keyword->meta_title = $request->meta_title;
        $keyword->meta_description = $request->meta_description;
        $keyword->negative_keyword = $request->negative_keyword;
        $keyword->relative_keyword = $request->relative_keyword;
        $keyword->status='active';
        $keyword->save();

        return back()->withSuccess('Keyword Added Successfully');
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


        $keyword = Keywords::find($id);
        $keyword->keyword = $request->keyword;
        $keyword->high_price = $request->high_price;
        $keyword->low_price = $request->low_price;
        $keyword->meta_title = $request->meta_title;
        $keyword->meta_description = $request->meta_description;
        $keyword->negative_keyword = $request->negative_keyword;
        $keyword->relative_keyword = $request->relative_keyword;
        $keyword->status='active';
        $keyword->save();

        return back()->withSuccess('Keyword Updated Successfully');
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
        Keywords::destroy($id);
    }
}
