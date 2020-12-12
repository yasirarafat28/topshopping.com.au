<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function CategoryIndex($type,$level,$parent_id=0)
    {
        //

        if ($level=='l1') {
            $level = 1;
        }elseif ($level=='l2') {
            $level = 2;
        }elseif ($level=='l3') {
            $level = 3;
        }


        if (!$parent_id){
            $categories = Category::where('level',$level)->where('type',$type)->orderBy('id','DESC')->get();
        }
        else{
            $categories = Category::where('level',$level)->where('type',$type)->where('parent_id',$parent_id)->orderBy('id','DESC')->get();
        }

        if ($level==2)
        {
            $parent_categories = Category::where('level',$level)->where('type',$type)->orderBy('id','DESC')->get();
        }elseif ($level==3)
        {
            $parent_categories = Category::where('level',$level)->where('type',$type)->orderBy('id','DESC')->get();
        }
        else
        {
            $parent_categories = array();
        }


        return view('admin/category/index',compact('categories','level','parent_categories','type','parent_id'));
    }
    public function CategoryStore(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
        ]);


        $category = new Category();
        $category->title = $request->title;
        $category->url = 'search/'.str_replace(' ','-',$request->title);
        $category->status = $request->status;
        $category->level = $request->level;
        $category->type = $request->type;



        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $imageName  = 'homepage_category_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/homepage_category/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;

            $category->image = $imageUrl;
        }

        if (isset($request->parent_id)) {
            $category->parent_id = $request->parent_id;
        }

        $category->save();



        return back()->withSuccess('Product Category Successfully Added!');
    }


    public function CategoryUpdate(Request $request)
    {
        //
        $id = $request->id;

        $category = Category::find($id);
        $category->title = $request->title;
        $category->url = 'search/'.str_replace(' ','-',$request->title);
        $category->status = $request->status;



        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $imageName  = 'homepage_category_'.date('ymdhis').'.'.$image->getClientOriginalExtension();
            $path       = 'images/homepage_category/';
            $image->move($path, $imageName);
            $imageUrl   = $path . $imageName;

            $category->image = $imageUrl;
        }

        if (isset($request->parent_id)) {
            $category->parent_id = $request->parent_id;
        }

        $category->save();



        return back()->withSuccess('Product Category Successfully Updated!');
    }



    public function CategoryDelete( $id)
    {
        $review = Category::destroy($id);
        return back()->withSuccess('Successfully Deleted!');
    }

    public function GetCategoryImage(Request $request)
    {
    	$categories = Category::where('level','3')->get();
        return $categories;

    }
}
