<?php

namespace App\Http\Controllers;

use App\Carousel;
use App\Category;
use App\Sliders;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Sliders::where('status','active')->get();

        $carousels = Carousel::where('status','active')->where('page','home')->orderBy('sort_order','ASC')->get();
        $nav_categories=array();
        $side_categories=array();
        



        return view('front.home',compact('sliders','carousels','nav_categories','side_categories'));
    }
}
